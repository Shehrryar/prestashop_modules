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
$sql = array();
$sql[] = 'CREATE TABLE IF NOT EXISTS`' . _DB_PREFIX_ . 'customfieldsbuilder`(

    `id_field`    int(11) NOT NULL AUTO_INCREMENT,
    `sort_order`                    int(11),
    `field_name`                  TEXT,
    `field_type`                  TEXT,
    `placeholder`               TEXT,
    `field_options`               TEXT,
    `description`                TEXT,
    `active_field`                TINYINT(2),
    PRIMARY KEY  (`id_field`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' ._DB_PREFIX_.'customfieldsbuilder_lang` (
    `id_field`            INT(11) NOT NULL,
    `id_lang`             INT(11) NOT NULL,
    `field_label`         TEXT,
    `place_holder`        TEXT,
    PRIMARY KEY                     (`id_field`, `id_lang`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';


$sql[] = 'CREATE TABLE IF NOT EXISTS`' . _DB_PREFIX_ . 'addifyformbuilderfieldsforcheckoutpage` (

    `id_field_checkout`    int(11) NOT NULL AUTO_INCREMENT,
    `sort_order_checkout`                    int(11),
    `field_name_checkout`                  TEXT,
    `field_type_checkout`                  TEXT,
    `placeholder_checkout`               TEXT,
    `field_options_checkout`               TEXT,
    `description_checkout`                TEXT,
    `active_field_checkout`                TINYINT(2),
    PRIMARY KEY  (`id_field_checkout`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' ._DB_PREFIX_.'addifyformbuilderfieldsforcheckoutpage_lang` (
    `id_field_checkout`            INT(11) NOT NULL,
    `id_lang`             INT(11) NOT NULL,
    `field_label`         TEXT,
    `place_holder`        TEXT,
    PRIMARY KEY                     (`id_field_checkout`, `id_lang`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'addifycustomercustomdataforregisterationform` (
        `id_data`                     int(11) NOT NULL AUTO_INCREMENT,
        `id_customer`                 int(11) NOT NULL,
        `id_field`                    int(11) NOT NULL,
        `field_label`                 TEXT,
        `field_type`                  TEXT,
        `field_options`               TEXT,
        `field_name`                  TEXT,
        `field_value`                 TEXT,
        PRIMARY KEY  (`id_data`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';


$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'addifycheckoutcustomdataforcheckoutpage` (
        `checkout_id_data`                     int(11) NOT NULL AUTO_INCREMENT,
        `checkout_id_customer`                 int(11) NOT NULL,
        `checkout_id_field`                    int(11) NOT NULL,
        `checkout_field_label`                 TEXT,
        `checkout_field_type`                  TEXT,
        `checkout_field_options`               TEXT,
        `checkout_field_name`                  TEXT,
        `checkout_field_value`                 TEXT,
        PRIMARY KEY  (`checkout_id_data`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}


