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
 * @author Addify
 * @copyright 2021 Addify
 * @license http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
    exit;
}
class AdminExtrafieldController extends ModuleAdminController
{

    public function init()
    {
        if ($this->ajax) {
            $this->ajaxUpdatePositionForm();
        }

        Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminModules') . '&configure=' . $this->module->name);

    }
    public function ajaxUpdatePositionForm()
    {
        // Initialize $success variable
        $success = true;
        // Get the ordered data from the request
        $items = json_decode(Tools::getValue('ordered_data'),true);
        // Check if items array is not empty
        if (!empty($items)) {
            $i = 1;
            foreach ($items as $item) {
                // Extract numerical part of the item identifier
                preg_match('/(item_)([0-9]+)/', $item, $matches);
                $itemId = (int)$matches[2];
    
                // Update sort_order column in customfieldsbuilder table
                $success &= Db::getInstance()->update(
                    'customfieldsbuilder',
                    array('sort_order' => $i),
                    '`id_field` = ' . (int)$itemId
                );
                $i++;
            }
        } else {
            // Handle case where no items are received
            $success = false;
        }
    
        // Return response indicating success or failure
        if ($success) {
            die(json_encode(array('success' => true)));
        } else {
            die(json_encode(array('error' => 'Failed to update positions')));
        }
    }
    

}