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
	<script type="text/javascript">
		function hideOptionField() {
			var field_type = $("#field_type").val();
			if (field_type == 'checkbox' || field_type == 'radiobutton' || field_type == 'multiselect' || field_type == 'fileupload' || field_type == 'select' || field_type == 'multicheckbox') {
				$("#field_options").parent().parent().show();
			}
			else {
				$("#field_options").parent().parent().hide();
			}
		}

		$(document).ready(function () {
			hideOptionField();
		});

		$(document).ajaxComplete(function () {
			hideOptionField();
		});

	</script>

	<div class="row">
		<div class="col-lg-12">

			<div id="container" class="row">
				<div id="moduleContainer" class="col-md-10">

					<form id="module_form" class="defaultForm form-horizontal"
						action="{$configUrl|escape:'htmlall':'UTF-8'}&amp;customlistingaddifyb2bregistrationformbuilder"
						method="post" enctype="multipart/form-data" novalidate="">
						<input type="hidden" name="submitAddifyb2bregistrationformbuilderfields" value="1">

						<div class="panel" id="fieldset_0">

							<div class="panel-heading">
								<i class="icon-plus"></i>{l s='Create new input field'
								mod='addifyb2bregistrationformbuilder'}
							</div>
							<div class="form-wrapper">
								<div class="form-group hide">
									<input type="hidden" name="id_field_checkout" id="id_field_checkout"
										value="{$fields_value['id_field_checkout']|escape:'htmlall':'UTF-8'}">
								</div>
								<div class="form-group hide">
									<input type="hidden" name="sort_order_checkout" id="sort_order_checkout"
										value="{$fields_value['sort_order_checkout']|escape:'htmlall':'UTF-8'}">
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4">
										{l s='Input Field Name' mod='addifyb2bregistrationformbuilder'}
									</label>
									<div class="col-lg-5">
										<input type="text" name="field_name_checkout" id="field_name_checkout"
											value="{$fields_value['field_name_checkout']|escape:'htmlall':'UTF-8'}" class=""
											placeholder="Field_name_checkout">
										<p class="help-block">
											{l s='This should be unique for example:"name or middle_name" etc.'
											mod='addifyb2bregistrationformbuilder'}
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4">
										{l s='Input Type' mod='addifyb2bregistrationformbuilder'}
									</label>
									<div class="col-lg-2">
										<select name="field_type_checkout" class=" fixed-width-xl" id="field_type_checkout"
											onchange="hideOptionField()">
											<option value="text" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout'] eq 'text' }
												selected="selected" {/if} {/if}>{l s='text'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="textarea" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout']
												eq 'textarea' } selected="selected" {/if} {/if}>{l s='textarea'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="number" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout'] eq 'number'
												} selected="selected" {/if} {/if}>{l s='number'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="email" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout'] eq 'email'
												} selected="selected" {/if} {/if}>{l s='email'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="password" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout']
												eq 'password' } selected="selected" {/if} {/if}>{l s='password'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="radiobutton" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout']
												eq 'radiobutton' } selected="selected" {/if} {/if}>{l s='radiobutton'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="select" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout'] eq 'select'
												} selected="selected" {/if} {/if}>{l s='select'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="fileupload" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout']
												eq 'fileupload' } selected="selected" {/if} {/if}>{l s='fileupload'
												mod='addifyb2bregistrationformbuilder'}</option>
											<option value="switch" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout']
												eq 'textarea' } selected="selected" {/if} {/if}>{l s='switch'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="multiselect" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout']
												eq 'multiselect' } selected="selected" {/if} {/if}>{l s='multiselect'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="checkbox" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout']
												eq 'checkbox' } selected="selected" {/if} {/if}>{l s='checkbox'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="multicheckbox" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout']
												eq 'multicheckbox' } selected="selected" {/if} {/if}>{l
												s='multicheckbox' mod='addifyb2bregistrationformbuilder'}</option>

											<option value="color" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout'] eq 'color'
												} selected="selected" {/if} {/if}>{l s='color'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="date" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout'] eq 'date' }
												selected="selected" {/if} {/if}>{l s='date'
												mod='addifyb2bregistrationformbuilder'}</option>

											<option value="time" {if isset($fields_value['field_type_checkout']) AND
												$fields_value['field_type_checkout']} {if $fields_value['field_type_checkout'] eq 'time' }
												selected="selected" {/if} {/if}>{l s='time'
												mod='addifyb2bregistrationformbuilder'}</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4">
										{l s='Placeholder' mod='addifyb2bregistrationformbuilder'}
									</label>
									<div class="col-lg-5">
										<input type="text" name="placeholder_checkout" id="placeholder_checkout"
											value="{$fields_value['placeholder_checkout']|escape:'htmlall':'UTF-8'}" class=""
											placeholder="placeholder_checkout">
										<p class="help-block">
											{l s='This should be unique for example:"name or middle_name" etc.'
											mod='addifyb2bregistrationformbuilder'}
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4">
										{l s='Input Options' mod='addifyb2bregistrationformbuilder'}
									</label>
									<div class="col-lg-5">
										<input type="text" name="field_options_checkout" id="field_options_checkout"
											value="{$fields_value['field_options_checkout']|escape:'htmlall':'UTF-8'}" class=""
											placeholder="value1->option1,value2->option2,value3->option3...">
										<p class="help-block">
											{l s='Seperate each value and option with -> and all options->values with
											comma sign and incase of file upload set the file extension as
											1->png,2->docs etc..' mod='addifyb2bregistrationformbuilder'}
										</p>
									</div>
								</div>


								<div class="form-group">
									<label class="control-label col-lg-4">
										{l s='Description' mod='addifyb2bregistrationformbuilder'}
									</label>
									<div class="col-lg-5">
										<textarea type="textarea" label="Description_checkout" name="description_checkout"
											required="false" cols="60" rows="10">{$fields_value['description_checkout']|escape:'htmlall':'UTF-8'}</textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4">
										{l s='Active' mod='addifyb2bregistrationformbuilder'}
									</label>
									<div class="col-lg-8">
										<span class="switch prestashop-switch fixed-width-lg">
											{if $fields_value['active_field']==1}
											<input type="radio" name="active_field" id="active_field_on" value="1"
												checked="checked">
											<label for="active_field_on">{l s='Enabled'
												mod='addifyb2bregistrationformbuilder'}</label>
											<input type="radio" name="active_field" id="active_field_off" value="0">
											<label for="active_field_off">{l s='Disabled'
												mod='addifyb2bregistrationformbuilder'}</label>
											<a class="slide-button btn"></a>
											{/if}
											{if $fields_value['active_field']==0}
											<input type="radio" name="active_field" id="active_field_on" value="1">
											<label for="active_field_on">{l s='Enabled'
												mod='addifyb2bregistrationformbuilder'}</label>
											<input type="radio" name="active_field" id="active_field_off" value="0"
												checked="checked">
											<label for="active_field_off">{l s='Disabled'
												mod='addifyb2bregistrationformbuilder'}</label>
											<a class="slide-button btn"></a>
											{/if}
										</span>

										<p class="help-block">
											{l s='Enable to activate new input field.'
											mod='addifyb2bregistrationformbuilder'}
										</p>

									</div>
								</div>

							</div><!-- /.form-wrapper -->

							<div class="panel-footer">
								<button type="submit" value="1" id="module_form_submit_btn"
									name="checkpagesubmission"
									class="btn btn-default pull-right">
									<i class="process-icon-save"></i> {l s='Save'
									mod='addifyb2bregistrationformbuilder'}
								</button>
								<a href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;customlistingaddifyb2bregistrationformbuilder"
									class="btn btn-default btn btn-default"><i class="process-icon-cancel"></i> {l
									s='Cancel' mod='addifyb2bregistrationformbuilder'}</a>
							</div>

						</div>
					</form>

				</div>
			</div>
		</div>
	</div>