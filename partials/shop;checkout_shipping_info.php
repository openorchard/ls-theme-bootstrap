<h3>Shipping Information</h3>
<p>Copy <a href="#" onclick="return $(this).getForm().sendRequest(
  'shop:on_copyBillingInfo',
  {update:{'checkout_page': 'shop:checkout_partial'}})">billing information</a>.<p>

<div class="form-inline form-center">

<label class="span4" for="first_name">First Name</label>
<input class="span4" id="first_name" name="first_name" type="text" value="<?= h($shipping_info->first_name) ?>"/><br/>
<br>
<label class="span4" for="last_name">Last Name</label>
<input class="span4" id="last_name" name="last_name" type="text" value="<?= h($shipping_info->last_name) ?>"/><br/>
<br>
<label class="span4" for="company">Company</label>
<input class="span4" id="company" type="text" value="<?= h($shipping_info->company) ?>" name="company"/><br/>
<br>
<label class="span4" for="phone">Phone</label>
<input class="span4" id="phone" type="text" value="<?= h($shipping_info->phone) ?>" name="phone"/><br/>
<br>
<label class="span4" for="street_address">Street Address</label>
<input class="span4" id="street_address" name="street_address" type="text" value="<?= h($shipping_info->street_address) ?>"/><br/>
<br>
<label class="span4" for="city">City</label>
<input class="span4" id="city" type="text" name="city" value="<?= h($shipping_info->city) ?>"/><br/>
<br>
<label class="span4" for="zip">Zip/Postal Code</label>
<input class="span4" id="zip" type="text" name="zip" value="<?= h($shipping_info->zip) ?>"/><br/>
<br>
<label class="span4" for="country">Country</label>
<select class="span4" id="country" name="country" onchange="return $('#country').getForm().sendRequest(
  'shop:on_updateStateList', {
  extraFields: {
    'country': $('#country').val(),
    'control_name': 'state',
    'control_id': 'state',
    'current_state': '<?= $shipping_info->state ?>'},
  update: {'shipping_states': 'shop:state_selector'}
})">

  <? foreach ($countries as $country): ?>
    <option <?= option_state($shipping_info->country, $country->id) ?>
      value="<?= h($country->id) ?>"><?= h($country->name) ?></option>
  <? endforeach ?>
</select><br/>
<br>
<label class="span4" for="state">State</label>
<div id="shipping_states">
  <?= $this->render_partial('shop:state_selector', array(
    'class'=>'span4',
    'states'=>$states,
    'control_id'=>'state',
    'control_name'=>'state',
    'current_state'=>$shipping_info->state)) ?>
</div>
<br>
<input type="hidden" name="checkout_step" value="<?= $checkout_step ?>"/>
<input
    class="btn btn-primary btn-large"
    type="button"
    value="Next"
    onclick="return $(this).getForm().sendRequest('on_action', {
  update:{'checkout_page': 'shop:checkout_partial', 'checkout_progress_meter': 'shop:checkout_progress'}
})"/>

</div><!--Ending div for centering the form-->
