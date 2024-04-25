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
<section id="addtional-inforamtional" class="checkout-step -reachable -complete -clickable">
    <h1 class="step-title js-step-title h3">
      <i class="material-icons rtl-no-flip done"></i>
      {if $ENABLECHECKOUTPAGE == 1}
      <span class="step-number">2</span>
      {$CHECKOUTPAGE_TITLE}
      <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
    </h1>
    <div class="content">
        <form class="default-plugin-form" id="default-plugin-form" action="{$checkoutcontroller}"
        enctype="multipart/form-data" method="post" class="was-validated">
        <!---------------------------------form-------------------------------------->
                    <div class="form-group-buttom row">
                        {foreach $checkoutpage_additional_fields as $field}
                        <!---------------------------------general field types-------------------------------------->
                        <div class = "innercontent" style="display: flex;">
                            <label
                                class="col-md-3 form-control-label required">{$field['field_name_checkout']|escape:'htmlall':'UTF-8'}</label>
                            {if $field['field_type_checkout'] == 'text' || $field['field_type_checkout'] == 'number' ||
                            $field['field_type_checkout']
                            ==
                            'email' || $field['field_type_checkout'] == 'date' || $field['field_type_checkout'] == 'time' ||
                            $field['field_type_checkout']
                            == 'color' }
                            <div class="col-md-6 js-input-column form-control-valign">
                                <input class="form-control"
                                    name="{$field['field_type_checkout']|escape:'htmlall':'UTF-8'}{$field['id_field_checkout']|escape:'htmlall':'UTF-8'}"
                                    type="{$field['field_type_checkout']|escape:'htmlall':'UTF-8'}" value=""
                                    placeholder="{$field['placeholder']|escape:'htmlall':'UTF-8'}">

                            </div>
                            {/if}

                            {if $field['field_type_checkout'] == 'password'}
                            <div class="col-md-6 js-input-column form-control-valign">
                                <div class="input-group js-parent-focus">
                                    <input class="form-control js-child-focus js-visible-password"
                                        name="{$field['field_type_checkout']|escape:'htmlall':'UTF-8'}{$field['id_field_checkout']|escape:'htmlall':'UTF-8'}"
                                        type="{$field['field_type_checkout']|escape:'htmlall':'UTF-8'}" value=""
                                        aria-autocomplete="list"
                                        placeholder="{$field['placeholder']|escape:'htmlall':'UTF-8'}">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button" data-action="show-password"
                                            data-text-show="Show" data-text-hide="Hide">{l s='Show'
                                            mod='addifyexterafieldgeneratormodule'}</button>
                                    </span>
                                </div>
                            </div>
                            {/if}

                            <!---------------------------------textarea-------------------------------------->
                            {if $field['field_type_checkout'] == 'textarea'}
                            <div class="col-md-6 js-input-column form-control-valign">
                                <textarea id="" class="form-control"
                                    name="{$field['field_type_checkout']|escape:'htmlall':'UTF-8'}{$field['id_field_checkout']|escape:'htmlall':'UTF-8'}"
                                    autocomplete="off"
                                    placeholder="{$field['placeholder_checkout']|escape:'htmlall':'UTF-8'}"></textarea>
                                <span class="form-control-comment">
                                    {l s= $field['description_checkout']}
                                </span>
                            </div>
                            {/if}

                            <!---------------------------------fileupload-------------------------------------->

                            {if $field['field_type_checkout'] == 'fileupload'}
                            <div class="col-md-6 js-input-column form-control-valign">
                                <input type="file"
                                    name="{$field['field_type_checkout']|escape:'htmlall':'UTF-8'}{$field['id_field_checkout']|escape:'htmlall':'UTF-8'}"
                                    id="file" class="" placeholder="{$field['placeholder']|escape:'htmlall':'UTF-8'}">
                                <span class="form-control-comment">
                                    {l s= $field['description']}
                                </span>
                            </div>
                            {/if}

                            <!---------------------------------multicheckbox-------------------------------------->

                            {if $field['field_type_checkout'] == 'multicheckbox'}
                            <div class="col-md-6">
                                {assign var="teststring" value=$field['field_options_checkout']}
                                {assign var="testsplit" value=","|explode:$teststring}
                                {foreach $testsplit as $split}
                                {assign var="subsplit" value="->"|explode:$split}
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox"
                                            name="{$field['field_type_checkout']|escape:'htmlall':'UTF-8'}{$field['id_field_checkout']|escape:'htmlall':'UTF-8'}[]"
                                            value="{$subsplit[1]}">
                                        <span class="label-text">{$subsplit[1]|escape:'htmlall':'UTF-8'}</span>
                                    </label>
                                </div>
                                {/foreach}
                            </div>
                            {/if}

                            <!---------------------------------RadioButton-------------------------------------->

                            {if $field['field_type_checkout'] == 'radiobutton'}
                            <div class="col-md-6">
                                {assign var="teststring" value=$field['field_options_checkout']}
                                {assign var="testsplit" value=","|explode:$teststring}
                                {foreach $testsplit as $split}
                                {assign var="subsplit" value="->"|explode:$split}
                                <div class="form-check">
                                    <label>
                                        <input type="radio"
                                            name="{$field['field_type_checkout']|escape:'htmlall':'UTF-8'}{$field['id_field_checkout']|escape:'htmlall':'UTF-8'}[]"
                                            value="{$subsplit[1]}">
                                        <span class="label-text">{$subsplit[1]|escape:'htmlall':'UTF-8'}</span>
                                    </label>
                                </div>
                                {/foreach}
                            </div>
                            {/if}

                            <!---------------------------------multiselectbox-------------------------------------->

                            {if $field['field_type_checkout'] == 'multiselect'}
                            {assign var="teststring" value=$field['field_options_checkout']}
                            {assign var="testsplit" value=","|explode:$teststring}
                            <div class="col-md-6 js-input-column form-control-valign">
                                <select
                                    name="{$field['field_type_checkout']|escape:'htmlall':'UTF-8'}{$field['id_field_checkout']|escape:'htmlall':'UTF-8'}[]"
                                    class="form-control">
                                    <option value="">Select the option</option>
                                    {foreach $testsplit as $split}
                                    {assign var="subsplit" value="->"|explode:$split}
                                    <option value="{$subsplit[1]}">{$subsplit[1]}</option>
                                    {/foreach}
                                </select>
                            </div>
                            {/if}

                            <!---------------------------------multiselectbox-------------------------------------->
                            
                            {if $field['field_type_checkout'] == 'select'}
                            {assign var="teststring" value=$field['field_options']}
                            {assign var="testsplit" value=","|explode:$teststring}
                            <div class="col-md-6 js-input-column form-control-valign">
                                <select
                                    name="{$field['field_type_checkout']|escape:'htmlall':'UTF-8'}{$field['id_field_checkout']|escape:'htmlall':'UTF-8'}[]"
                                    class="form-control">
                                    <option value="">Select the option</option>
                                    {foreach $testsplit as $split}
                                    {assign var="subsplit" value="->"|explode:$split}
                                    <option value="{$subsplit[0]}">{$subsplit[1]}</option>
                                    {/foreach}
                                </select>
                            </div>
                            {/if}
                        </div>

                        <!---------------------------------button-------------------------------------->

                        {/foreach}
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button name="submitnewdefaultsignupform"
                                    class="btn btn-primary form-control-submit float-xs-right" type="submit"
                                    id="form_save"> {l s='Continue' mod='addifyexterafieldgeneratormodule'}</button>
                            </div>
                        </div>
                    </div>
                    {/if}
                </form>
          </div>
  </section>
  <script>

var section_div = document.getElementById('addtional-inforamtional');
var checkout_page_div = document.getElementById('checkout-addresses-step');

// Check if both elements exist
if (section_div && checkout_page_div) {
// Insert section_div after checkout_page_div
checkout_page_div.insertAdjacentElement('afterend', section_div);
} else {
console.error("One or both of the elements do not exist.");
}

  </script>