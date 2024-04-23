<?php
/**
 * <ModuleClassName> => Cheque
 * <FileName> => validation.php
 * Format expected: <ModuleClassName><FileName>ModuleFrontController
 */
class addifyexterafieldgeneratormodulesignupformModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        if (Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ADDITIONALFORM') == 0) {
            return;
        }
        $this->processConfigRegisterationSave();
    }
    function getFrontFormValues()
    {
        $fields_value = array();
        $fields_value['Social_title_default'] = Tools::getValue('Social_title_default');
        $fields_value['First_Name_default'] = Tools::getValue('First_Name_default');
        $fields_value['Last_Name_default'] = Tools::getValue('Last_Name_default');
        $fields_value['email_default'] = Tools::getValue('email_default');
        $fields_value['Password_default'] = Tools::getValue('Password_default');
        $fields_value['dob_default'] = Tools::getValue('dob_default');
        $fields_value['custom_fields_title'] = Tools::getValue('custom_fields_title');
        $id_customer = $this->context->customer->id;
        if ($id_customer == '') {
            $email = Tools::getValue('email_default');
            if (Validate::isEmail($email) && !empty($email)) {
                if (Customer::customerExists($email)) {
                    $this->context->controller->errors = sprintf($this->l('An account using this email address has already been registered.'));
                    $this->redirectWithNotifications('http://localhost/prestashop_edition_basic_version_8.1.4/registration');
                }
            } else {
                $this->context->controller->errors = sprintf($this->l('Please Submit a Valid Email.'));
            }
        } else {
            $fields_value['First_Name_default'] = $this->context->customer->firstname;
            $fields_value['Last_Name_default'] = $this->context->customer->lastname;
            $fields_value['email_default'] = $this->context->customer->email;
        }
        $fields = addifyexterafieldgeneratorclass::getListContent();
        $fieldsubmitted = array();
        foreach ($fields as $active_field) {
            if (($active_field['field_type'] == 'checkbox') || ($active_field['field_type'] == 'multiselect') || ($active_field['field_type'] == 'multicheckbox') || ($active_field['field_type'] == 'radiobutton')) {
                $values = Tools::getValue($active_field['field_type'] . $active_field['id_field']);
                if (is_array($values)) {
                    $value = implode(',', $values);
                } else {
                    $value = '';
                }
                $fieldsubmitted[$active_field['field_type'] . $active_field['id_field']] = $value;
            } else {
                $fieldsubmitted[$active_field['field_type'] . $active_field['id_field']] = Tools::getValue($active_field['field_type'] . $active_field['id_field']);
            }
        }
        $fields_value['fields'] = $fieldsubmitted;

        return $fields_value;
    }
    function processConfigRegisterationSave()
    {
        $account_url = 'http://localhost/prestashop_edition_basic_version_8.1.4/registration';
        $fields = array();
        $fields_value = $this->getFrontFormValues();
        $id_customer = $this->context->customer->id;
        if ($id_customer == '') {
            $id_gender = $fields_value['Social_title_default'];
            if ($id_gender == 'male') {
                $id_gender = 1;
            } elseif ($id_gender == 'female') {
                $id_gender = 2;
            } else {
                $id_gender = 0;
            }
            $First_Name = $fields_value['First_Name_default'];
            if (preg_match("/^[a-zA-Z. ]+$/", $First_Name) === 0) {
                $this->context->controller->errors = sprintf($this->l('First Name is not a Valid name.'));
                $account_url = Tools::getValue('account_url');
                $this->redirectWithNotifications($account_url);

            }
            $Last_Name = $fields_value['Last_Name_default'];
            if (preg_match("/^[a-zA-Z. ]+$/", $Last_Name) === 0) {
                $this->context->controller->errors = sprintf($this->l('Last Name is not a Valid name.'));
                $account_url = Tools::getValue('account_url');
                $this->redirectWithNotifications($account_url);
            }

            $email = $fields_value['email_default'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->context->controller->errors = sprintf($this->l('Email is not a Valid.'));
                $account_url = Tools::getValue('account_url');
                $this->redirectWithNotifications($account_url);
            }
            $Password = $fields_value['Password_default'];
            if (Validate::isEmail($email) && !empty($email))
                if (Customer::customerExists($email)) {
                    $this->context->controller->errors = sprintf($this->l('An account using this email address has already been registered.'));
                    $account_url = Tools::getValue('account_url');
                    $this->redirectWithNotifications($account_url);
                }
            $dobbv = $fields_value['dob_default'];
            $today = date("Y-m-d");
            $today_time = strtotime($today);
            $expire_time = strtotime($dobbv);
            if ($today_time < $expire_time) {
                $this->context->controller->errors = sprintf($this->l('Date is not a Valid.'));
                $this->redirectWithNotifications($account_url);
            } else {
                $dob = $dobbv;
            }
            $customer = new Customer();
            $customer->id_gender = pSQL($id_gender);
            $customer->lastname = pSQL($Last_Name);
            $customer->firstname = pSQL($First_Name);
            $pwd = $Password;
            $customer->passwd = md5(pSQL(_COOKIE_KEY_ . $pwd));
            $customer->email = pSQL($email);
            $customer->birthday = pSQL($dob);
            if ($customer->add()) {
                $id_customer = (int) $customer->id;
            }
            $fields = addifyexterafieldgeneratorclass::getListContent();
            $fieldsubmitted = $fields_value['fields'];
            foreach ($fields as $field) {
                $id_field = $field['id_field'];
                $name = $field['field_type'];
                $column_name = $name . $id_field;
                $AddifyregistrationformcustomdataClass = new addifyextrafieldcustomerdata();
                $AddifyregistrationformcustomdataClass->id_customer = (int) $id_customer;
                $AddifyregistrationformcustomdataClass->id_field = (int) $id_field;
                //         $AddifyregistrationformcustomdataClass->id_form_group = (int)$field['id_form_group'];
                $AddifyregistrationformcustomdataClass->field_label = pSQL($field['field_name']);
                $AddifyregistrationformcustomdataClass->field_type = pSQL($field['field_type']);
                $AddifyregistrationformcustomdataClass->field_options = pSQL($field['field_options']);
                $AddifyregistrationformcustomdataClass->field_name = pSQL($field['field_type']);
                $AddifyregistrationformcustomdataClass->field_value = pSQL($fieldsubmitted[$column_name]);
                $AddifyregistrationformcustomdataClass->save();
                //     //////////////////////////////customer registration///////////////////////
            }
            $this->context->controller->success = sprintf('Customer is registered Sucessfully');
            $this->redirectWithNotifications($this->context->shop->getBaseURL(true));
            $this->setTemplate('module:addifyexterafieldgeneratormodule/views/templates/front/emptyfile.tpl');
        }
    }
}