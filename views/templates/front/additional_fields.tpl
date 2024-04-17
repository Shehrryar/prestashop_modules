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

    <style>
        .col-md-6.js-input-column.form-control-valign {
            display: grid;
            grid-template-columns: 1rem 1rem;
            justify-content: space-around;
        }
    </style>

    <h1>{$additional_fields}</h1>
    <section class="register-form">
        <form id="customer-form" class="js-customer-form" method="post">
            <div>
                {foreach $fields_values as $values}

                <div class="form-group row">
                    <label class="col-md-3 form-control-label">{$values['field_name']}</label>
                    {if $values['field_type'] == 'radiobutton'}
                    {assign var="teststring" value=$values['field_options']}
                    {assign var="testsplit" value=","|explode:$teststring}
                    <div class="col-md-6 js-input-column form-control-valign">
                        {foreach $testsplit as $split}
                        {assign var="subsplit" value="->"|explode:$split}
                        <label class="radio-inline" for="field-id_gender-1">
                            <span class="custom-radio">
                                <input name="{$values['field_type']}" type="radio" value="{$subsplit[1]}">
                                <span></span>
                            </span>
                            {$subsplit[1]}
                        </label>
                        {/foreach}
                    </div>


                    {elseif $values['field_type'] == 'text' || $values['field_type'] == 'number'
                    || $values['field_type'] == 'email' || $values['field_type'] == 'password' || $values['field_type']
                    == 'switch' || $values['field_type'] == 'color'}
                    <div class="col-md-6 js-input-column">
                        <input class="form-control" type="{$values['field_type']}" name="{$values['field_type']}"
                            placeholder="{$values['placeholder']}">
                        {if $values['description']}
                        <span class="form-control-comment">{l s= $values['description']
                            mod='Addifyexterafieldgeneratormodule'}</span>
                        {/if}
                    </div>


                    {elseif $values['field_type'] == 'select'}
                    {assign var="teststring" value=$values['field_options']}
                    {assign var="testsplit" value=","|explode:$teststring}
                    <div class="col-md-6 js-input-column">
                        <select name="{$values['field_type']}" class="form-control">
                            {foreach $testsplit as $split}
                            {assign var="subsplit" value="->"|explode:$split}
                            <option value="{$subsplit[1]}">{$subsplit[1]}</option>
                            {/foreach}
                        </select>
                    </div>

                    {elseif $values['field_type'] == 'textarea'}
                    <div class="col-md-6 js-input-column">
                        <textarea class="form-control" name="{$values['field_type']}"></textarea>
                        {if $values['description']}
                        <span class="form-control-comment">{l s= $values['description']
                            mod='Addifyexterafieldgeneratormodule'}</span>
                        {/if}
                    </div>



                    {elseif $values['field_type'] == 'fileupload'}
                    <div class="col-md-6 js-input-column">
                        <input type="file" class="form-control" name="$values['field_type']">
                        {if $values['description']}
                        <span class="form-control-comment">{l s= $values['description']
                            mod='Addifyexterafieldgeneratormodule'}</span>
                        {/if}
                    </div>

                    {elseif $values['field_type'] == 'checkbox'}
                    {assign var="teststring" value=$values['field_options']}
                    {assign var="testsplit" value=","|explode:$teststring}
                    <div class="col-md-6 js-input-column">
                    {foreach $testsplit as $split}
                        {assign var="subsplit" value="->"|explode:$split}
                    <div>
                        <span class="custom-checkbox">
                            <label>
                                <input name="{$values['field_type']}" type="checkbox" value="{$subsplit[1]}" required="">
                                <span><i class="material-icons rtl-no-flip checkbox-checked"></i></span>
                                {$subsplit[1]}
                            </label>
                        </span>
                    </div>
                    {/foreach}
                    </div>
                    {/if}

                </div>
                {/foreach}
            </div>
        </form>
    </section>