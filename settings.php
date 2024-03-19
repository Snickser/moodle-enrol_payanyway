<?php

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    //--- settings ------------------------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('enrol_payanyway_settings', '', get_string('pluginname_desc', 'enrol_payanyway')));

    $options = array('www.payanyway.ru'  => 'www.payanyway.ru',
                     'demo.moneta.ru' => 'demo.moneta.ru');
    $settings->add(new admin_setting_configselect('enrol_payanyway/paymentserver',
        get_string('paymentserver', 'enrol_payanyway'), '', 'www.payanyway.ru', $options));
	
    $settings->add(new admin_setting_configtext('enrol_payanyway/mntid', get_string('mntid', 'enrol_payanyway'), '', '', PARAM_INT, 30));

    $settings->add(new admin_setting_configtext('enrol_payanyway/mntdataintegritycode', get_string('mntdataintegritycode', 'enrol_payanyway'), '', ''));

    $settings->add(new admin_setting_configcheckbox('enrol_payanyway/mnttestmode', get_string('mnttestmode', 'enrol_payanyway'), '', 0));

    $settings->add(new admin_setting_configtext('enrol_payanyway/payanywaylogin', get_string('payanywaylogin', 'enrol_payanyway'), '', '', PARAM_EMAIL));

    $settings->add(new admin_setting_configtext('enrol_payanyway/payanywaypassword', get_string('payanywaypassword', 'enrol_payanyway'), '', ''));

    // Note: let's reuse the ext sync constants and strings here, internally it is very similar,
    //       it describes what should happen when users are not supposed to be enrolled any more.
    $options = array(
        ENROL_EXT_REMOVED_KEEP           => get_string('extremovedkeep', 'enrol'),
        ENROL_EXT_REMOVED_SUSPENDNOROLES => get_string('extremovedsuspendnoroles', 'enrol'),
        ENROL_EXT_REMOVED_UNENROL        => get_string('extremovedunenrol', 'enrol'),
    );
    $settings->add(new admin_setting_configselect('enrol_payanyway/expiredaction', get_string('expiredaction', 'enrol_payanyway'), get_string('expiredaction_help', 'enrol_payanyway'), ENROL_EXT_REMOVED_SUSPENDNOROLES, $options));
	
    //--- enrol instance defaults ----------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('enrol_payanyway_defaults',
        get_string('enrolinstancedefaults', 'admin'), get_string('enrolinstancedefaults_desc', 'admin')));

    $settings->add(new admin_setting_configcheckbox('enrol_payanyway/defaultenrol',
        get_string('defaultenrol', 'enrol'), get_string('defaultenrol_desc', 'enrol'), 1));
	
    $options = array(ENROL_INSTANCE_ENABLED  => get_string('yes'),
                     ENROL_INSTANCE_DISABLED => get_string('no'));
    $settings->add(new admin_setting_configselect('enrol_payanyway/status',
        get_string('status', 'enrol_payanyway'), get_string('status_desc', 'enrol_payanyway'), ENROL_INSTANCE_DISABLED, $options));

    $settings->add(new admin_setting_configtext('enrol_payanyway/cost', get_string('cost', 'enrol_payanyway'), '', 0, PARAM_FLOAT, 4));

    $payanywaycurrencies = array(
							  'RUB' => 'Russian Ruble',
                              'CAD' => 'Canadian Dollars',
                              'EUR' => 'Euros',
                              'GBP' => 'British Pounds',
							  'USD' => 'US Dollars',
                             );
    $settings->add(new admin_setting_configselect('enrol_payanyway/currency', get_string('currency', 'enrol_payanyway'), '', 'RUB', $payanywaycurrencies));

    if (!during_initial_install()) {
        // $options = get_default_enrol_roles(get_context_instance(CONTEXT_SYSTEM));
        $options = get_default_enrol_roles(context_system::instance());
        $student = get_archetype_roles('student');
        $student = reset($student);
        $settings->add(new admin_setting_configselect('enrol_payanyway/roleid',
            get_string('defaultrole', 'enrol_payanyway'), get_string('defaultrole_desc', 'enrol_payanyway'), $student->id, $options));
    }

    $settings->add(new admin_setting_configtext('enrol_payanyway/enrolperiod',
        get_string('enrolperiod', 'enrol_payanyway'), get_string('enrolperiod_desc', 'enrol_payanyway'), 0, PARAM_INT));
}
