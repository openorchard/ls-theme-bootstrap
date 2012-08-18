<h4>Estimate shipping cost</h4>
<div class="row-fluid">
<form class="span5">
<select id="country" name="country" onchange="return $('#country').getForm().sendRequest(
  'shop:on_updateStateList', {      
    extraFields: {'country': $('#country').val(),
    'control_name': 'state',
    'control_id': 'state',
    'current_state': '<?= $shipping_info->state ?>'},
    update: {'shipping_states': 'shop:state_selector'}
  })">
  <? foreach ($countries as $country): ?>
    <option value="<?= $country->id ?>" <?= option_state($country->id, $shipping_info->country) ?>><?= h($country->name) ?></option>
  <? endforeach ?>
</select>

<span id="shipping_states">
  <?= $this->render_partial('shop:state_selector', array(
    'states'=>$states, 
    'control_id'=>'state', 
    'control_name'=>'state', 
    'current_state'=>$shipping_info->state)) ?>
</span>
<span>
    <label>Zip: <input class="input-small zip" type="number" name="zip" value="<?= h($shipping_info->zip) ?>"/></label>
</span>

<a class="btn btn-inverse" href="#" onclick="return $(this).getForm().sendRequest('shop:on_evalShippingRate', {
  update: {'shipping_options': 'shop:estimated_shipping_options'}})">Estimate Shipping Cost</a>
</form><!--Ending span4 for estimated shipping area-->

<div id="shipping_options" class="span7"></div><!--Ending div element for shipping option output-->
</div>