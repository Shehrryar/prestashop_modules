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
class addifyextrafieldcustomerdata extends ObjectModel
{
    public $id_data;
    public $id_customer;
    public $id_field;
    public $field_type;
    public $field_options;
    public $field_name;
    public $field_value;
    public $field_label;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table'     => 'addifycustomercustomdataforregisterationform',
        'primary'   => 'id_data',
        'fields'    => array(
            'id_customer'  => array('type' => self::TYPE_HTML),
            'id_field' => array('type' => self::TYPE_HTML),
            'field_type'  => array('type' => self::TYPE_HTML),
            'field_options' => array('type' => self::TYPE_HTML),
            'field_name' => array('type' => self::TYPE_HTML),
            'field_value' => array('type' => self::TYPE_HTML),
            'field_label' => array('type' => self::TYPE_HTML),

            
        )
    );
    public static function getfieldsbycustomerid($customer_id)
    {
        return Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'addifycustomercustomdataforregisterationform` WHERE `id_customer` = '.(int)$customer_id.'');
    }
    public static function getfieldsbyid($customer_id , $name_suffix_bb)
    {
        return Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'addifycustomercustomdataforregisterationform` WHERE `id_customer` = '.(int)$customer_id.' AND `id_form_group` = '.(int)$name_suffix_bb.'');
    }

}

