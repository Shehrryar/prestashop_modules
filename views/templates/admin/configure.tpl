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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2024 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="row">
	<div class="col-lg-12">
		<div id="container" class="row">
			<div id="moduleContainer">
				<div class="sidebarTabs navigation col-md-2">
					<nav class="list-group">
						<a class="list-group-item  nav-sidebar-tabs {if $active_tab eq 1} active {/if} " id="generalsettingtab" href="#tab_1" data-toggle="tab">{l s='General Settings' mod='Addifyexterafieldgeneratormodule'}</a>
						<a class="list-group-item nav-sidebar-tabs {if $active_tab eq 2} active {/if}" id="registerationformtab" href="#tab_2" data-toggle="tab">{l s='Registeration from' mod='Addifyexterafieldgeneratormodule'}</a>
						<a class="list-group-item nav-sidebar-tabs {if $active_tab eq 3} active {/if}" id="checkoutpagetab" href="#tab_3" data-toggle="tab">{l s='Checkout page' mod='Addifyexterafieldgeneratormodule'}</a>

					</nav>
				</div>
				<div class="tab-content col-md-10">
					<div id="tab_1" class=" {if $active_tab eq 1} active {/if} tab-pane">
						<div class="form-group" data-tab-id="tab_1">
							{$render_confriguration_form}
						</div>
					</div>
					<div id="tab_2" class="{if $active_tab eq 2} active {/if} tab-pane">
						<div class="form-group" data-tab-id="tab_2">
							{$registerationformrenderList}
						</div>
					</div>
					<div id="tab_3" class="{if $active_tab eq 3} active {/if} tab-pane">
						<div class="form-group" data-tab-id="tab_3">
							{$checkoutformrenderList}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	if (document.getElementById("generalsettingtab")) {

		document.getElementById("generalsettingtab").onclick = function() {

			var class_element = document.getElementsByClassName("nav-sidebar-tabs");

			for (var i = 0; i < class_element.length; i++) {
				class_element[i].classList.remove("active");
			}

		  	var element = document.getElementById("generalsettingtab");
	  		element.classList.add("active");
		};
	}


	if (document.getElementById("registerationformtab")) {
		
		document.getElementById("registerationformtab").onclick = function() {

			var class_element = document.getElementsByClassName("nav-sidebar-tabs");

			for (var i = 0; i < class_element.length; i++) {
				class_element[i].classList.remove("active");
			}

		  	var element = document.getElementById("registerationformtab");
	  		element.classList.add("active");
		};
	}
	
	if (document.getElementById("checkoutpagetab")) {
		
		document.getElementById("checkoutpagetab").onclick = function() {

			var class_element = document.getElementsByClassName("nav-sidebar-tabs");

			for (var i = 0; i < class_element.length; i++) {
				class_element[i].classList.remove("active");
			}

		  	var element = document.getElementById("checkoutpagetab");
	  		element.classList.add("active");
		};
	}
	
</script>