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

    function process_save()
    {
        $fields_value = $this->getchekoutcusomfieldsvalue();
        $fields = addifyexterafieldcheckoutmodel::getListContent();
        $fieldsubmitted = $fields_value['fields'];
        $id_customer = $this->context->customer->id;
        $cart_id = $this->context->cart->id;
        foreach ($fields as $field) {
            $id_field = $field['id_field_checkout'];
            $name = $field['field_type_checkout'];
            $column_name = $name . $id_field;
            // Check if data exists for the current field
            if (!empty($fieldsubmitted[$column_name])) {
                $existing_entry = addifycheckoutcustomdataforcheckoutpage::getDataByFieldAndCart($id_customer, $id_field, $cart_id);
                $addifycheckoutcustomdataforcheckoutpage = new addifycheckoutcustomdataforcheckoutpage();
                // Set common data for both update and save
                $addifycheckoutcustomdataforcheckoutpage->id_customer_checkout = $id_customer;
                $addifycheckoutcustomdataforcheckoutpage->id_field_checkout = $id_field;
                $addifycheckoutcustomdataforcheckoutpage->id_cart_checkout = $cart_id;
                $addifycheckoutcustomdataforcheckoutpage->field_label_checkout = pSQL($field['field_name_checkout']);
                $addifycheckoutcustomdataforcheckoutpage->field_type_checkout = pSQL($field['field_type_checkout']);
                $addifycheckoutcustomdataforcheckoutpage->field_options_checkout = pSQL($field['field_options_checkout']);
                $addifycheckoutcustomdataforcheckoutpage->field_name_checkout = pSQL($field['field_type_checkout']);
                $addifycheckoutcustomdataforcheckoutpage->field_value_checkout = pSQL($fieldsubmitted[$column_name]);
                if ($existing_entry) {
                   foreach($existing_entry as $edit_entry){
                    $addifycheckoutcustomdataforcheckoutpage = new addifycheckoutcustomdataforcheckoutpage($edit_entry['id_data_checkout']);
                    $addifycheckoutcustomdataforcheckoutpage->id_customer_checkout = $id_customer;
                    $addifycheckoutcustomdataforcheckoutpage->id_field_checkout = $id_field;
                    $addifycheckoutcustomdataforcheckoutpage->id_cart_checkout = $cart_id;
                    $addifycheckoutcustomdataforcheckoutpage->field_label_checkout = pSQL($field['field_name_checkout']);
                    $addifycheckoutcustomdataforcheckoutpage->field_type_checkout = pSQL($field['field_type_checkout']);
                    $addifycheckoutcustomdataforcheckoutpage->field_options_checkout = pSQL($field['field_options_checkout']);
                    $addifycheckoutcustomdataforcheckoutpage->field_name_checkout = pSQL($field['field_type_checkout']);
                    $addifycheckoutcustomdataforcheckoutpage->field_value_checkout = pSQL($fieldsubmitted[$column_name]);
                    $addifycheckoutcustomdataforcheckoutpage->update();
                   }
                } else {
                    // If data doesn't exist, save a new entry
                    $addifycheckoutcustomdataforcheckoutpage->save();
                }
            }
        }
        // Redirect to the order page after processing
        Tools::redirect($this->context->shop->getBaseURL(true) . 'order');
    }
}
?>