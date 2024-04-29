/**
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
*
* Don't forget to prefix your containers with your own identifier
* to avoid any conflicts with others containers.
*/
// if ( !$( 'div' ).is('.addifyb2bregistrationformbuilderfields .dragGroup')) {
// 	$('.bootstrap .addifyb2bregistrationformbuilderfields > tbody  tr  td.dragHandle').wrapInner('<div class="positions"/>');
// 	$('.bootstrap .addifyb2bregistrationformbuilderfields > tbody  tr  td.dragHandle').wrapInner('<div class="dragGroup"/>');
// }
// initAjaxaddifyb2bregistrationformbuilderfields();

// function initAjaxaddifyb2bregistrationformbuilderfields(){
// $('.addifyb2bregistrationformbuilderfields > tbody tr').each(function(){
// 	var id = $(this).find("td:eq(1)").text();
// 	$(this).attr('id', 'item_'+id.trim());
// });
// var addifyb2bregistrationformbuilderfieldsslides = $('.addifyb2bregistrationformbuilderfields > tbody');
// addifyb2bregistrationformbuilderfieldsslides.sortable({
// 	cursor: 'move',
// 	items: '> tr',
// 	update: function(event, ui){
// 		$('.addifyb2bregistrationformbuilderfields > tbody > tr').each(function(index){
// 			$(this).find('.positions').text(index + 1);
// 		});
//     }
// }).bind('sortupdate', function() {
// 	var orders = $(this).sortable('toArray');
// 	$.ajax({
// 		type: 'POST',
// 		url: controller_link,
// 		headers: { "cache-control": "no-cache" },
// 		dataType: 'json',
// 		data: {
// 			action: 'updatepositionform',
// 			addifyb2bregistrationformbuilderfields_items: orders,
// 		},
// 		success: function(msg){
// 			if (msg.error) {
// 				showErrorMessage(msg.error);
// 				return;
// 			}
// 		showSuccessMessage(msg.success);
// 		}
// 	});
// });
// };