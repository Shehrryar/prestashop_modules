{*
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
* @author PrestaShop SA <contact@prestashop.com>
    * @copyright 2007-2024 PrestaShop SA
    * @license http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
    * International Registered Trademark & Property of PrestaShop SA
    *}

    <div class="row">
        <div class="col-lg-12">

            <div id="container" class="row">
                <div class="sidebarTabs navigation col-md-2">
                    <nav class="list-group">
                        <a class="list-group-item  nav-sidebar-tabs {if $active_tab eq 1} active {/if} "
                            id="generalsettingtab" href="#tab_1" data-toggle="tab">{l s='General Settings'
                            mod='Addifyexterafieldgeneratormodule'}</a>
                        <a class="list-group-item nav-sidebar-tabs {if $active_tab eq 2} active {/if}"
                            id="registerationformtab" href="#tab_2" data-toggle="tab">{l s='Registeration from'
                            mod='Addifyexterafieldgeneratormodule'}</a>
                        <a class="list-group-item nav-sidebar-tabs {if $active_tab eq 3} active {/if}"
                            id="checkoutpagetab" href="#tab_3" data-toggle="tab">{l s='Checkout page'
                            mod='Addifyexterafieldgeneratormodule'}</a>

                    </nav>
                </div>
                <div class="col-md-10">
                    <!-- {$registeration_form} -->
                </div>
            </div>
        </div>
    </div>

    