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
			<form id="module_form" class="defaultForm form-horizontal"
				action="{$configUrl|escape:'htmlall':'UTF-8'}&amp;customlistingaddifyb2bregistrationformbuilder"
				method="post" enctype="multipart/form-data" novalidate="">
				<input type="hidden" name="submitAddifyb2bregistrationformbuilderfields" value="1">
				<div class="panel" id="fieldset_0">
					<div class="panel-heading">
						<i class="icon-plus"></i>{l s='Create Additional Fields for Registeration Form' mod='addifyb2bregistrationformbuilder'}
					</div>
					<div class="form-wrapper">
						<div class="form-group hide">
							<input type="hidden" name="id_field" id="id_field" value="0">
						</div>
						<div class="form-group hide">
							<input type="hidden" name="sort_order" id="sort_order" value="0">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4">
							{l s='Input Field Name' mod='addifyb2bregistrationformbuilder'}
						</label>
						<div class="col-lg-5">
							<input type="text" name="field_name" id="field_name" value="" class=""
								placeholder="Field_name">
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
							<select name="field_type" class=" fixed-width-xl" id="field_type"
								onchange="hideOptionField()">
								<option value="text">{l s='text' mod='addifyb2bregistrationformbuilder'}</option>
								<option value="textarea">{l s='textarea' mod='addifyb2bregistrationformbuilder'}
								</option>
								<option value="number">{l s='number' mod='addifyb2bregistrationformbuilder'}</option>
								<option value="email">{l s='email' mod='addifyb2bregistrationformbuilder'}</option>
								<option value="password">{l s='password' mod='addifyb2bregistrationformbuilder'}
								</option>
								<option value="radiobutton">{l s='radiobutton' mod='addifyb2bregistrationformbuilder'}
								</option>
								<option value="select">{l s='select' mod='addifyb2bregistrationformbuilder'}</option>
								<option value="fileupload">{l s='fileupload' mod='addifyb2bregistrationformbuilder'}
								</option>
								<option value="switch">{l s='switch' mod='addifyb2bregistrationformbuilder'}</option>
								<option value="multiselect">{l s='multiselect' mod='addifyb2bregistrationformbuilder'}
								</option>
								<option value="checkbox">{l s='checkbox' mod='addifyb2bregistrationformbuilder'}
								</option>
								<option value="multicheckbox">{l s='multicheckbox'
									mod='addifyb2bregistrationformbuilder'}</option>
								<option value="color">{l s='color' mod='addifyb2bregistrationformbuilder'}</option>
								<option value="date">{l s='date' mod='addifyb2bregistrationformbuilder'}</option>
								<option value="time">{l s='time' mod='addifyb2bregistrationformbuilder'}</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4">
							{l s='Placeholder' mod='addifyb2bregistrationformbuilder'}
						</label>
						<div class="col-lg-5">
							<input type="text" name="placeholder" id="placeholder" value="" class=""
								placeholder="placeholder">
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
							<input type="text" name="field_options" id="field_options" value="" class=""
								placeholder="value1->option1,value2->option2,value3->option3...">
							<p class="help-block">
								{l s='Seperate each value and option with -&gt; and all options-&gt;values with comma
								sign and incase of file upload set the file extension as 1-&gt;png,2-&gt;docs etc..'
								mod='addifyb2bregistrationformbuilder'}
							</p>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-4">
							{l s='Description' mod='addifyb2bregistrationformbuilder'}
						</label>
						<div class="col-lg-5">
					<textarea type="textarea" label="Description" name="description" required="false" cols="60"
						rows="10"></textarea>
					</div>
					</div>

					
					<div class="form-group">
						<label class="control-label col-lg-4">
							{l s='Enable' mod='addifyb2bregistrationformbuilder'}
						</label>
						<div class="col-lg-8">
							<span class="switch prestashop-switch fixed-width-lg">
								<input type="radio" name="active_field" id="active_field_on" value="1">
								<label for="active_field_on">{l s='Enabled'
									mod='addifyb2bregistrationformbuilder'}</label>
								<input type="radio" name="active_field" id="active_field_off" value=""
									checked="checked">
								<label for="active_field_off">{l s='Disabled'
									mod='addifyb2bregistrationformbuilder'}</label>
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
						name="submitAddifyb2bregistrationformbuilderfields" class="btn btn-default pull-right">
						<i class="process-icon-save"></i> {l s='Save' mod='addifyb2bregistrationformbuilder'}
					</button>
					<a href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;customlistingaddifyb2bregistrationformbuilder"
						class="btn btn-default btn btn-default"><i class="process-icon-cancel"></i> {l s='Cancel'
						mod='addifyb2bregistrationformbuilder'}</a>
				</div>
		</div>
		</form>
	</div>
	</div>