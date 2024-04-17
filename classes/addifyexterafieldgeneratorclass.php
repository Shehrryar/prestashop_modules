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
class addifyexterafieldgeneratorclass extends ObjectModel
{
    public $id_field;
    public $active_field;
    public $field_type;
    public $placeholder;
    public $description;
    public $field_options;
    public $sort_order;
    public $field_name;
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table'     => 'customfieldsbuilder',
        'primary'   => 'id_field',
        'multilang' => true,
        'fields'    => array(
            'active_field'  => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'field_type' => array('type' => self::TYPE_HTML),
            'placeholder' => array('type' => self::TYPE_HTML),
            'description' => array('type' => self::TYPE_HTML),
            'field_options' => array('type' => self::TYPE_HTML),
            'sort_order' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'field_name' => array('type' => self::TYPE_HTML),
        )
    );
    public static function getListContent()
    {
        return DB::getInstance()->executes(
            'SELECT * FROM `' . _DB_PREFIX_ . 'customfieldsbuilder`'
        );
    }
    public static function setStatus($status, $id_field)
    {
        if (!$id_field || empty($status)) {
            return false;
        }
        return (bool)Db::getInstance()->execute('UPDATE '._DB_PREFIX_.self::$definition['table'].'
            SET `'.pSQL($status).'` = !'.pSQL($status).'
            WHERE id_field = '.(int)$id_field);
    }
    public static function getMaxSortOrder()
    {
        $result = Db::getInstance()->ExecuteS('
            SELECT MAX(sort_order) AS sort_order
            FROM `'._DB_PREFIX_.'customfieldsbuilder`');
        if (!$result) {
            return false;
        }
        foreach ($result as $res) {
            $result = $res['sort_order'];
        }
        $result = $result + 1;
        return $result;
    }
    public static function getlastfieldid()
    {
        return Db::getInstance()->executeS('
            SELECT `id_field` FROM `'._DB_PREFIX_.'customfieldsbuilder` ORDER BY id_field DESC');
    }

}

