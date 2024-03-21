<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/formslib.php');

class enrol_payanyway_edit_form extends moodleform {

    function get_expirynotify_options() {
        $options = array(
            0 => get_string('no'),
            1 => get_string('expirynotifyenroller', 'core_enrol'),
            2 => get_string('expirynotifyall', 'core_enrol')
        );
        return $options;
    }

    function definition() {
        $mform = $this->_form;

        list($instance, $plugin, $context) = $this->_customdata;

        $mform->addElement('header', 'header', get_string('pluginname', 'enrol_payanyway'));

        $mform->addElement('text', 'name', get_string('custominstancename', 'enrol'));
        // $mform->setType('name', PARAM_TEXT);

        $mform->addElement('textarea', 'customtext1', get_string('editdescription', 'enrol_payanyway'), array('rows'=>5) );
        $mform->setDefault('customtext1', $plugin->get_config('description'));
        $mform->setType('customtext1', PARAM_RAW); // XSS is prevented when printing the block contents and serving files
        $mform->addHelpButton('customtext1', 'editdescription', 'enrol_payanyway');
		
		$paymentsystems = array(
			'payanyway_0_0' => get_string('payanyway', 'enrol_payanyway'),
//			'moneta_0_1015' => get_string('moneta', 'enrol_payanyway'),
			'plastic_0_card' => get_string('plastic', 'enrol_payanyway'),
			'sbp_0_12299232' => get_string('sbp', 'enrol_payanyway'),
//			'webmoney_0_1017' => get_string('webmoney', 'enrol_payanyway'),
//			'yandex_0_1020' => get_string('yandex', 'enrol_payanyway'),
//			'moneymail_0_1038' => get_string('moneymail', 'enrol_payanyway'),
//			'wallet_0_310212' => get_string('wallet', 'enrol_payanyway'),
//			'banktransfer_1_705000_75983431' => get_string('banktransfer', 'enrol_payanyway'),
//			'ciberpay_1_489755_19357960' => get_string('ciberpay', 'enrol_payanyway'),
//			'comepay_1_228820_47654606' => get_string('comepay', 'enrol_payanyway'),
//			'contact_1_1028_26' => get_string('contact', 'enrol_payanyway'),
//			'elecsnet_1_232821_10496472' => get_string('elecsnet', 'enrol_payanyway'),
//			'euroset_1_248362_136' => get_string('euroset', 'enrol_payanyway'),
//			'forward_1_83046_116' => get_string('forward', 'enrol_payanyway'),
//			'gorod_1_426904_152' => get_string('gorod', 'enrol_payanyway'),
//			'mcb_1_295339_143' => get_string('mcb', 'enrol_payanyway'),
//			'novoplat_1_281129_80314912' => get_string('novoplat', 'enrol_payanyway'),
//			'platika_1_226272_15662295' => get_string('platika', 'enrol_payanyway'),
//			'post_1_1029_15' => get_string('post', 'enrol_payanyway'),
		);
        $mform->addElement('select', 'customchar1', get_string('paymentsystem', 'enrol_payanyway'), $paymentsystems);
        $mform->setDefault('customchar1', $plugin->get_config('customchar1'));

        $options = array(ENROL_INSTANCE_ENABLED  => get_string('yes'),
                         ENROL_INSTANCE_DISABLED => get_string('no'));
        $mform->addElement('select', 'status', get_string('status', 'enrol_payanyway'), $options);
        $mform->setDefault('status', $plugin->get_config('status'));

        $mform->addElement('text', 'cost', get_string('cost', 'enrol_payanyway'), array('size'=>4));
        // $mform->setType('cost', PARAM_TEXT);
        $mform->setDefault('cost', $plugin->get_config('cost'));

        $payanywaycurrencies = array(
			'RUB' => 'RUB',
            'CAD' => 'CAD',
            'EUR' => 'EUR',
            'GBP' => 'GBP',
            'USD' => 'USD',
        );
        $mform->addElement('select', 'currency', get_string('currency', 'enrol_payanyway'), $payanywaycurrencies);
        $mform->setDefault('currency', $plugin->get_config('currency'));

        if ($instance->id) {
            $roles = get_default_enrol_roles($context, $instance->roleid);
        } else {
            $roles = get_default_enrol_roles($context, $plugin->get_config('roleid'));
        }
        $mform->addElement('select', 'roleid', get_string('assignrole', 'enrol_payanyway'), $roles);
        $mform->setDefault('roleid', $plugin->get_config('roleid'));

        $mform->addElement('duration', 'enrolperiod', get_string('enrolperiod', 'enrol_payanyway'), array('optional' => true, 'defaultunit' => 86400));
        $mform->setDefault('enrolperiod', $plugin->get_config('enrolperiod'));
        $mform->addHelpButton('enrolperiod', 'enrolperiod', 'enrol_payanyway');

        $mform->addElement('date_selector', 'enrolstartdate', get_string('enrolstartdate', 'enrol_payanyway'), array('optional' => true));
        $mform->setDefault('enrolstartdate', 0);
        $mform->addHelpButton('enrolstartdate', 'enrolstartdate', 'enrol_payanyway');

        $mform->addElement('date_selector', 'enrolenddate', get_string('enrolenddate', 'enrol_payanyway'), array('optional' => true));
        $mform->setDefault('enrolenddate', 0);
        $mform->addHelpButton('enrolenddate', 'enrolenddate', 'enrol_payanyway');

        $mform->addElement('hidden', 'id');
        // $mform->setType('id', PARAM_INT);
        $mform->addElement('hidden', 'courseid');
        // $mform->setType('courseid', PARAM_INT);
        $mform->setTypes([
            "name" => PARAM_TEXT,
            "cost" => PARAM_TEXT,
            "id" => PARAM_INT,
            "courseid" => PARAM_INT
        ]);

        $options = $this->get_expirynotify_options();
        $mform->addElement('select', 'expirynotify', get_string('expirynotify', 'core_enrol'), $options);
        $mform->addHelpButton('expirynotify', 'expirynotify', 'core_enrol');

        $options = array('optional' => false, 'defaultunit' => 86400);
        $mform->addElement('duration', 'expirythreshold', get_string('expirythreshold', 'core_enrol'), $options);
        $mform->addHelpButton('expirythreshold', 'expirythreshold', 'core_enrol');
        $mform->disabledIf('expirythreshold', 'expirynotify', 'eq', 0);

        $this->add_action_buttons(true, ($instance->id ? null : get_string('addinstance', 'enrol')));

        $this->set_data($instance);
    }

    function validation($data, $files) {
        global $DB, $CFG;
        $errors = parent::validation($data, $files);

        list($instance, $plugin, $context) = $this->_customdata;

        if ($data['status'] == ENROL_INSTANCE_ENABLED) {
            if (!empty($data['enrolenddate']) and $data['enrolenddate'] < $data['enrolstartdate']) {
                $errors['enrolenddate'] = get_string('enrolenddaterror', 'enrol_payanyway');
            }

            if (!is_numeric($data['cost'])) {
                $errors['cost'] = get_string('costerror', 'enrol_payanyway');

            }
        }

        if ($data['expirynotify'] > 0 and $data['expirythreshold'] < 86400) {
            $errors['expirythreshold'] = get_string('errorthresholdlow', 'core_enrol');
        }

        return $errors;
    }
}
