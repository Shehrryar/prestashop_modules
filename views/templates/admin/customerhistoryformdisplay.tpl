

<div class="col">
  <div class="card customer-orders-card">
    <h3 class="card-header">
      <i class="material-icons">shopping_basket</i>
      Additional Information
    </h3>
    <div class="card-body">
      {foreach $customer_additional_data as $customdata}
      <div class="row mb-1">
        <div class="col-4 text-right">
          {$customdata['field_label']}
        </div>
        <div class="customer-social-title col-8">  
          {$customdata['field_value']}
          
        </div>
      </div>
      {/foreach}

        </div>
  </div>
  </div>