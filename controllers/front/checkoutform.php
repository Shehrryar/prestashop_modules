<?php


class addifyexterafieldgeneratormodulecheckoutformModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('module:addifyexterafieldgeneratormodule/views/templates/front/emptyfile.tpl');
        $this->process_save();
    }
    function getchekoutcusomfieldsvalue()
    {
        $fields = addifyexterafieldcheckoutmodel::getListContent();
        $fieldsubmitted = array();
        foreach ($fields as $active_field) {
            if (($active_field['field_type_checkout'] == 'checkbox') || ($active_field['field_type_checkout'] == 'multiselect') || ($active_field['field_type_checkout'] == 'multicheckbox') || ($active_field['field_type_checkout'] == 'radiobutton')) {
                $values = Tools::getValue($active_field['field_type_checkout'] . $active_field['id_field_checkout']);
                if (is_array($values)) {
                    $value = implode(',', $values);
                } else {
                    $value = '';
                }
                $fieldsubmitted[$active_field['field_type_checkout'] . $active_field['id_field_checkout']] = $value;
            } else {
                $fieldsubmitted[$active_field['field_type_checkout'] . $active_field['id_field_checkout']] = Tools::getValue($active_field['field_type_checkout'] . $active_field['id_field_checkout']);
            }
        }
        $fields_value['fields'] = $fieldsubmitted;
        return $fields_value;
    }

    function process_save_break()
    {
        $fields = array();
        $fields_value = $this->getchekoutcusomfieldsvalue();
        $id_customer = $this->context->customer->id;
        $fields = addifyexterafieldcheckoutmodel::getListContent();
        $fieldsubmitted = $fields_value['fields'];
        $addifycheckout = addifycheckoutcustomdataforcheckoutpage::getfieldsbycustomerid($id_customer);
        foreach ($fields as $field) {
            $id_field = $field['id_field_checkout'];
            $name = $field['field_type_checkout'];
            $column_name = $name . $id_field;
            if (($fieldsubmitted[$column_name]) == "") {
            } else {
                foreach ($addifycheckout as $values_exist) {
                    if ($values_exist['id_cart_checkout'] == $this->context->cart->id) {
                        $addifycheckoutcustomdataforcheckoutpage = new addifycheckoutcustomdataforcheckoutpage($this->context->cart->id);
                        $addifycheckoutcustomdataforcheckoutpage->id_customer_checkout = $id_customer;
                        $addifycheckoutcustomdataforcheckoutpage->id_field_checkout = $id_field;
                        $addifycheckoutcustomdataforcheckoutpage->id_cart_checkout = $this->context->cart->id;
                        $addifycheckoutcustomdataforcheckoutpage->field_label_checkout = pSQL($field['field_name_checkout']);
                        $addifycheckoutcustomdataforcheckoutpage->field_type_checkout = pSQL($field['field_type_checkout']);
                        $addifycheckoutcustomdataforcheckoutpage->field_options_checkout = pSQL($field['field_options_checkout']);
                        $addifycheckoutcustomdataforcheckoutpage->field_name_checkout = pSQL($field['field_type_checkout']);
                        $addifycheckoutcustomdataforcheckoutpage->field_value_checkout = pSQL($fieldsubmitted[$column_name]);
                        $addifycheckoutcustomdataforcheckoutpage->update();
                    } else {
                        $addifycheckoutcustomdataforcheckoutpage = new addifycheckoutcustomdataforcheckoutpage();
                        $addifycheckoutcustomdataforcheckoutpage->id_customer_checkout = $id_customer;
                        $addifycheckoutcustomdataforcheckoutpage->id_field_checkout = $id_field;
                        $addifycheckoutcustomdataforcheckoutpage->id_cart_checkout = $this->context->cart->id;
                        $addifycheckoutcustomdataforcheckoutpage->field_label_checkout = pSQL($field['field_name_checkout']);
                        $addifycheckoutcustomdataforcheckoutpage->field_type_checkout = pSQL($field['field_type_checkout']);
                        $addifycheckoutcustomdataforcheckoutpage->field_options_checkout = pSQL($field['field_options_checkout']);
                        $addifycheckoutcustomdataforcheckoutpage->field_name_checkout = pSQL($field['field_type_checkout']);
                        $addifycheckoutcustomdataforcheckoutpage->field_value_checkout = pSQL($fieldsubmitted[$column_name]);
                        $addifycheckoutcustomdataforcheckoutpage->save();
                    }
                }
            }
        }
        Tools::redirect($this->context->shop->getBaseURL(true) . 'order');
    }
    function process_save()
    {
        $fields_value = $this->getchekoutcusomfieldsvalue();
        $id_customer = $this->context->customer->id;
        $fields = addifyexterafieldcheckoutmodel::getListContent();
        $fieldsubmitted = $fields_value['fields'];
        $addifycheckout = addifycheckoutcustomdataforcheckoutpage::getfieldsbycustomerid($id_customer);

        foreach ($fields as $field) {
            $id_field = $field['id_field_checkout'];
            $name = $field['field_type_checkout'];
            $column_name = $name . $id_field;

            // Check if the field has a value submitted
            if (!empty($fieldsubmitted[$column_name])) {
                $value_exists = false;

                // Check if corresponding data exists in $addifycheckout
                foreach ($addifycheckout as $values_exist) {
                    if ($values_exist['id_cart_checkout'] == $this->context->cart->id) {
                        $value_exists = true;
                        break; // No need to continue searching
                    }
                }
                // Create or update the record based on $value_exists
                $addifycheckoutcustomdataforcheckoutpage = new addifycheckoutcustomdataforcheckoutpage();
                $addifycheckoutcustomdataforcheckoutpage->id_customer_checkout = $id_customer;
                $addifycheckoutcustomdataforcheckoutpage->id_field_checkout = $id_field;
                $addifycheckoutcustomdataforcheckoutpage->id_cart_checkout = $this->context->cart->id;
                $addifycheckoutcustomdataforcheckoutpage->field_label_checkout = pSQL($field['field_name_checkout']);
                $addifycheckoutcustomdataforcheckoutpage->field_type_checkout = pSQL($field['field_type_checkout']);
                $addifycheckoutcustomdataforcheckoutpage->field_options_checkout = pSQL($field['field_options_checkout']);
                $addifycheckoutcustomdataforcheckoutpage->field_name_checkout = pSQL($field['field_type_checkout']);
                $addifycheckoutcustomdataforcheckoutpage->field_value_checkout = pSQL($fieldsubmitted[$column_name]);

                if ($value_exists) {
                    echo "values already exist";
                    $addifycheckoutcustomdataforcheckoutpage->update();
                } else {
                    $addifycheckoutcustomdataforcheckoutpage->save();
                }
            }
        }
        // Tools::redirect($this->context->shop->getBaseURL(true) . 'order');
    }

}
?>