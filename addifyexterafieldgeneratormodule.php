<?php
/**
 * 2007-2024 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2007-2024 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */
if (!defined('_PS_VERSION_')) {
    exit;
}
include (dirname(__FILE__) . '/classes/addifyexterafieldgeneratorclass.php');
include (dirname(__FILE__) . '/classes/addifyexterafieldcheckoutmodel.php');
include (dirname(__FILE__) . '/classes/addifyextrafieldcustomerdata.php');
include (dirname(__FILE__) . '/classes/addifycheckoutcustomdataforcheckoutpage.php');
class Addifyexterafieldgeneratormodule extends Module
{
    protected $config_form = false;
    public function __construct()
    {
        $this->name = 'addifyexterafieldgeneratormodule';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Addify';
        $this->need_instance = 0;
        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Addify Generate Extra field');
        $this->description = $this->l('the purpose of this module is to generate extra fields');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => '8.1.4');
    }
    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        include (dirname(__FILE__) . '/sql/install.php');
        $this->registerHook('AdditionalCustomerFormFields');
        return parent::install()
            && $this->registerHook('displayOverrideTemplate') &&
            $this->registerHook('displayCustomerLoginFormAfter') &&
            $this->registerHook('header') &&
            $this->registerHook('displayBackOfficeHeader') &&
            $this->registerHook('displayAdminCustomers') &&
            $this->registerHook('displayCustomerAccountForm') &&
            $this->registerHook('displayBeforeCarrier')&&
            // $this->registerHook('displayAdminOrder');
            $this->registerHook('displayOrderConfirmation');
            // $this->registerHook('displayAfterPayment');            
            // $this->registerHook('displayAddressSelectorBottom') &&
            // $this->registerHook('displayAfterCarrier') &&
            // $this->registerHook('displayBeforeCarrier') &&
            // $this->registerHook('displayCarrierExtraContent') &&
            // $this->registerHook('displayCartExtraProductActions');
    }
    public function uninstall()
    {
        include (dirname(__FILE__) . '/sql/uninstall.php');
        return parent::uninstall() &&
            $this->unregisterHook('header') &&
            $this->unregisterHook('displayCustomerLoginFormAfter') &&
            $this->unregisterHook('displayOverrideTemplate') &&
            $this->unregisterHook('displayBackOfficeHeader') &&
            $this->unregisterHook('displayAdminCustomers') &&
            $this->unregisterHook('displayCustomerAccountForm')&&
            $this->unregisterHook('displayBeforeCarrier')&&
            // $this->unregisterHook('displayAdminOrder');
            $this->unregisterHook('displayOrderConfirmation');
            // $this->unregisterHook('displayAfterPayment');
            // $this->unregisterHook('displayAddressSelectorBottom') &&
            // $this->unregisterHook('displayAfterCarrier') &&
            // $this->unregisterHook('displayBeforeCarrier beforeCarrier') &&
            // $this->unregisterHook('displayCarrierExtraContent') &&
            // $this->unregisterHook('displayCartExtraProductActions');
    }
    /**
     * Load the configuration form
     */
    public function getContent()
    {
        $active_tab = Tools::getValue('active_tab');
        if (!$active_tab) {
            $active_tab = 1;
        }
        $data = addifyexterafieldgeneratorclass::getListContent();
        usort($data, function($a, $b) {
            return $a['sort_order'] <=> $b['sort_order'];
        });
        $this->context->smarty->assign(
            array(
                    'adminToken' => Tools::getAdminTokenLite('AdminModules'),
                    'admincontrollerlink' => $this->context->link->getAdminLink('AdminExtrafield'),
                    'render_confriguration_form' => $this->renderForm(),
                    'registerationformrenderList'=>$data,
                    'checkoutformrenderList' => addifyexterafieldcheckoutmodel::getListContent(),
                    'active_tab' => $active_tab,
                    'configUrl' => $this->context->link->getAdminLink('AdminModules', true) . '&configure=' . $this->name,
            )
        );
        if (((bool) Tools::isSubmit('updatecheckoutpage')) == true) {
            $fields_values = array();
            if (Tools::getValue('id_field_checkout')) {
                $addifyexterafieldcheckoutmodel = new addifyexterafieldcheckoutmodel((int) Tools::getValue('id_field_checkout'));
                $fields_values['id_field_checkout'] = $addifyexterafieldcheckoutmodel->id_field_checkout;
                $fields_values['active_field'] = $addifyexterafieldcheckoutmodel->active_field_checkout;
                $fields_values['field_name_checkout'] = $addifyexterafieldcheckoutmodel->field_name_checkout;
                $fields_values['field_type_checkout'] = $addifyexterafieldcheckoutmodel->field_type_checkout;
                $fields_values['placeholder_checkout'] = $addifyexterafieldcheckoutmodel->placeholder_checkout;
                $fields_values['field_options_checkout'] = $addifyexterafieldcheckoutmodel->field_options_checkout;
                $fields_values['description_checkout'] = $addifyexterafieldcheckoutmodel->description_checkout;
                $fields_values['sort_order_checkout'] = $addifyexterafieldcheckoutmodel->sort_order_checkout;
            }
            $this->context->smarty->assign(
                array(
                    'fields_value' => $fields_values,
                )
            );
            return $this->display(__FILE__, 'views/templates/admin/edit_field_checkout.tpl');
        }

        

        if (((bool) Tools::isSubmit('deleteregisterationformdata')) == true) {
            addifyexterafieldgeneratorclass::deletefield((int) Tools::getValue('id_field'));
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true) . '&conf=3&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name . '&active_tab=2');
        }
        if (((bool) Tools::isSubmit('addcheckoutaddifyexterafieldgeneratormodule')) == true) {
            return $this->display(__FILE__, 'views/templates/admin/add_field_checkout.tpl');
        }
        if (((bool) Tools::isSubmit('submitAddifyexterafieldgeneratormoduleModule')) == true) {
            $this->postProcess();
        }
        if (((bool) Tools::isSubmit('checkpagesubmission')) == true) {
            $this->processFieldsSaveforcheckoutpage();
        }
        if (((bool) Tools::isSubmit('addregisteraddifyexterafieldgeneratormodule')) == true) {
            return $this->display(__FILE__, 'views/templates/admin/add_field.tpl');
        }
        if (Tools::isSubmit('updateaddregisterationformdata')) {
            $fields_values = array();
            if (Tools::getValue('id_field')) {
                $editadditionalfieldform = new addifyexterafieldgeneratorclass((int) Tools::getValue('id_field'));
                $fields_values['id_field'] = $editadditionalfieldform->id_field;
                $fields_values['active_field'] = $editadditionalfieldform->active_field;
                $fields_values['field_name'] = $editadditionalfieldform->field_name;
                $fields_values['field_type'] = $editadditionalfieldform->field_type;
                $fields_values['placeholder'] = $editadditionalfieldform->placeholder;
                $fields_values['field_options'] = $editadditionalfieldform->field_options;
                $fields_values['description'] = $editadditionalfieldform->description;
                $fields_values['sort_order'] = $editadditionalfieldform->sort_order;
            }
            $this->context->smarty->assign(
                array(
                    'fields_value' => $fields_values,
                )
            );
            $output = $this->display(__FILE__, 'views/templates/admin/edit_field.tpl');
            return $output;
        }
        if (((bool) Tools::isSubmit('submitAddifyb2bregistrationformbuilderfields')) == true) {
            $this->processFieldsSave();
        }
        if (((bool) Tools::isSubmit('addchekoutaddifyexterafieldgeneratormodule')) == true) {
            return $this->Checkoutpage();
        }
        return $this->display(__FILE__, 'views/templates/admin/configure.tpl');
    }
    public function select_list()
    {
        return array(
            array('id_field' => 'text', 'fieldname' => $this->l('text')),
            array('id_field' => 'textarea', 'fieldname' => $this->l('textarea')),
            array('id_field' => 'number', 'fieldname' => $this->l('number')),
            array('id_field' => 'email', 'fieldname' => $this->l('email')),
            array('id_field' => 'password', 'fieldname' => $this->l('password')),
            array('id_field' => 'radiobutton', 'fieldname' => $this->l('radiobutton')),
            array('id_field' => 'fileupload', 'fieldname' => $this->l('fileupload')),
            array('id_field' => 'switch', 'fieldname' => $this->l('switch')),
            array('id_field' => 'multiselect', 'fieldname' => $this->l('multiselect')),
            array('id_field' => 'checkbox', 'fieldname' => $this->l('checkbox')),
            array('id_field' => 'multicheckbox', 'fieldname' => $this->l('multicheckbox')),
            array('id_field' => 'color', 'fieldname' => $this->l('color')),
            array('id_field' => 'date', 'fieldname' => $this->l('date')),
            array('id_field' => 'time', 'fieldname' => $this->l('time')),
        );
    }
    public function checkoutpagerenderlist()
    {
        $data = addifyexterafieldcheckoutmodel::getListContent();
        $fields_list = array(
            'id_field_checkout' => array(
                'title' => $this->l('Field ID'),
                'type' => 'text',
                'search' => false,
            ),
            'field_name_checkout' => array(
                'title' => $this->l('Field Name'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'field_type_checkout' => array(
                'title' => $this->l('Field Type'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'active_field_checkout' => array(
                'title' => $this->l('Field Status'),
                'width' => 140,
                'active' => 'status',
                'type' => 'bool',
                'search' => false,
                'orderby' => false
            )
        );
        // Prepare options for HelperList
        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->show_toolbar = true;
        $helper->toolbar_btn['new'] = array(
            'href' => AdminController::$currentIndex . '&configure=' . $this->name . '&addcheckout' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->l('Add new')
        );
        $helper->actions = array('edit', 'delete', 'view');
        $helper->module = $this;
        $helper->title = $this->l('Rule for Adding Additional Fields in Checkout Page');
        $helper->table = 'checkoutpage';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;

        // Load list values
        $helper->listTotal = count($data);
        $helper->identifier = 'id_field_checkout';
        $helper->tpl_vars['fields_list'] = $fields_list;
        $helper->tpl_vars['base_url'] = $this->_path;
        $helper->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'icon' => 'icon-trash',
                'confirm' => $this->l('Delete selected items?')
            )
        );
        // Load list values
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        return $helper->generateList($data, $fields_list);
    }
    public function registerationformrenderList()
    {
        $data = addifyexterafieldgeneratorclass::getListContent();
        $fields_list = array(
            'id_field' => array(
                'title' => $this->l('Field ID'),
                'type' => 'text',
                'search' => false,
            ),
            'field_name' => array(
                'title' => $this->l('Field Name'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'field_type' => array(
                'title' => $this->l('Field Type'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'sort_order' => array(
                'title' => $this->l('Position'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'active_field' => array(
                'title' => $this->l('Field Status'),
                'width' => 140,
                'active' => 'status',
                'type' => 'bool',
                'search' => false,
                'orderby' => false
            )
        );
        // Prepare options for HelperList
        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->show_toolbar = true;
        $helper->toolbar_btn['new'] = array(
            'href' => AdminController::$currentIndex . '&configure=' . $this->name . '&addregister' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->l('Add new')
        );
        $helper->actions = array('edit', 'delete', 'view');
        $helper->module = $this;
        $helper->title = $this->l('Rule for Adding Additional Fields in Registeration Form');
        $helper->table = 'addregisterationformdata';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;

        // Load list values
        $helper->listTotal = count($data);
        $helper->identifier = 'id_field';
        $helper->tpl_vars['fields_list'] = $fields_list;
        $helper->tpl_vars['base_url'] = $this->_path;
        $helper->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'icon' => 'icon-trash',
                'confirm' => $this->l('Delete selected items?')
            )
        );
        // Load list values
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        return $helper->generateList($data, $fields_list);
    }
    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitAddifyexterafieldgeneratormoduleModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );
        return $helper->generateForm(
            array(
                array(
                    'form' => array(
                        'legend' => array(
                            'title' => $this->l('General Setting'),
                            'icon' => 'icon-cogs'
                        ),
                        'input' => array(
                            array(
                                'type' => 'switch',
                                'label' => $this->l('Enable/Disable Additional information page'),
                                'name' => 'ADDIFYEXTERAFIELDGENERATORMODULE_ADDITIONALFORM',
                                'is_bool' => true,
                                'values' => array(
                                    array(
                                        'id' => 'active_on',
                                        'value' => true,
                                        'label' => $this->l('Enabled')
                                    ),
                                    array(
                                        'id' => 'active_off',
                                        'value' => false,
                                        'label' => $this->l('Disabled')
                                    )
                                ),
                            ),
                            array(
                                'col' => 3,
                                'type' => 'text',
                                'desc' => $this->l('Registeration form field name'),
                                'name' => 'ADDIFYEXTERAFIELDGENERATORMODULE_ACCOUNT_NAME',
                                'label' => $this->l('Label for "Additional Information" on the regestration form'),
                            ),
                            array(
                                'type' => 'switch',
                                'label' => $this->l('Enable/Disable checkoutpage'),
                                'name' => 'ADDIFYEXTERAFIELDGENERATORMODULE_ENABLECHECKOUTPAGE',
                                'is_bool' => true,
                                'values' => array(
                                    array(
                                        'id' => 'active_on',
                                        'value' => true,
                                        'label' => $this->l('Enabled')
                                    ),
                                    array(
                                        'id' => 'active_off',
                                        'value' => false,
                                        'label' => $this->l('Disabled')
                                    )
                                ),
                            ),
                            array(
                                'col' => 3,
                                'type' => 'text',
                                'desc' => $this->l('checkout field name'),
                                'name' => 'ADDIFYEXTERAFIELDGENERATORMODULE_CHECKOUTPAGE',
                                'label' => $this->l('Label for "Additional Information" on the checkout form'),
                            ),

                        ),
                        'submit' => array(
                            'title' => $this->l('Save'),
                        ),
                        'buttons' => array(
                            'cancel' => array(
                                'title' => $this->l('Cancel'),
                                'class' => 'btn btn-default',
                                'icon' => 'process-icon-cancel',
                                'href' => AdminController::$currentIndex . '&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules'),
                            ),
                        )
                    ),
                )
            )
        );
    }
    protected function getConfigFormValues()
    {
        if (Tools::isSubmit('submitAddifyexterafieldgeneratormoduleModule' . $this->name) === false) {
            return array(
                'ADDIFYEXTERAFIELDGENERATORMODULE_ACCOUNT_NAME' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ACCOUNT_NAME'),
                'ADDIFYEXTERAFIELDGENERATORMODULE_ADDITIONALFORM' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ADDITIONALFORM'),
                'ADDIFYEXTERAFIELDGENERATORMODULE_CHECKOUTPAGE' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_CHECKOUTPAGE'),
                'ADDIFYEXTERAFIELDGENERATORMODULE_ENABLECHECKOUTPAGE' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ENABLECHECKOUTPAGE'),
            );
        } else {
            return array(
                'ADDIFYEXTERAFIELDGENERATORMODULE_ACCOUNT_NAME' => Tools::getValue('ADDIFYEXTERAFIELDGENERATORMODULE_ACCOUNT_NAME'),
                'ADDIFYEXTERAFIELDGENERATORMODULE_ADDITIONALFORM' => Tools::getValue('ADDIFYEXTERAFIELDGENERATORMODULE_ADDITIONALFORM'),
                'ADDIFYEXTERAFIELDGENERATORMODULE_CHECKOUTPAGE' => Tools::getValue('ADDIFYEXTERAFIELDGENERATORMODULE_CHECKOUTPAGE'),
                'ADDIFYEXTERAFIELDGENERATORMODULE_ENABLECHECKOUTPAGE' => Tools::getValue('ADDIFYEXTERAFIELDGENERATORMODULE_ENABLECHECKOUTPAGE'),
            );
        }
    }
    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();
        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true) . '&conf=3&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name . '&active_tab=1');
    }
    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('configure') == $this->name) {
            Media::addJsDef(array(
                'admincontrollerlink' => $this->context->link->getAdminLink('AdminAddifyb2bregistrationformbuildersetting'),
                ));
            $this->context->controller->addJS($this->_path . 'views/js/back1.js');
            $this->context->controller->addCSS($this->_path . 'views/css/back.css');
        }
    }
    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path . '/views/js/front.js');
        $this->context->controller->addCSS($this->_path . '/views/css/front.css');
    }

    public function hookDisplayCustomerLoginFormAfter($customer)
    {
        $link = new Link;
        $ctrl_form_link = $link->getModuleLink($this->name, 'signupform');
        $this->context->smarty->assign(
            array(
                'controller_link' => $ctrl_form_link,
            )
        );
        return $this->context->smarty->fetch($this->local_path . 'views/templates/hook/loginpage-dropdown-menu.tpl');
    }

    public function hookDisplayOrderConfirmation($params){
        $addifycheckout = addifycheckoutcustomdataforcheckoutpage::getfieldsbycustomerid($this->context->customer->id);
        foreach($addifycheckout as $val){
        $orderdetial = addifycheckoutcustomdataforcheckoutpage::getorderdetail($val['id_cart_checkout']);
        }
        if(!empty($this->context->customer->id)){
        $this->context->smarty->assign(
            array(
                'addifycheckout' => $addifycheckout,
                'orderdetial' => $orderdetial,
                'CHECKOUTPAGE_TITLE' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_CHECKOUTPAGE'),
                'ENABLECHECKOUTPAGE' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ENABLECHECKOUTPAGE'),
            )
        );
    }
    else{
        $this->context->smarty->assign(
            array(
                'addifycheckout' => '',
                'orderdetial' => '',
                'CHECKOUTPAGE_TITLE' => '',
                'ENABLECHECKOUTPAGE' => '',
            )
        );
    }
        return $this->context->smarty->fetch($this->local_path . 'views/templates/front/orderdetail.tpl');
    }

    public function hookDisplayOverrideTemplate($params)
    {
        $data = addifyexterafieldgeneratorclass::getListContent();
        usort($data, function($a, $b) {
            return $a['sort_order'] <=> $b['sort_order'];
        });
        $link = new Link;
        $ctrl_form_link = $link->getModuleLink($this->name, 'signupform');
        $this->context->smarty->assign(
            array(
                'registeration_page_controller' => $ctrl_form_link,
                'additional_fields' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ACCOUNT_NAME'),
                'fields_values' => $data,
                'congriguraion_val' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ADDITIONALFORM'),
            )
        );
        $type = Dispatcher::getInstance()->getController();
        if (($type === 'authentication' || $type === 'registration') && ($params['template_file'] === 'customer/registration')) {
            return _PS_MODULE_DIR_ . $this->name . '/views/templates/front/signupform.tpl';
        }
    }

    public function hookDisplayCustomerAccountForm($params)
    {
        // $Addifyb2bregistrationformfieldsbuilderBlock = addifyexterafieldgeneratorclass::getListContent();
        // $this->context->smarty->assign(
        //     array(
        //         'additional_fields' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ACCOUNT_NAME'),
        //         'fields_values' => $Addifyb2bregistrationformfieldsbuilderBlock,
        //         'congriguraion_val' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ADDITIONALFORM'),
        //     )
        // );
        // return $this->display(__FILE__, 'views/templates/front/additional_fields.tpl');
    }
    public function hookDisplayAdminCustomers($params) // show data on customer detail page (backoffice)
    {
        $customerdatabytheirid = addifyextrafieldcustomerdata::getfieldsbycustomerid($this->context->customer->id);
        $this->context->smarty->assign(
            array(
                "customer_additional_data" => $customerdatabytheirid,
            )
        );
        return $this->display(__FILE__, 'views/templates/admin/customerhistoryformdisplay.tpl');
    }
    public function hookDisplayBeforeCarrier($params)
    {
        $link = $this->context->link->getModuleLink($this->name, 'checkoutform');
        $checkoutpage_additional_fields = addifyexterafieldcheckoutmodel::getListContent();
        $this->context->smarty->assign(
            array(
                "checkoutpage_additional_fields" => $checkoutpage_additional_fields,
                'CHECKOUTPAGE_TITLE' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_CHECKOUTPAGE'),
                'ENABLECHECKOUTPAGE' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ENABLECHECKOUTPAGE'),
                'checkoutcontroller' => $link,
            )
        );
        return $this->display(__FILE__, 'views/templates/front/checkoutpage.tpl');
    }
    // function hookDisplayAddressSelectorBottom()
    // {
    //     echo "hejkasdklsajdlajdl";
    // }
    // function hookDisplayAfterCarrier()
    // {
    //     echo "hejkasdklsajdlajdl";
    // }
    // function hookDisplayBeforeCarrier()
    // {
    //     echo "hejkasdklsajdlajdl";
    // }
    // function hookDisplayCarrierExtraContent()
    // {
    //     echo "hejkasdklsajdlajdl";
    // }
    // function hookDisplayCartExtraProductActions()
    // {
    //     echo "hejkasdklsajdlajdl";
    // }
    public function hookAdditionalCustomerFormFields($params)
    {
        $Addifyb2bregistrationformfieldsbuilderBlock = addifyexterafieldgeneratorclass::getListContent();
        $this->context->smarty->assign(
            array(
                'additional_fields' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ACCOUNT_NAME'),
                'fields_values' => $Addifyb2bregistrationformfieldsbuilderBlock,
                'congriguraion_val' => Configuration::get('ADDIFYEXTERAFIELDGENERATORMODULE_ADDITIONALFORM'),
            )
        );
        return $this->display(__FILE__, 'views/templates/front/additional_fields.tpl');
    }
    protected function getConfigFieldsValues()
    {
        $fields_values = array();
        if (Tools::getValue('id_field') && (Tools::isSubmit('submitAddifyb2bregistrationformbuilderfields') === false)) {
            $Addifyb2bregistrationformfieldsbuilderBlock = new addifyexterafieldgeneratorclass((int) Tools::getValue('id_field'));
            $fields_values['active_field'] = $Addifyb2bregistrationformfieldsbuilderBlock->active_field;
            $fields_values['field_options'] = $Addifyb2bregistrationformfieldsbuilderBlock->field_options;
            $fields_values['placeholder'] = $Addifyb2bregistrationformfieldsbuilderBlock->placeholder;
            $fields_values['field_name'] = $Addifyb2bregistrationformfieldsbuilderBlock->field_name;
            $fields_values['field_type'] = $Addifyb2bregistrationformfieldsbuilderBlock->field_type;
            $fields_values['description'] = $Addifyb2bregistrationformfieldsbuilderBlock->description;
            $fields_values['sort_order'] = $Addifyb2bregistrationformfieldsbuilderBlock->sort_order;
        } else {
            $fields_values['active_field'] = (int) Tools::getValue('active_field');
            $fields_values['field_options'] = Tools::getValue('field_options');
            $fields_values['field_name'] = Tools::getValue('field_name');
            $fields_values['placeholder'] = Tools::getValue('placeholder');
            $fields_values['field_type'] = Tools::getValue('field_type');
            $fields_values['description'] = Tools::getValue('description');
            $fields_values['sort_order'] = Tools::getValue('sort_order');
        }
        return $fields_values;
    }
    protected function processFieldsSave()
    {
        $call_back = 'add';
        $form_values = $this->getConfigFieldsValues();
        if (!isset($form_values) && !$form_values) {
            return $this->context->controller->errors[] = $this->l('Empty post values.');
        }

        if ($form_values['field_type'] == '') {
            return $this->context->controller->errors[] = $this->l('Input Field Label is Empty.');
        }
        if ($form_values['field_name'] == '') {
            return $this->context->controller->errors[] = $this->l('Input Field Name is Empty.');
        }
        if (count($this->context->controller->errors)) {
            return $this->context->controller->errors;
        }
        if ($id_field = Tools::getValue('id_field')) {
            $call_back = 'update';
            $additionalresgisterationformfield = new addifyexterafieldgeneratorclass((int) $id_field);
            $additionalresgisterationformfield->sort_order = $form_values['sort_order'];
        } else {
            $additionalresgisterationformfield = new addifyexterafieldgeneratorclass();
            $additionalresgisterationformfield->sort_order = addifyexterafieldgeneratorclass::getMaxSortOrder();
        }
        $additionalresgisterationformfield->field_options = $form_values['field_options'];
        $additionalresgisterationformfield->active_field = $form_values['active_field'];
        $additionalresgisterationformfield->field_type = $form_values['field_type'];
        $additionalresgisterationformfield->field_name = $form_values['field_name'];
        $additionalresgisterationformfield->placeholder = $form_values['placeholder'];
        $additionalresgisterationformfield->description = $form_values['description'];
        $inp_type = $form_values['field_type'];
        if (strrpos("text textarea number email password switch color date time", $inp_type) == '') {
            $field_options_str = $form_values['field_options'];
            $field_option_sep = explode(',', $field_options_str);
            foreach ($field_option_sep as $key) {
                $str_check = strrpos($key, "->");
                if ($str_check == '') {
                    return $this->context->controller->errors[] = $this->l('invalid Pattern in Input Options.');
                }
                $options = explode('->', $key);
                if ($options[0] == '') {
                    return $this->context->controller->errors[] = $this->l('invalid value in Input Options.');
                } elseif ($options[1] == '') {
                    return $this->context->controller->errors[] = $this->l('invalid option in Input Options.');
                } else {
                    $additionalresgisterationformfield->field_options = $form_values['field_options'];
                }
            }
        } else {
            $additionalresgisterationformfield->field_options = $form_values['field_options'];
        }

        if (!call_user_func(array($additionalresgisterationformfield, $call_back))) {
            $this->context->controller->errors = sprintf($this->l('Something went wrong while performing operation %s'), $call_back);
        } else {
            if ($call_back == 'add') {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true) . '&conf=3&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name . '&active_tab=2');
            } else {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true) . '&conf=4&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name . '&active_tab=2');
            }
        }
    }
    protected function getConfigFieldsValuesforcheckoutform()
    {
        $fields_values = array();
        if (Tools::getValue('id_field_checkout') && (Tools::isSubmit('checkpagesubmission') === false)) {
            $addifyexterafieldcheckoutmodel = new addifyexterafieldcheckoutmodel((int) Tools::getValue('id_field_checkout'));
            $fields_values['active_field'] = $addifyexterafieldcheckoutmodel->active_field_checkout;
            $fields_values['field_options_checkout'] = $addifyexterafieldcheckoutmodel->field_options_checkout;
            $fields_values['field_name_checkout'] = $addifyexterafieldcheckoutmodel->field_name_checkout;
            $fields_values['placeholder_checkout'] = $addifyexterafieldcheckoutmodel->placeholder_checkout;
            $fields_values['field_type_checkout'] = $addifyexterafieldcheckoutmodel->field_type_checkout;
            $fields_values['description_checkout'] = $addifyexterafieldcheckoutmodel->description_checkout;
            $fields_values['sort_order_checkout'] = $addifyexterafieldcheckoutmodel->sort_order_checkout;
        } else {
            $fields_values['active_field'] = (int) Tools::getValue('active_field');
            $fields_values['field_options_checkout'] = Tools::getValue('field_options_checkout');
            $fields_values['field_name_checkout'] = Tools::getValue('field_name_checkout');
            $fields_values['placeholder_checkout'] = Tools::getValue('placeholder_checkout');
            $fields_values['field_type_checkout'] = Tools::getValue('field_type_checkout');
            $fields_values['description_checkout'] = Tools::getValue('description_checkout');
            $fields_values['sort_order_checkout'] = Tools::getValue('sort_order_checkout');
        }
        return $fields_values;
    }
    protected function processFieldsSaveforcheckoutpage()
    {
        $call_back = 'add';
        $form_values = $this->getConfigFieldsValuesforcheckoutform();
        if (!isset($form_values) && !$form_values) {
            return $this->context->controller->errors[] = $this->l('Empty post values.');
        }

        if ($form_values['field_type_checkout'] == '') {
            return $this->context->controller->errors[] = $this->l('Input Field Label is Empty.');
        }
        if ($form_values['field_name_checkout'] == '') {
            return $this->context->controller->errors[] = $this->l('Input Field Name is Empty.');
        }
        if (count($this->context->controller->errors)) {
            return $this->context->controller->errors;
        }
        if ($id_field_checkout = Tools::getValue('id_field_checkout')) {
            $call_back = 'update';
            $addifyexterafieldcheckoutmodel = new addifyexterafieldcheckoutmodel((int) $id_field_checkout);
            $addifyexterafieldcheckoutmodel->sort_order_checkout = $form_values['sort_order_checkout'];
        } else {
            $addifyexterafieldcheckoutmodel = new addifyexterafieldcheckoutmodel();
            $addifyexterafieldcheckoutmodel->sort_order_checkout = addifyexterafieldcheckoutmodel::getMaxSortOrder();
        }
        $addifyexterafieldcheckoutmodel->field_options_checkout = $form_values['field_options_checkout'];
        $addifyexterafieldcheckoutmodel->active_field_checkout = $form_values['active_field'];
        $addifyexterafieldcheckoutmodel->field_type_checkout = $form_values['field_type_checkout'];
        $addifyexterafieldcheckoutmodel->field_name_checkout = $form_values['field_name_checkout'];
        $addifyexterafieldcheckoutmodel->placeholder_checkout = $form_values['placeholder_checkout'];
        $addifyexterafieldcheckoutmodel->description_checkout = $form_values['description_checkout'];
        $inp_type = $form_values['field_type_checkout'];
        if (strrpos("text textarea number email password switch color date time", $inp_type) == '') {
            $field_options_str = $form_values['field_options_checkout'];
            $field_option_sep = explode(',', $field_options_str);
            foreach ($field_option_sep as $key) {
                $str_check = strrpos($key, "->");
                if ($str_check == '') {
                    return $this->context->controller->errors[] = $this->l('invalid Pattern in Input Options.');
                }
                $options = explode('->', $key);
                if ($options[0] == '') {
                    return $this->context->controller->errors[] = $this->l('invalid value in Input Options.');
                } elseif ($options[1] == '') {
                    return $this->context->controller->errors[] = $this->l('invalid option in Input Options.');
                } else {
                    $addifyexterafieldcheckoutmodel->field_options_checkout = $form_values['field_options_checkout'];
                }
            }
        } else {
            $addifyexterafieldcheckoutmodel->field_options_checkout = $form_values['field_options_checkout'];
        }
        if (!call_user_func(array($addifyexterafieldcheckoutmodel, $call_back))) {
            $this->context->controller->errors = sprintf($this->l('Something went wrong while performing operation %s'), $call_back);
        } else {
            if ($call_back == 'add') {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true) . '&conf=3&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name . '&active_tab=3');
            } else {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true) . '&conf=4&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name . '&active_tab=3');
            }
        }
    }
}
