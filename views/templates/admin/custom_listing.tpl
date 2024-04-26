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
<!-- <script type="text/javascript">
  	function sendBulkActionFields(id,name){
    	const myElement = document.getElementById("configUrl").value;
    	var addifyb2bregistrationformbuilderfieldsBox = [];
    	$("."+name+":checked").each( function () {
    		var check_value = $(this).val();
    		addifyb2bregistrationformbuilderfieldsBox.push(check_value);
	   });
    	var link = myElement+"&submitBulkdeleteaddifyb2bregistrationformbuilderfields&addifyb2bregistrationformbuilderfieldsBox="+addifyb2bregistrationformbuilderfieldsBox;
		location.replace(link);    	
   }
</script> -->
<div class="row">
	<div class="col-lg-12">
		<div id="container" class="row">
			<div class="sidebarTabs navigation col-md-2">
				<nav class="list-group">
					<a class="list-group-item nav-bar-tabs" id="tab-bar-1"  href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;generaladdifyb2bregistrationformbuilder">{l s='General Settings' mod='addifyb2bregistrationformbuilder'}</a>
					<a class="list-group-item nav-bar-tabs" id="tab-bar-2"  href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;formbuilderrulesaddifyb2bregistrationformbuilder">{l s='Registeration Form' mod='addifyb2bregistrationformbuilder'}</a>
					<a class="list-group-item active nav-bar-tabs" id="tab-bar-3"  href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;customlistingaddifyb2bregistrationformbuilder">{l s='Checkout Page' mod='addifyb2bregistrationformbuilder'}</a>
				</nav>
			</div>
			<div id="moduleContainer" class="col-md-10">
				<form method="post" action="{$configUrl|escape:'htmlall':'UTF-8'}&amp;customlistingaddifyb2bregistrationformbuilder" class="form-horizontal clearfix" id="form-addifyb2bregistrationformbuilderfields">
					<input type="hidden" id="submitFilteraddifyb2bregistrationformbuilderfields" name="submitFilteraddifyb2bregistrationformbuilderfields" value="0">
					<input type="hidden" name="page" value="1">
					<input type="hidden" name="configUrl" id="configUrl" value="{$configUrl|escape:'htmlall':'UTF-8'}">
					<input type="hidden" name="selected_pagination" value="50">
					<div class="panel col-lg-12">
						<div class="panel-heading">
							{l s='Custom Fields' mod='addifyb2bregistrationformbuilder'}
							<span class="badge">{$rulesCount|escape:'htmlall':'UTF-8'}</span>
							<span class="panel-heading-action">
								<a id="desc-addifyb2bregistrationformbuilderfields-new" class="list-toolbar-btn" href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;addfieldaddifyb2bregistrationformbuilder">
									<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true" data-placement="top">
										<i class="process-icon-new"></i>
									</span>
								</a>
								<a class="list-toolbar-btn" href="javascript:location.reload();">
									<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Refresh list" data-html="true" data-placement="top">
										<i class="process-icon-refresh"></i>
									</span>
								</a>
							</span>
						</div>
						<div class="table-responsive-row clearfix">
							<table id="table-addifyb2bregistrationformbuilderfields" class="table addifyb2bregistrationformbuilderfields">
								<thead>
									<tr class="nodrag nodrop">
										<th class="center fixed-width-xs"></th>
										<th class="">
											<span class="title_box">
												{l s='Field ID' mod='addifyb2bregistrationformbuilder'}
											</span>
										</th>
										<th class="">
											<span class="title_box">
												{l s='Field Label' mod='addifyb2bregistrationformbuilder'}
											</span>
										</th>
										<th class="">
											<span class="title_box">
												{l s='Field Status' mod='addifyb2bregistrationformbuilder'}
											</span>
										</th>
										<th class="pointer dragHandle">
											<span class="title_box">
												{l s='Position' mod='addifyb2bregistrationformbuilder'}
											</span>
										</th>
										<th class="">
											<span class="title_box">
												{l s='Form Group ID' mod='addifyb2bregistrationformbuilder'}
											</span>
										</th>
										<th class="">
											<span class="title_box">
												{l s='Field Type' mod='addifyb2bregistrationformbuilder'}
											</span>
										</th>
										<th></th>
									</tr>
								</thead>

								<tbody class="ui-sortable">
									{if isset($allRules) AND $allRules}
				                    {foreach from=$allRules item=Rule}
									<tr class=" odd" id="item_{$Rule['id_field']|escape:'htmlall':'UTF-8'}">
										<td class="row-selector text-center">
											<input type="checkbox" name="addifyb2bregistrationformbuilderfieldsBox[]" value="{$Rule['id_field']|escape:'htmlall':'UTF-8'}" class="noborder addifyb2bregistrationformbuilderfieldsBox">
										</td>
										<td class="pointer column-id_field" onclick="document.location = '{$configUrl|escape:'htmlall':'UTF-8'}&amp;updateaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}'">
											{$Rule['id_field']|escape:'htmlall':'UTF-8'}
										</td>
										<td class="pointer column-field_label" onclick="document.location = '{$configUrl|escape:'htmlall':'UTF-8'}&amp;updateaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}'">
											
											
											{$Rule['field_label']|escape:'htmlall':'UTF-8'}
											
											
										</td>

										{if $Rule['active_field']==0}
										<td class="pointer column-active" onclick="document.location = '{$configUrl|escape:'htmlall':'UTF-8'}&amp;updateaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}'">
																																
											<a class="list-action-enable action-disabled" href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;statusaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}" title="Disabled">
												<i class="icon-check hidden"></i>
												<i class="icon-remove"></i>
											</a>	

										</td>

										{/if}
										{if $Rule['active_field']==1}
										<td class="pointer column-active" onclick="document.location = '{$configUrl|escape:'htmlall':'UTF-8'}&amp;updateaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}'">

											<a class="list-action-enable action-enabled" href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;statusaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}" title="Enabled">
												<i class="icon-check"></i>
												<i class="icon-remove hidden"></i>
											</a>

										</td>
										{/if}

										<td class="pointer column-sort_order pointer dragHandle" onclick="document.location = '{$configUrl|escape:'htmlall':'UTF-8'}&amp;updateaddifyb2bregistrationformbuilderfields=&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}'">
											<div class="dragGroup">
												<div class="positions">
	
													{$Rule['sort_order']|escape:'htmlall':'UTF-8'}
													
												</div>
											</div>
										</td>
										
										
										<td class="pointer column-id_form_group" onclick="document.location = '{$configUrl|escape:'htmlall':'UTF-8'}&amp;updateaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}'">
											
											
											{$Rule['id_form_group']|escape:'htmlall':'UTF-8'}
											
											
										</td>
										
										
										<td class="pointer column-field_type" onclick="document.location = '{$configUrl|escape:'htmlall':'UTF-8'}&amp;updateaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}'">
											
											
											{$Rule['field_type']|escape:'htmlall':'UTF-8'}
											
											
										</td>
										
										
										<td class="text-right">
											<div class="btn-group-action">				
												<div class="btn-group pull-right">
													<a href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;updateaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}" title="Edit" class="edit btn btn-default">
														<i class="icon-pencil"></i> {l s='Edit' mod='addifyb2bregistrationformbuilder'}
													</a>

													<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
														<i class="icon-caret-down"></i>
													</button>
													<ul class="dropdown-menu">
														<li>
															<a href="#" title="Delete" class="delete" onclick="confirm_link('', 'Delete selected item?', 'Yes', 'No', '{$configUrl|escape:'htmlall':'UTF-8'}&amp;deleteaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}', '#')">
																<i class="icon-trash"></i> {l s='Delete' mod='addifyb2bregistrationformbuilder'}
															</a>
														</li>
													</ul>
												</div>
											</div>					
										</td>
									</tr>
									{/foreach}
				                    {else}

									<tr>
										<td class="list-empty" colspan="8">
											<div class="list-empty-msg">
												<i class="icon-warning-sign list-empty-icon"></i>
												{l s='No records found' mod='addifyb2bregistrationformbuilder'}
											</div>
										</td>
									</tr>
									{/if}
								</tbody>

							</table>
						</div>
						<div class="row">
							<div class="col-lg-6">
								{if isset($allRules) AND $allRules}
								<div class="btn-group bulk-actions dropup">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="bulk_action_menu_addifyb2bregistrationformbuilderfields">
										{l s='Bulk actions' mod='addifyb2bregistrationformbuilder'} <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li>
											<a href="#" onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'addifyb2bregistrationformbuilderfieldsBox[]', true);return false;">
												<i class="icon-check-sign"></i>&nbsp;{l s='Select all' mod='addifyb2bregistrationformbuilder'}
											</a>
										</li>
										<li>
											<a href="#" onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'addifyb2bregistrationformbuilderfieldsBox[]', false);return false;">
												<i class="icon-check-empty"></i>&nbsp;{l s='Unselect all' mod='addifyb2bregistrationformbuilder'}
											</a>
										</li>
										<li class="divider"></li>
										<li>
											<a href="#" onclick="if (confirm('Delete selected items?'))sendBulkActionFields($(this).closest('form').get(0), 'addifyb2bregistrationformbuilderfieldsBox');">
												<i class="icon-trash"></i>&nbsp;{l s='Delete selected' mod='addifyb2bregistrationformbuilder'}
											</a>
										</li>
									</ul>
								</div>
								{/if}
							</div>
						</div>
						<input type="hidden" name="token" value="{$adminToken|escape:'htmlall':'UTF-8'}">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>