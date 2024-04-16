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
			var field_type = $("#field_type_checkout").val();
			if (field_type == 'checkbox' || field_type == 'radiobutton' || field_type == 'multiselect' || field_type == 'fileupload' || field_type == 'select' || field_type == 'multicheckbox') {
				$("#field_options_checkout").parent().parent().show();
			}
			else {
				$("#field_options_checkout").parent().parent().hide();
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
			<form id="module_form" class="defaultForm form-horizontal"
				action="{$configUrl|escape:'htmlall':'UTF-8'}&amp;customlistingaddifyb2bregistrationformbuilder"
				method="post" enctype="multipart/form-data" novalidate="">
				<input type="hidden" name="submitAddifyb2bregistrationformbuilderfields" value="1">
				<div class="panel" id="fieldset_0">
					<div class="panel-heading">
						<i class="icon-plus"></i>{l s='Create Additional Fields for Checkout Page' mod='Addifyexterafieldgeneratormodule'}
					</div>
					<div class="form-wrapper">
						<div class="form-group hide">
							<input type="hidden" name="id_field_checkout" id="id_field_checkout" value="0">
						</div>
						<div class="form-group hide">
							<input type="hidden" name="sort_order_checkout" id="sort_order_checkout" value="0">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4">
							{l s='Input Field Name' mod='Addifyexterafieldgeneratormodule'}
						</label>
						<div class="col-lg-5">
							<input type="text" name="field_name_checkout" id="field_name_checkout" value="" class=""
								placeholder="Field_name">
							<p class="help-block">
								{l s='This should be unique for example:"name or middle_name" etc.'
								mod='Addifyexterafieldgeneratormodule'}
							</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4">
							{l s='Input Type' mod='Addifyexterafieldgeneratormodule'}
						</label>
						<div class="col-lg-2">
							<select name="field_type_checkout" class=" fixed-width-xl" id="field_type_checkout"
								onchange="hideOptionField()">
								<option value="text">{l s='text' mod='Addifyexterafieldgeneratormodule'}</option>
								<option value="textarea">{l s='textarea' mod='Addifyexterafieldgeneratormodule'}
								</option>
								<option value="number">{l s='number' mod='Addifyexterafieldgeneratormodule'}</option>
								<option value="email">{l s='email' mod='Addifyexterafieldgeneratormodule'}</option>
								<option value="password">{l s='password' mod='Addifyexterafieldgeneratormodule'}
								</option>
								<option value="radiobutton">{l s='radiobutton' mod='Addifyexterafieldgeneratormodule'}
								</option>
								<option value="select">{l s='select' mod='Addifyexterafieldgeneratormodule'}</option>
								<option value="fileupload">{l s='fileupload' mod='Addifyexterafieldgeneratormodule'}
								</option>
								<option value="switch">{l s='switch' mod='Addifyexterafieldgeneratormodule'}</option>
								<option value="multiselect">{l s='multiselect' mod='Addifyexterafieldgeneratormodule'}
								</option>
								<option value="checkbox">{l s='checkbox' mod='Addifyexterafieldgeneratormodule'}
								</option>
								<option value="multicheckbox">{l s='multicheckbox'
									mod='Addifyexterafieldgeneratormodule'}</option>
								<option value="color">{l s='color' mod='Addifyexterafieldgeneratormodule'}</option>
								<option value="date">{l s='date' mod='Addifyexterafieldgeneratormodule'}</option>
								<option value="time">{l s='time' mod='Addifyexterafieldgeneratormodule'}</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4">
							{l s='Placeholder' mod='Addifyexterafieldgeneratormodule'}
						</label>
						<div class="col-lg-5">
							<input type="text" name="placeholder_checkout" id="placeholder_checkout" value="" class=""
								placeholder="placeholder">
							<p class="help-block">
								{l s='This should be unique for example:"name or middle_name" etc.'
								mod='Addifyexterafieldgeneratormodule'}
							</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4">
							{l s='Input Options' mod='Addifyexterafieldgeneratormodule'}
						</label>
						<div class="col-lg-5">
							<input type="text" name="field_options_checkout" id="field_options_checkout" value="" class=""
								placeholder="value1->option1,value2->option2,value3->option3...">
							<p class="help-block">
								{l s='Seperate each value and option with -&gt; and all options-&gt;values with comma
								sign and incase of file upload set the file extension as 1-&gt;png,2-&gt;docs etc..'
								mod='Addifyexterafieldgeneratormodule'}
							</p>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-4">
							{l s='Description' mod='Addifyexterafieldgeneratormodule'}
						</label>
						<div class="col-lg-5">
					<textarea type="textarea" label="Description" name="description_checkout" required="false" cols="60"
						rows="10"></textarea>
					</div>
					</div>

					
					<div class="form-group">
						<label class="control-label col-lg-4">
							{l s='Enable' mod='Addifyexterafieldgeneratormodule'}
						</label>
						<div class="col-lg-8">
							<span class="switch prestashop-switch fixed-width-lg">
								<input type="radio" name="active_field" id="active_field_on" value="1">
								<label for="active_field_on">{l s='Enabled'
									mod='Addifyexterafieldgeneratormodule'}</label>
								<input type="radio" name="active_field" id="active_field_off" value=""
									checked="checked">
								<label for="active_field_off">{l s='Disabled'
									mod='Addifyexterafieldgeneratormodule'}</label>
								<a class="slide-button btn"></a>
							</span>
							<p class="help-block">
								{l s='Enable to activate new input field.' mod='addifyb2bregistrationformbuilder'}
							</p>
						</div>
					</div>
				</div><!-- /.form-wrapper -->
				<div class="panel-footer">
					<button type="submit" value="1" id="module_form_submit_btn"
						name="checkpagesubmission" class="btn btn-default pull-right">
						<i class="process-icon-save"></i> {l s='Save' mod='Addifyexterafieldgeneratormodule'}
					</button>
					<a href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;customlistingaddifyb2bregistrationformbuilder"
						class="btn btn-default btn btn-default"><i class="process-icon-cancel"></i> {l s='Cancel'
						mod='Addifyexterafieldgeneratormodule'}</a>
				</div>
		</div>
		</form>
	</div>
	</div>