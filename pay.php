<?php

// Set up a PayAnyWay transaction and redirect user to payment service.
require dirname(dirname(dirname(__FILE__))) . "/config.php";
require_once "{$CFG->dirroot}/lib/enrollib.php";

$id = required_param('id', PARAM_INT);  // plugin instance id

// get plugin instance
if (!$plugin_instance = $DB->get_record("enrol", array("id"=>$id, "status"=>0))) {
    print_error('invalidinstance');
}

$plugin = enrol_get_plugin('payanyway');

$transaction_id = $plugin->begin_transaction($plugin_instance, $USER);
$cost = number_format($plugin_instance->cost, 2, '.', '');
$paymentsystem = explode('_', $plugin_instance->customchar1);
$mntsignature = md5($plugin->get_config('mntid').$transaction_id.$cost.$plugin_instance->currency.$plugin->get_config('mnttestmode').$plugin->get_config('mntdataintegritycode'));

if ($paymentsystem[1]) {
	// is invoice method
	$paymenturl = $CFG->wwwroot."/enrol/payanyway/invoice.php?";
} else {
	// online method
	$paymenturl = "https://".$plugin->get_config('paymentserver')."/assistant.htm?";
}

$additionalparams = "";
foreach($_REQUEST as $key=>$value)
{
	if (strpos($key, "additionalParameters") !== false || strpos($key, "paymentSystem") !== false)
	{
		$key = str_replace("_", ".", $key);
		$additionalparams .= "&{$key}={$value}";
	}
}
$paymentsystemparams = "";
if (!empty($paymentsystem[2]))
{
	$paymentsystemparams .= "paymentSystem.unitId={$paymentsystem[2]}&";
}
if (isset($paymentsystem[3]) && !empty($paymentsystem[3]))
{
	$paymentsystemparams .= "paymentSystem.accountId={$paymentsystem[3]}&";
}

if (!$payanywaytx = $DB->get_record('enrol_payanyway_transactions', array('id' => $transaction_id))) {
    die('FAIL. Not a valid transaction id');
}

if (! $user = $DB->get_record("user", array("id"=>$payanywaytx->userid))) {
    die('FAIL. Not a valid user id.');
}

if (! $course = $DB->get_record("course", array("id"=>$payanywaytx->courseid))) {
    die('FAIL. Not a valid course id.');
}

//file_put_contents("/tmp/aaaa", serialize($course)."\n", FILE_APPEND);

redirect($paymenturl."
	MNT_ID={$plugin->get_config('mntid')}&
	MNT_TRANSACTION_ID={$transaction_id}&
	MNT_CURRENCY_CODE={$plugin_instance->currency}&
	MNT_AMOUNT={$cost}&
	MNT_SIGNATURE={$mntsignature}&
	MNT_SUCCESS_URL=".urlencode($CFG->wwwroot."/enrol/payanyway/return.php?id=".$id)."&
	MNT_FAIL_URL=".urlencode($CFG->wwwroot."/enrol/payanyway/return.php?id=".$id)."&
	MNT_CUSTOM1=".urlencode($course->shortname)."&
	MNT_CUSTOM2=".urlencode(fullname($user))."&
	MNT_CUSTOM3=".urlencode($user->email)."&
	MNT_DESCRIPTION=".urlencode($course->fullname)."&
	pawcmstype=moodle&
	followup=true&
	javascriptEnabled=true&
	id={$id}&
	paymentsystem={$paymentsystem[0]}&
	{$paymentsystemparams}
	{$additionalparams}
");
