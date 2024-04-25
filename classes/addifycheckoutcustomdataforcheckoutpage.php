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
class addifycheckoutcustomdataforcheckoutpage extends ObjectModel
{
    public $id_data_checkout;
    public $id_customer_checkout;
    public $id_field_checkout;
    public $id_cart_checkout;
    public $id_order_checkout;
    public $field_type_checkout;
    public $field_options_checkout;
    public $field_name_checkout;
    public $field_value_checkout;
    public $field_label_checkout;
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table'     => 'addifycheckoutcustomdataforcheckoutpage',
        'primary'   => 'id_data_checkout',
        'fields'    => array(
            'id_customer_checkout' => array('type' => self::TYPE_HTML),
            'id_field_checkout' => array('type' => self::TYPE_HTML),
            'id_cart_checkout' => array('type' => self::TYPE_HTML),
            'id_order_checkout' => array('type' => self::TYPE_HTML),
            'field_type_checkout' => array('type' => self::TYPE_HTML),
            'field_options_checkout' => array('type' => self::TYPE_HTML),
            'field_name_checkout' => array('type' => self::TYPE_HTML),
            'field_value_checkout' => array('type' => self::TYPE_HTML),
            'field_label_checkout' => array('type' => self::TYPE_HTML),
        )
    );
    public static function getfieldsbycustomerid($customer_id)
    {
        return Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'addifycheckoutcustomdataforcheckoutpage` WHERE `id_customer_checkout` = '.(int)$customer_id.'');
    }
    public static function getfieldsbyid($customer_id , $name_suffix_bb)
    {
        return Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'addifycheckoutcustomdataforcheckoutpage` WHERE `id_customer_checkout` = '.(int)$customer_id.' AND `id_form_group` = '.(int)$name_suffix_bb.'');
    }

    public static function getorderdetail($checkout_cart_id)
    {
        return Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'orders` WHERE `id_cart` = '.(int)$checkout_cart_id.'');            
    }
    public static function getDataByFieldAndCart($id_customer, $id_field, $cart_id)
    {
        return Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'addifycheckoutcustomdataforcheckoutpage` WHERE `id_customer_checkout` = '.(int)$id_customer.' AND `id_cart_checkout` = '.(int)$cart_id.' AND `id_field_checkout` = '.(int)$id_field.'');
    }
    
}

