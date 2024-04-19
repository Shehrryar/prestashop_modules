<?php
/**
* 2021 Addify
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
*  @author    Addify
*  @copyright 2021 Addify
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {

    exit;

}

class AdminAddifyb2bregistrationformbuilderController extends ModuleAdminController

{

    public function __construct()

    {

        $this->name = 'AdminAddifyb2bregistrationformbuilderController';

        $this->bootstrap = true;

        $this->className = 'Addifyb2bCustomerClass';

        $this->context = Context::getContext();

        parent::__construct();

    }

    public function init()

    {

        parent::init();

    }

    public function display()

    {

        parent::display();

    }

    public function initContent()

    { 

    parent::initContent();

    }



    public function initProcess()

    {   

       $notification = (int)Tools::getValue('notification');

       if($notification == 1){

            $this->context->controller->errors[] = $this->l('Object not found.');

        } elseif($notification == 2){

            $this->context->controller->errors[] = $this->l('B2B Customer cannot be deleted.');

        } elseif($notification == 3){

            $this->context->controller->confirmations[] = $this->l('B2B Customer deleted successfully.');

        } elseif($notification == 4){

            $this->context->controller->errors;

        } elseif($notification == 5){

            $deleted = (int)Tools::getValue('del');

            $this->context->controller->confirmations[] = sprintf($this->l('%s B2B Customers deleted successfully.'), $deleted);

        } elseif ($notification == 6){

            $this->context->controller->errors[] = $this->l('Status update failed.');

        } elseif ($notification == 7){

            $this->context->controller->confirmations[] = $this->l('Status updated successfully.');

        } elseif ($notification == 8){

            $this->context->controller->confirmations[] = $this->l('B2B Customer Activated successfully.');

        } elseif ($notification == 9){

            $this->context->controller->errors[] = $this->l('Something went wrong while Updating B2b Customer Information.');

        } elseif ($notification == 10){

            $this->context->controller->confirmations[] = $this->l('B2B Customer Information Updated successfully.');

        } elseif ($notification == 11){

            $this->context->controller->errors[] = $this->l('Invalid File Format!');

        } else {



        }



        



        parent::initProcess();

        if (Tools::getIsset('updateaddifyb2bcustomers')) {

            $id_addifycustomer = (int)Tools::getValue('id_addifycustomer');

            Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminModules').'&updateaddifyb2bcustomers&configure='.$this->module->name.'&id_addifycustomer='.$id_addifycustomer);

        }

        if (Tools::getIsset('deleteaddifyb2bcustomers')) {

            $id_addifycustomer = (int)Tools::getValue('id_addifycustomer');

            Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminModules').'&deleteaddifyb2bcustomers&configure='.$this->module->name.'&id_addifycustomer='.$id_addifycustomer);

        }

        if (Tools::getIsset('submitBulkdeleteaddifyb2bcustomers')) {

            

            $addifyb2bcustomersBox = Tools::getValue('addifyb2bcustomersBox');

            if (is_array($addifyb2bcustomersBox)) {$addifyb2bcustomersBox = implode(',', $addifyb2bcustomersBox);}            

            Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminModules').'&submitBulkdeleteaddifyb2bcustomers&configure='.$this->module->name.'&addifyb2bcustomersBox='.$addifyb2bcustomersBox);

        }

         if (Tools::getIsset('submitBulkapprovedaddifyb2bcustomers')) {

            $addifyb2bcustomersBox = Tools::getValue('addifyb2bcustomersBox');

            if (is_array($addifyb2bcustomersBox)) {$addifyb2bcustomersBox = implode(',', $addifyb2bcustomersBox);}            

            Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminModules').'&submitBulkapprovedaddifyb2bcustomers&configure='.$this->module->name.'&addifyb2bcustomersBox='.$addifyb2bcustomersBox);

        }

        if (Tools::getIsset('submitBulkrejectaddifyb2bcustomers')) {

            

            $addifyb2bcustomersBox = Tools::getValue('addifyb2bcustomersBox');

            if (is_array($addifyb2bcustomersBox)) {$addifyb2bcustomersBox = implode(',', $addifyb2bcustomersBox);}            

            Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminModules').'&submitBulkrejectaddifyb2bcustomers&configure='.$this->module->name.'&addifyb2bcustomersBox='.$addifyb2bcustomersBox);

        }


        if (Tools::getIsset('statusaddifyb2bcustomers')) {

            $id_addifycustomer = (int)Tools::getValue('id_addifycustomer');

            Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminModules').'&statusaddifyb2bcustomers&configure='.$this->module->name.'&id_addifycustomer='.$id_addifycustomer);

        }

    }



    public function renderList()

    {

        $fields_list = array(

            'id_addifycustomer' => array(

                'title' => $this->l('B2B ID'),

                'width' => 50,

                'type' => 'text',

                'search' => false,

                'orderby' => false

            ),

            'id_customer' => array(

                'title' => $this->l('Customer ID'),

                'width' => 50,

                'type' => 'text',

                'search' => false,

                'orderby' => false

            ),

            'First_Name_default' => array(

                'title' => $this->l('First Name'),

                'width' => 140,

                'type' => 'text',

                'search' => false,

                'orderby' => false

            ),

            'email_default' => array(

                'title' => $this->l('Email'),

                'width' => 240,

                'type' => 'text',

                'search' => false,

                'orderby' => false

            ),



            'active' => array(

                'title' => $this->l('Status'),

                'width' => 50,

                'active' => 'status',

                'type' => 'bool',

                'search' => false,

                'orderby' => false

            ),



        );



        // multishop feature

        if (Shop::isFeatureActive()) {

            $this->fields_list['id_shop'] = array(

                'title' => $this->l('ID Shop'),

                'align' => 'center',

                'width' => 25,

                'type' => 'int'

            );

        }



        $helper = new HelperList();

        $helper->shopLinkType = '';

        $helper->simple_header = false;

        $helper->identifier = 'id_addifycustomer';

        $helper->actions = array('edit', 'delete');

        $helper->bulk_actions = array(

            'delete' => array(

                'text' => $this->l('Delete selected'),

                'icon' => 'icon-trash',

                'confirm' => $this->l('Delete selected items?')

            ),
            'approved' => array(

                'text' => $this->l('Approved Selected'),

                'icon' => 'icon-trash',

                'confirm' => $this->l('Approved selected items?')

            ),
            'reject' => array(

                'text' => $this->l('Reject Selected'),

                'icon' => 'icon-trash',

                'confirm' => $this->l('Reject selected items?')

            )

        );

        $helper->listTotal = count(Addifyb2bCustomerClass::getAddifyCustomers());

        $helper->title = $this->l('Manage your B2B Customers');

        $helper->table = 'addifyb2bcustomers';

        $helper->currentIndex = AdminController::$currentIndex;

        $helper->token = Tools::getAdminTokenLite('AdminAddifyb2bregistrationformbuilder');

        // $helper->token = Tools::getAdminTokenLite('AdminModules');

        return $helper->generateList(Addifyb2bCustomerClass::getAddifyCustomers(), $fields_list);

    }



}