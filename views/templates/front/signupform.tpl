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


    {extends file='page.tpl'}
    {block name='page_content'}

    <section id="main">



        <!-- <header class="page-header">
    <h1>
    Welcome To Registration Page
    </h1>
  </header> -->

        <div id="content" class="page-content card card-block">
            <section class="register-form">
                <p>{l s='Already have an account?' mod='addifyexterafieldgeneratormodule'} <a href="">{l s='Log in
                        instead!' mod='addifyexterafieldgeneratormodule'}</a></p>

                <form class="default-plugin-form" id="default-plugin-form" action="" enctype="multipart/form-data"
                    method="post" class="was-validated">
                    <!---------------------------------form-------------------------------------->
                    <div class="form-group row ">
                        <label class="col-md-3 form-control-label" for="field-Social_title_default">
                            {l s='Social title' mod='addifyexterafieldgeneratormodule'}
                        </label>
                        <div class="col-md-6 form-control-valign">
                            <label class="radio-inline" for="field-Social_title_default-1">
                                <span class="custom-radio">
                                    <input name="Social_title_default" id="field-Social_title_default-1" type="radio"
                                        value="male">
                                    <span></span>
                                </span>
                                {l s='Mr.' mod='addifyexterafieldgeneratormodule'}
                            </label>
                            <label class="radio-inline" for="field-Social_title_default-2">
                                <span class="custom-radio">
                                    <input name="Social_title_default" id="field-Social_title_default-2" type="radio"
                                        value="female">
                                    <span></span>
                                </span>
                                {l s='Mrs.' mod='addifyexterafieldgeneratormodule'}
                            </label>
                        </div>
                        <div class="col-md-3 form-control-comment"></div>
                    </div>

                    <!---------------------------------firstname-------------------------------------->

                    <div class="form-group row">
                        <label class="col-md-3 form-control-label required">{l s='First Name'
                            mod='addifyexterafieldgeneratormodule'}</label>
                        <div class="col-md-6">
                            <input class="form-control" name="First_Name_default" type="text" value="" required>
                            <span class="form-control-comment">
                                {l s='Only letters and the dot (.) character, followed by a space, are allowed.'
                                mod='addifyexterafieldgeneratormodule'}
                            </span>
                        </div>
                        <div class="col-md-3 form-control-comment"></div>
                    </div>

                    <!---------------------------------lastname-------------------------------------->

                    <div class="form-group row">
                        <label class="col-md-3 form-control-label required" for="lastname">{l s='Last Name'
                            mod='addifyexterafieldgeneratormodule'}</label>
                        <div class="col-md-6">
                            <input class="form-control" name="Last_Name_default" type="text" value="" required>
                            <span class="form-control-comment">
                                {l s='Only letters and the dot (.) character, followed by a space, are allowed.'
                                mod='addifyexterafieldgeneratormodule'}
                            </span>
                        </div>
                        <div class="col-md-3 form-control-comment"></div>
                    </div>

                    <!---------------------------------Email-------------------------------------->


                    <div class="form-group row">
                        <label class="col-md-3 form-control-label required" for="email">{l s='Email'
                            mod='addifyexterafieldgeneratormodule'}</label>
                        <div class="col-md-6">
                            <input class="form-control" name="email_default" type="email" value="" required>
                        </div>
                        <div class="col-md-3 form-control-comment"></div>
                    </div>

                    <!---------------------------------Passward-------------------------------------->


                    <div class="form-group row">
                        <label class="col-md-3 form-control-label required">{l s='Password'
                            mod='addifyexterafieldgeneratormodule'}</label>
                        <div class="col-md-6">
                            <div class="input-group js-parent-focus">
                                <input class="form-control js-child-focus js-visible-password" name="Password_default"
                                    type="password" value="" required>
                                <span class="input-group-btn">
                                    <button class="btn" type="button" data-action="show-password" data-text-show="Show"
                                        data-text-hide="Hide">Show</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 form-control-comment"></div>
                    </div>

                    <!---------------------------------Birthdate-------------------------------------->

                    <div class="form-group row">
                        <label class="col-md-3 form-control-label">{l s='Birthdate'
                            mod='addifyexterafieldgeneratormodule'}</label>
                        <div class="col-md-6">
                            <input class="form-control" name="dob_default" type="date" value=""
                                placeholder="MM/DD/YYYY">
                            <span class="form-control-comment">{l s='(E.g.: 05/31/1970)'
                                mod='addifyexterafieldgeneratormodule'}</span>
                        </div>
                        <div class="col-md-3 form-control-comment">{l s='Optional'
                            mod='addifyexterafieldgeneratormodule'}</div>
                    </div>


                    <!---------------------------------General Field-------------------------------------->

                    {if $congriguraion_val == 1}
                    <div class="row">
                        <div class="col-sm-12">
                            <p>{$additional_fields|escape:'htmlall':'UTF-8'}</p>
                            <input type="hidden" name="custom_fields_title"
                                value="{$additional_fields|escape:'htmlall':'UTF-8'}">
                        </div>
                    </div>
                    {foreach $fields_values as $field}
                    {if $field['id_field'] = ''}
                    <p>{l s='there are no custom fields for this user' mod='addifyexterafieldgeneratormodule'}</p>
                    {/if}
                    <!---------------------------------general field types-------------------------------------->

                    {if $field['field_type'] == 'text' || $field['field_type'] == 'number' || $field['field_type'] ==
                    'email' || $field['field_type'] == 'date' || $field['field_type'] == 'time' || $field['field_type']
                    == 'color' }
                    <div class="form-group row">
                        <label
                            class="col-md-3 form-control-label required">{$field['field_name']|escape:'htmlall':'UTF-8'}</label>
                        <div class="col-md-6">
                            <input class="form-control"
                                name="{$field['field_type']|escape:'htmlall':'UTF-8'}{$field['id_field']|escape:'htmlall':'UTF-8'}"
                                type="{$field['field_type']|escape:'htmlall':'UTF-8'}" value=""
                                placeholder="{$field['placeholder']|escape:'htmlall':'UTF-8'}">

                        </div>
                    </div>
                    {/if}

                    {if $field['field_type'] == 'password'}
                    <div class="form-group row">
                        <label
                            class="col-md-3 form-control-label required">{$field['field_name']|escape:'htmlall':'UTF-8'}</label>
                        <div class="col-md-6">
                            <div class="input-group js-parent-focus">
                                <input class="form-control js-child-focus js-visible-password"
                                    name="{$field['field_type']|escape:'htmlall':'UTF-8'}{$field['id_field']|escape:'htmlall':'UTF-8'}"
                                    type="{$field['field_type']|escape:'htmlall':'UTF-8'}" value=""
                                    aria-autocomplete="list"
                                    placeholder="{$field['placeholder']|escape:'htmlall':'UTF-8'}">
                                <span class="input-group-btn">
                                    <button class="btn" type="button" data-action="show-password" data-text-show="Show"
                                        data-text-hide="Hide">{l s='Show'
                                        mod='addifyexterafieldgeneratormodule'}</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    {/if}

                    <!---------------------------------textarea-------------------------------------->
                    {if $field['field_type'] == 'textarea'}
                    <div class="form-group row ">
                        <label
                            class="col-md-3 form-control-label required">{$field['field_name']|escape:'htmlall':'UTF-8'}</label>
                        <div class="col-md-6">
                            <textarea id="" class="form-control"
                                name="{$field['field_type']|escape:'htmlall':'UTF-8'}{$field['id_field']|escape:'htmlall':'UTF-8'}"
                                autocomplete="off"
                                placeholder="{$field['placeholder']|escape:'htmlall':'UTF-8'}"></textarea>
                            <span class="form-control-comment">
                                {l s= $field['description']}
                            </span>
                        </div>
                    </div>
                    {/if}

                    <!---------------------------------fileupload-------------------------------------->

                    {if $field['field_type'] == 'fileupload'}
                    <div class="form-group row ">
                        <label class="col-md-3 ">{$field['field_name']|escape:'htmlall':'UTF-8'}</label>
                        <div class="col-md-6">
                            <input type="file"
                                name="{$field['field_type']|escape:'htmlall':'UTF-8'}{$field['id_field']|escape:'htmlall':'UTF-8'}"
                                id="file" class="" placeholder="{$field['placeholder']|escape:'htmlall':'UTF-8'}">
                            <span class="form-control-comment">
                                {l s= $field['description']}
                            </span>
                        </div>
                    </div>
                    {/if}

                    <!---------------------------------multicheckbox-------------------------------------->

                    {if $field['field_type'] == 'multicheckbox'}
                    <div class="row">
                        <div class="col-md-3">
                            <label>{$field['field_name']|escape:'htmlall':'UTF-8'}</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <label>
                                    <input type="checkbox"
                                        name="{$field['type']|escape:'htmlall':'UTF-8'}{$field['id_field']|escape:'htmlall':'UTF-8'}[]"
                                        value=""> 
                                </label>
                            </div>
                            {/foreach}
                        </div>
                    </div>
                    {/if}


                    <!---------------------------------multicheckbox-------------------------------------->



                    {/foreach}
                    {/if}



                </form>


            </section>
        </div>
    </section>


    {/block}