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

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => '8.0');
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('ADDIFYEXTERAFIELDGENERATORMODULE_LIVE_MODE', false);

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('displayBackOfficeHeader') &&
            $this->registerHook('displayCustomerAccountForm');
    }

    public function uninstall()
    {
        Configuration::deleteByName('ADDIFYEXTERAFIELDGENERATORMODULE_LIVE_MODE');

        return parent::uninstall();
    }
    /**
     * Load the configuration form
     */
    public function getContent()
    {
        if (((bool) Tools::isSubmit('submitAddifyexterafieldgeneratormoduleModule')) == true) {
            $this->postProcess();
        }

        $active_tab = Tools::getValue('active_tab');
        if (!$active_tab) {
            $active_tab = 1;
        }

        $this->context->smarty->assign(
            array(
                'render_confriguration_form' => $this->renderForm(),
                'registerationformrenderList' => $this->registerationformrenderList(),
                'checkoutformrenderList' => $this->checkoutformrenderList(),
                'active_tab' => $active_tab
            )
        );

        if (((bool) Tools::isSubmit('addregisteraddifyexterafieldgeneratormodule')) == true) {

            return $this->registerationform();
        }


        if (((bool) Tools::isSubmit('addchekoutaddifyexterafieldgeneratormodule')) == true) {

            return $this->Checkoutpage();

        }

        return $this->display(__FILE__, 'views/templates/admin/configure.tpl');
    }
    protected function Checkoutpage()
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
                            'title' => $this->l('Create Additional Fields for the Checkout Page'),
                            'icon' => 'icon-cogs'
                        ),
                        'input' => array(
                            array(
                                'col' => 3,
                                'type' => 'text',
                                'desc' => $this->l('Registeration form field name'),
                                'name' => 'ADDIFYEXTERAFIELDGENERATORMODULE_ACCOUNT_NAME',
                                'label' => $this->l('Label for "Additional Information" on the regestration form'),
                            ),
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
                                'desc' => $this->l('checkout field name'),
                                'name' => 'ADDIFYEXTERAFIELDGENERATORMODULE_CHECKOUTPAGE',
                                'label' => $this->l('Label for "Additional Information" on the checkout form'),
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
                        ),
                        'submit' => array(
                            'title' => $this->l('Save'),
                        ),
                    ),
                )
            )
        );
    }
    public function checkoutformrenderList()
    {
        $data = array();
        $fields_list = array(
            'id_addifycmspopup' => array(
                'title' => $this->l('ID'),
                'type' => 'text',
                'search' => false,
            ),
            'title' => array(
                'title' => $this->l('Title'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'priority' => array(
                'title' => $this->l('Priority'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
                'title' => $this->l('Status'),
                'width' => 140,
                'active' => 'status',
                'type' => 'bool',
                'search' => false,
                'orderby' => false
            ),
            'date_add' => array(
                'title' => $this->l('Added Date'),
                'width' => 140,
                'type' => 'datetime',
                'search' => false,
                'orderby' => false
            ),
            'date_upd' => array(
                'title' => $this->l('Update Date'),
                'width' => 140,
                'type' => 'datetime',
                'search' => false,
                'orderby' => false
            ),
        );
        // Prepare options for HelperList
        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->show_toolbar = true;
        $helper->toolbar_btn['new'] = array(
            'href' => AdminController::$currentIndex . '&configure=' . $this->name . '&addchekout' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->l('Add new')
        );
        $helper->actions = array('edit', 'delete', 'view');
        $helper->module = $this;
        $helper->title = $this->l('Checkout Rule for Creating Additional Field');
        $helper->table = 'addcheckoutdata';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;

        // Load list values
        $helper->listTotal = count($data);
        $helper->identifier = 'id_addifycmspopup';
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


    protected function registerationform()
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

        $arry_fieldtype= array(
            array(
            'id_field' =>1,
            'fieldname'=> 'text'    
        ),
        array(
            'id_field' =>2,
            'fieldname'=> 'checkbox'    
        ),
        array(
            'id_field' =>3,
            'fieldname'=> 'Radio'    
        ),
        array(
            'id_field' =>4,
            'fieldname'=> 'Select'    
        ),
        array(
            'id_field' =>5,
            'fieldname'=> 'Group'    
        ),
        array(
            'id_field' =>6,
            'fieldname'=> 'date'    
        ),

        array(
            'id_field' =>7,
            'fieldname'=> 'Switch'    
        ),
        array(
            'id_field' => 8,
            'fieldname' => 'textarea'
        )

    );

        return $helper->generateForm(
            array(
                array(
                    'form' => array(
                        'legend' => array(
                            'title' => $this->l('Create Additional Fields for the Registeration Form'),
                            'icon' => 'icon-cogs'
                        ),
                        'input' => array(
                            array(
                                'col' => 3,
                                'type' => 'text',
                                'name' => 'registertitlefield',
                                'label' => $this->l('Field Title'),
                                'placeholder' => $this->l('How do you know about us'),
                            ),
                            array(
                                'type' => 'select',
                                'label' => $this->l('Field Title'),
                                'name' => 'fieldtypecheckout',
                                'desc' => $this->l('Please mark page that you want to show popup'),
                                'options' => array(
                                    'query' => $arry_fieldtype,
                                    'id' => 'id_field',
                                    'name' => 'fieldname',
                                ),
                            ),
                            array(
                                'type' => 'textarea',
                                'label' => $this->l('Description'),
                                'name' => 'fieldtypedescription',
                                'required' => false,
                                'cols' => 60,
                                'rows' => 10,
                            ),
                            array(
                                'type' => 'switch',
                                'label' => $this->l('Enable'),
                                'name' => 'fieldenable',
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
                        ),
                        'submit' => array(
                            'title' => $this->l('Save'),
                        ),
                    ),
                )
            )
        );
    }
    public function registerationformrenderList()
    {
        $data = array();
        $fields_list = array(
            'id_addifycmspopup' => array(
                'title' => $this->l('ID'),
                'type' => 'text',
                'search' => false,
            ),
            'title' => array(
                'title' => $this->l('Title'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'priority' => array(
                'title' => $this->l('Priority'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
                'title' => $this->l('Status'),
                'width' => 140,
                'active' => 'status',
                'type' => 'bool',
                'search' => false,
                'orderby' => false
            ),
            'date_add' => array(
                'title' => $this->l('Added Date'),
                'width' => 140,
                'type' => 'datetime',
                'search' => false,
                'orderby' => false
            ),
            'date_upd' => array(
                'title' => $this->l('Update Date'),
                'width' => 140,
                'type' => 'datetime',
                'search' => false,
                'orderby' => false
            ),
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
        $helper->title = $this->l('Manage CMS Popup');
        $helper->table = 'addregisterationformdata';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;

        // Load list values
        $helper->listTotal = count($data);
        $helper->identifier = 'id_addifycmspopup';
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
                                'col' => 3,
                                'type' => 'text',
                                'desc' => $this->l('Registeration form field name'),
                                'name' => 'ADDIFYEXTERAFIELDGENERATORMODULE_ACCOUNT_NAME',
                                'label' => $this->l('Label for "Additional Information" on the regestration form'),
                            ),
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
                                'desc' => $this->l('checkout field name'),
                                'name' => 'ADDIFYEXTERAFIELDGENERATORMODULE_CHECKOUTPAGE',
                                'label' => $this->l('Label for "Additional Information" on the checkout form'),
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
                        ),
                        'submit' => array(
                            'title' => $this->l('Save'),
                        ),
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
            $this->context->controller->addJS($this->_path . 'views/js/back.js');
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
    public function hookDisplayCustomerAccountForm()
    {
        /* Place your code here. */
        echo "this hook is for the additional information";
    }
}
