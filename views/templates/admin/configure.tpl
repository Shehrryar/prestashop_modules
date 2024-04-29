{* * 2007-2024 PrestaShop * * NOTICE OF LICENSE * * This source file is subject
to the Academic Free License (AFL 3.0) * that is bundled with this package in
the file LICENSE.txt. * It is also available through the world-wide-web at this
URL: * http://opensource.org/licenses/afl-3.0.php * If you did not receive a
copy of the license and are unable to * obtain it through the world-wide-web,
please send an email * to license@prestashop.com so we can send you a copy
immediately. * * DISCLAIMER * * Do not edit or add to this file if you wish to
upgrade PrestaShop to newer * versions in the future. If you wish to customize
PrestaShop for your * needs please refer to http://www.prestashop.com for more
information. * * @author PrestaShop SA
<contact@prestashop.com>
  * @copyright 2007-2024 PrestaShop SA * @license
  http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0) *
  International Registered Trademark & Property of PrestaShop SA *}

  <div class="row">
    <div class="col-lg-12">
      <div id="container" class="row">
        <div id="moduleContainer">
          <div class="sidebarTabs navigation col-md-2">
            <nav class="list-group">
              <a
                class="list-group-item nav-sidebar-tabs {if $active_tab eq 1} active {/if}"
                id="generalsettingtab"
                href="#tab_1"
                data-toggle="tab"
                >{l s='General Settings'
                mod='Addifyexterafieldgeneratormodule'}</a
              >
              <a
                class="list-group-item nav-sidebar-tabs {if $active_tab eq 2} active {/if}"
                id="registerationformtab"
                href="#tab_2"
                data-toggle="tab"
                >{l s='Registeration from'
                mod='Addifyexterafieldgeneratormodule'}</a
              >
              <a
                class="list-group-item nav-sidebar-tabs {if $active_tab eq 3} active {/if}"
                id="checkoutpagetab"
                href="#tab_3"
                data-toggle="tab"
                >{l s='Checkout page' mod='Addifyexterafieldgeneratormodule'}</a
              >
            </nav>
          </div>
          <div class="tab-content col-md-10">
            <div id="tab_1" class="{if $active_tab eq 1} active {/if} tab-pane">
              <div class="form-group" data-tab-id="tab_1">
                {$render_confriguration_form}
              </div>
            </div>
            <div id="tab_2" class="{if $active_tab eq 2} active {/if} tab-pane">
              <div class="form-group" data-tab-id="tab_2">
                <form
                  method="post"
                  action="{$configUrl|escape:'htmlall':'UTF-8'}&amp;customlistingaddifyb2bregistrationformbuilder"
                  class="form-horizontal clearfix"
                  id="form-addifyb2bregistrationformbuilderfields"
                >
                  <input
                    type="hidden"
                    id="submitFilteraddifyb2bregistrationformbuilderfields"
                    name="submitFilteraddifyb2bregistrationformbuilderfields"
                    value="0"
                  />
                  <input type="hidden" name="page" value="1" />
                  <input
                    type="hidden"
                    name="configUrl"
                    id="configUrl"
                    value="{$configUrl|escape:'htmlall':'UTF-8'}"
                  />
                  <input type="hidden" name="selected_pagination" value="50" />
                  <div class="panel col-lg-12">
                    <div class="panel-heading">
                      {l s='Registeration form Additional Fields'
                      mod='addifyb2bregistrationformbuilder'}
                      <span class="badge"
                        >{count($registerationformrenderList)|escape:'htmlall':'UTF-8'}</span
                      >
                      <span class="panel-heading-action">
                        <a
                          id="desc-addifyb2bregistrationformbuilderfields-new"
                          class="list-toolbar-btn"
                          href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;addregisteraddifyexterafieldgeneratormodule"
                        >
                          <span
                            title=""
                            data-toggle="tooltip"
                            class="label-tooltip"
                            data-original-title="Add new"
                            data-html="true"
                            data-placement="top"
                          >
                            <i class="process-icon-new"></i>
                          </span>
                        </a>
                        <a
                          class="list-toolbar-btn"
                          href="javascript:location.reload();"
                        >
                          <span
                            title=""
                            data-toggle="tooltip"
                            class="label-tooltip"
                            data-original-title="Refresh list"
                            data-html="true"
                            data-placement="top"
                          >
                            <i class="process-icon-refresh"></i>
                          </span>
                        </a>
                      </span>
                    </div>
                    <div class="table-responsive-row clearfix">
                      <table
                        id="table-addifyb2bregistrationformbuilderfields"
                        class="table addifyb2bregistrationformbuilderfields"
                      >
                        <thead>
                          <tr class="nodrag nodrop">
                            <th class="center fixed-width-xs"></th>
                            <th class="">
                              <span class="title_box">
                                {l s='Field ID'
                                mod='addifyb2bregistrationformbuilder'}
                              </span>
                            </th>
                            <th class="">
                              <span class="title_box">
                                {l s='Field Label'
                                mod='addifyb2bregistrationformbuilder'}
                              </span>
                            </th>
                            <th class="">
                              <span class="title_box">
                                {l s='Field Status'
                                mod='addifyb2bregistrationformbuilder'}
                              </span>
                            </th>
                            <th class="pointer dragHandle">
                              <span class="title_box">
                                {l s='Position'
                                mod='addifyb2bregistrationformbuilder'}
                              </span>
                            </th>
                            <th class="">
                              <span class="title_box">
                                {l s='Field Type'
                                mod='addifyb2bregistrationformbuilder'}
                              </span>
                            </th>
                            <th></th>
                          </tr>
                        </thead>

                        <tbody class="ui-sortable">
                          {if isset($registerationformrenderList)} {foreach
                          $registerationformrenderList $Rule}
                          <tr
                            class="odd"
                            id="item_{$Rule['id_field']|escape:'htmlall':'UTF-8'}"
                          >
                            <td class="row-selector text-center">
                              <input
                                type="checkbox"
                                name="addifyb2bregistrationformbuilderfieldsBox[]"
                                value="{$Rule['id_field']|escape:'htmlall':'UTF-8'}"
                                class="noborder addifyb2bregistrationformbuilderfieldsBox"
                              />
                            </td>

                            <td class="pointer column-id_field">
                              {$Rule['id_field']|escape:'htmlall':'UTF-8'}
                            </td>
                            <td class="pointer column-field_label">
                              {$Rule['field_name']|escape:'htmlall':'UTF-8'}
                            </td>

                            {if $Rule['active_field']==0}
                            <td class="pointer column-active">
                              <a
                                class="list-action-enable action-disabled"
                                href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;statusaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}"
                                title="Disabled"
                              >
                                <i class="icon-check hidden"></i>
                                <i class="icon-remove"></i>
                              </a>
                            </td>

                            {/if} {if $Rule['active_field']==1}
                            <td class="pointer column-active">
                              <a
                                class="list-action-enable action-enabled"
                                href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;statusaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}"
                                title="Enabled"
                              >
                                <i class="icon-check"></i>
                                <i class="icon-remove hidden"></i>
                              </a>
                            </td>
                            {/if}

                            <td
                              class="pointer column-sort_order pointer dragHandle"
                            >
                              <div class="dragGroup">
                                <div class="positions">
                                  {$Rule['sort_order']|escape:'htmlall':'UTF-8'}
                                </div>
                              </div>
                            </td>
                            <td class="pointer column-field_type">
                              {$Rule['field_type']|escape:'htmlall':'UTF-8'}
                            </td>
                            <td class="text-right">
                              <div class="btn-group-action">
                                <div class="btn-group pull-right">
                                  <a
                                    href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;updateaddregisterationformdata&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}"
                                    title="Edit"
                                    class="edit btn btn-default"
                                  >
                                    <i class="icon-pencil"></i> {l s='Edit'
                                    mod='addifyb2bregistrationformbuilder'}
                                  </a>

                                  <button
                                    class="btn btn-default dropdown-toggle"
                                    data-toggle="dropdown"
                                  >
                                    <i class="icon-caret-down"></i>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li>
                                      <a
                                        href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;deleteregisterationformdata&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}"
                                        title="Delete"
                                        class="delete"
                                      >
                                        <i class="icon-trash"></i> {l s='Delete'
                                        mod='addifyb2bregistrationformbuilder'}
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </td>
                          </tr>
                          {/foreach} {else}
                          <tr>
                            <td class="list-empty" colspan="8">
                              <div class="list-empty-msg">
                                <i
                                  class="icon-warning-sign list-empty-icon"
                                ></i>
                                {l s='No records found'
                                mod='addifyb2bregistrationformbuilder'}
                              </div>
                            </td>
                          </tr>
                          {/if}
                        </tbody>
                      </table>
                    </div>
                    <input
                      type="hidden"
                      name="token"
                      value="{$adminToken|escape:'htmlall':'UTF-8'}"
                    />
                  </div>
                </form>
              </div>
            </div>
            <div id="tab_3" class="{if $active_tab eq 3} active {/if} tab-pane">
              <div class="form-group" data-tab-id="tab_3">
                <form
                  method="post"
                  action="{$configUrl|escape:'htmlall':'UTF-8'}&amp;customlistingaddifyb2bregistrationformbuilder"
                  class="form-horizontal clearfix"
                  id="form-addifyb2bregistrationformbuilderfields"
                >
                  <input
                    type="hidden"
                    id="submitFilteraddifyb2bregistrationformbuilderfields"
                    name="submitFilteraddifyb2bregistrationformbuilderfields"
                    value="0"
                  />
                  <input type="hidden" name="page" value="1" />
                  <input
                    type="hidden"
                    name="configUrl"
                    id="configUrl"
                    value="{$configUrl|escape:'htmlall':'UTF-8'}"
                  />
                  <input type="hidden" name="selected_pagination" value="50" />
                  <div class="panel col-lg-12">
                    <div class="panel-heading">
                      {l s='Checkout form Additional Fields'
                      mod='addifyb2bregistrationformbuilder'}
                      <span class="badge"
                        >{count($checkoutformrenderList)|escape:'htmlall':'UTF-8'}</span
                      >
                      <span class="panel-heading-action">
                        <a
                          id="desc-addifyb2bregistrationformbuilderfields-new"
                          class="list-toolbar-btn"
                          href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;addcheckoutaddifyexterafieldgeneratormodule"
                        >
                          <span
                            title=""
                            data-toggle="tooltip"
                            class="label-tooltip"
                            data-original-title="Add new"
                            data-html="true"
                            data-placement="top"
                          >
                            <i class="process-icon-new"></i>
                          </span>
                        </a>
                        <a
                          class="list-toolbar-btn"
                          href="javascript:location.reload();"
                        >
                          <span
                            title=""
                            data-toggle="tooltip"
                            class="label-tooltip"
                            data-original-title="Refresh list"
                            data-html="true"
                            data-placement="top"
                          >
                            <i class="process-icon-refresh"></i>
                          </span>
                        </a>
                      </span>
                    </div>
                    <div class="table-responsive-row clearfix">
                      <table
                        id="table-addifyb2bregistrationformbuilderfields"
                        class="table addifyb2bregistrationformbuilderfields"
                      >
                        <thead>
                          <tr class="nodrag nodrop">
                            <th class="center fixed-width-xs"></th>
                            <th class="">
                              <span class="title_box">
                                {l s='Field ID'
                                mod='addifyb2bregistrationformbuilder'}
                              </span>
                            </th>
                            <th class="">
                              <span class="title_box">
                                {l s='Field Label'
                                mod='addifyb2bregistrationformbuilder'}
                              </span>
                            </th>
                            <th class="">
                              <span class="title_box">
                                {l s='Field Status'
                                mod='addifyb2bregistrationformbuilder'}
                              </span>
                            </th>
                            <th class="pointer dragHandle">
                              <span class="title_box">
                                {l s='Position'
                                mod='addifyb2bregistrationformbuilder'}
                              </span>
                            </th>
                            <th class="">
                              <span class="title_box">
                                {l s='Field Type'
                                mod='addifyb2bregistrationformbuilder'}
                              </span>
                            </th>
                            <th></th>
                          </tr>
                        </thead>

                        <tbody class="ui-sortable">
                          {if isset($checkoutformrenderList)} {foreach
                          $checkoutformrenderList as $Rule}
                          <tr
                            class="odd"
                            id="item_{$Rule['id_field']|escape:'htmlall':'UTF-8'}"
                          >
                            <td class="row-selector text-center">
                              <input
                                type="checkbox"
                                name="addifyb2bregistrationformbuilderfieldsBox[]"
                                value="{$Rule['id_field']|escape:'htmlall':'UTF-8'}"
                                class="noborder addifyb2bregistrationformbuilderfieldsBox"
                              />
                            </td>

                            <td class="pointer column-id_field">
                              {$Rule['id_field_checkout']|escape:'htmlall':'UTF-8'}
                            </td>
                            <td class="pointer column-field_label">
                              {$Rule['field_name_checkout']|escape:'htmlall':'UTF-8'}
                            </td>

                            {if $Rule['active_field_checkout']==0}
                            <td class="pointer column-active">
                              <a
                                class="list-action-enable action-disabled"
                                href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;statusaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}"
                                title="Disabled"
                              >
                                <i class="icon-check hidden"></i>
                                <i class="icon-remove"></i>
                              </a>
                            </td>

                            {/if} {if $Rule['active_field_checkout']==1}
                            <td class="pointer column-active">
                              <a
                                class="list-action-enable action-enabled"
                                href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;statusaddifyb2bregistrationformbuilderfields&amp;id_field={$Rule['id_field']|escape:'htmlall':'UTF-8'}"
                                title="Enabled"
                              >
                                <i class="icon-check"></i>
                                <i class="icon-remove hidden"></i>
                              </a>
                            </td>
                            {/if}

                            <td
                              class="pointer column-sort_order pointer dragHandle"
                            >
                              <div class="dragGroup">
                                <div class="positions">
                                  {$Rule['sort_order_checkout']|escape:'htmlall':'UTF-8'}
                                </div>
                              </div>
                            </td>
                            <td class="pointer column-field_type">
                              {$Rule['field_type_checkout']|escape:'htmlall':'UTF-8'}
                            </td>
                            <td class="text-right">
                              <div class="btn-group-action">
                                <div class="btn-group pull-right">
                                  <a
                                    href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;updatecheckoutpage&amp;id_field_checkout={$Rule['id_field_checkout']|escape:'htmlall':'UTF-8'}"
                                    title="Edit"
                                    class="edit btn btn-default"
                                  >
                                    <i class="icon-pencil"></i> {l s='Edit'
                                    mod='addifyb2bregistrationformbuilder'}
                                  </a>

                                  <button
                                    class="btn btn-default dropdown-toggle"
                                    data-toggle="dropdown"
                                  >
                                    <i class="icon-caret-down"></i>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li>
                                      <a
                                        href="{$configUrl|escape:'htmlall':'UTF-8'}&amp;deletecheckoutpage&amp;id_field_checkout={$Rule['id_field_checkout']|escape:'htmlall':'UTF-8'}"
                                        title="Delete"
                                        class="delete"
                                      >
                                        <i class="icon-trash"></i> {l s='Delete'
                                        mod='addifyb2bregistrationformbuilder'}
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </td>
                          </tr>
                          {/foreach} {else}
                          <tr>
                            <td class="list-empty" colspan="8">
                              <div class="list-empty-msg">
                                <i
                                  class="icon-warning-sign list-empty-icon"
                                ></i>
                                {l s='No records found'
                                mod='addifyb2bregistrationformbuilder'}
                              </div>
                            </td>
                          </tr>
                          {/if}
                        </tbody>
                      </table>
                    </div>
                    <input
                      type="hidden"
                      name="token"
                      value="{$adminToken|escape:'htmlall':'UTF-8'}"
                    />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

  <script type="text/javascript">
    if (document.getElementById("generalsettingtab")) {
      document.getElementById("generalsettingtab").onclick = function () {
        var class_element = document.getElementsByClassName("nav-sidebar-tabs");

        for (var i = 0; i < class_element.length; i++) {
          class_element[i].classList.remove("active");
        }

        var element = document.getElementById("generalsettingtab");
        element.classList.add("active");
      };
    }

    if (document.getElementById("registerationformtab")) {
      document.getElementById("registerationformtab").onclick = function () {
        var class_element = document.getElementsByClassName("nav-sidebar-tabs");

        for (var i = 0; i < class_element.length; i++) {
          class_element[i].classList.remove("active");
        }

        var element = document.getElementById("registerationformtab");
        element.classList.add("active");
      };
    }

    if (document.getElementById("checkoutpagetab")) {
      document.getElementById("checkoutpagetab").onclick = function () {
        var class_element = document.getElementsByClassName("nav-sidebar-tabs");

        for (var i = 0; i < class_element.length; i++) {
          class_element[i].classList.remove("active");
        }

        var element = document.getElementById("checkoutpagetab");
        element.classList.add("active");
      };
    }

    var addifyb2bregistrationformbuilderfieldsslides = $(
      ".addifyb2bregistrationformbuilderfields > tbody"
    );
    addifyb2bregistrationformbuilderfieldsslides
      .sortable({
        cursor: "move",
        items: "> tr",
        update: function (event, ui) {
          $(".addifyb2bregistrationformbuilderfields > tbody > tr").each(
            function (index) {
              $(this)
                .find(".positions")
                .text(index + 1);
            }
          );
          var orders = $(this).sortable("toArray");

          var JSONorders = JSON.stringify(orders);
          var link = "{$admincontrollerlink}";
          $.ajax({
            type: "post",
            url: link,
            data: {
              ajax: true,
              ordered_data: JSONorders,
            },
            dataType: "json",
          });
        },
      })
      .disableSelection();
  </script></contact@prestashop.com
>
