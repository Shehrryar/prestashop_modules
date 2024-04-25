<div id="additional_information_detail" class="col-md-4">
    {if $ENABLECHECKOUTPAGE == 1}
    <h3 class="h3 card-title">{$CHECKOUTPAGE_TITLE}</h3>
    <table>
    {foreach $addifycheckout as $values}
    {foreach $orderdetial as $ordervalues}
    {if $ordervalues['id_cart'] == $values['id_cart_checkout']}
        <tr>
              <td><strong>{$values['field_label_checkout']}</strong></td>
              <td>{$values['field_value_checkout']}</td>
            </tr>
            {/if}
    {/foreach}
    {/foreach}
    </table>
    {/if}
</div>


<script>
    var targetShort1 = document.getElementById('content');
    var data = document.querySelectorAll('#additional_information_detail');
</script>