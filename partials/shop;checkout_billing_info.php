<h3>Billing Information</h3>
<? if ($this->customer): ?>
  <p>Bill to: <strong><?= h($this->customer->name) ?>, <?= h($this->customer->email) ?></strong>.</p>
<? endif ?>
<br>
<div class="form-inline form-center">
<? if (!$this->customer): ?>
  <label class="span4" for="first_name">First Name&col;</label>
  <input class="span4" name="first_name" value="<?= h($billing_info->first_name) ?>" id="first_name" type="text" /><br/>

  <label class="span4" for="last_name">Last Name:</label>
  <input class="span4" name="last_name" value="<?= h($billing_info->last_name) ?>" id="last_name" type="text" /><br/>

  <label class="span4" for="email">Email:</label>
  <input class="span4" id="email" name="email" value="<?= h($billing_info->email) ?>" type="text" /><br/>
<? endif ?>
<br>
<label class="span4" for="company">Company:</label>
<input class="span4" id="company" type="text" value="<?= h($billing_info->company) ?>" name="company" /><br/>
<br>
<label class="span4" for="phone">Phone:</label>
<input class="span4" id="phone" type="text" value="<?= h($billing_info->phone) ?>" name="phone"/><br/>
<br>
<label class="span4" for="street_address">Street Address:</label>
<input class="span4" id="street_address" name="street_address" type="text" value="<?= h($billing_info->street_address) ?>"/><br/>
<br>
<label class="span4" for="city">City:</label>
<input class="span4" id="city" type="text" name="city" value="<?= h($billing_info->city) ?>"/><br/>
<br>
<label class="span4" for="zip">Zip/Postal Code:</label>
<input class="span4" id="zip" type="text" name="zip" value="<?= h($billing_info->zip) ?>"/><br/>
<br>
<label class="span4" for="country">Country:</label>
<select class="span4" id="country" name="country" onchange="return $('#country').getForm().sendRequest(
  'shop:on_updateStateList', {
  extraFields: {'country': $('#country').val(),
  'control_name': 'state', 'control_id': 'state', 'current_state': '<?= $billing_info->state ?>'},
  update: {'billing_states': 'shop:state_selector'}
})">
  <? foreach ($countries as $country): ?>
    <option <?= option_state($billing_info->country, $country->id) ?>
      value="<?= h($country->id) ?>"><?= h($country->name) ?></option>
  <? endforeach ?>
</select><br/>
<br>
<label class="span4" for="state">State:</label>
<div id="billing_states">
  <?= $this->render_partial('shop:state_selector', array(
    'class'=>'span4',
    'states'=>$states,
    'control_id'=>'state',
    'control_name'=>'state',
    'current_state'=>$billing_info->state)) ?>
</div>
<br>
<br>
<label>Ship to the billing address?</label>
<span class="shipping_toggle_checkbox">
    <input type="checkbox" name="ship_to_billing_address" value="1"/>
</span>
<script>
    $('.shipping_toggle_checkbox').toggleButtons({
    label: {
        enabled: "Yes",
        disabled: "No"
    }
    });
</script>
<br>
<br>
<input type="hidden" name="checkout_step" value="<?= $checkout_step ?>"/>
<input
      class="btn btn-primary btn-large"
      type="button"
      value="Next"
      onclick="return $(this).getForm().sendRequest(
          'on_process_billing_address',
          {update:{'checkout_page': 'shop:checkout_partial', 'checkout_progress_meter': 'shop:checkout_progress'}
        })"
/>

</div><!--Ending div that centers the form-->
