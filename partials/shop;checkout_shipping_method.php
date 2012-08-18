<h3>Shipping Method</h3>
<? if (count($shipping_options)): ?>
  <p>Please select shipping option.</p>
  <? foreach ($shipping_options as $option): ?>
    <? if ($option->error_hint): ?>
        <p><?= h($option->name) ?> - <?= h($option->error_hint) ?></p>
    <? endif ?>

    <? if ($option->multi_option): ?>

      <h5><?= h($option->name) ?></h5>

      <? if ($option->description): ?>
        <p><?= h($option->description) ?></p>
      <? endif ?>

      <? foreach ($option->sub_options as $sub_option): ?>
        <input <?= radio_state($option->id == $shipping_method->id && $sub_option->id == $shipping_method->sub_option_id) ?>
          id="<?= 'option'.$sub_option->id ?>" type="radio" name="shipping_option" value="<?= $sub_option->id ?>"/>
        <label for="<?= 'option'.$sub_option->id ?>">
  <?= h($sub_option->name) ?> - <strong><?= !$sub_option->is_free ? format_currency($sub_option->quote) : 'free!' ?></strong>
        </label><br/>
      <? endforeach ?>

    <? else: ?>

      <input <?= radio_state($option->id == $shipping_method->id) ?> id="<?= 'option'.$option->id ?>"
        type="radio" name="shipping_option" value="<?= $option->id ?>"/>
      <label for="<?= 'option'.$option->id ?>">
  <strong><?= h($option->name) ?></strong> - <strong><?= !$option->is_free ? format_currency($option->quote) : 'free!' ?></strong>
        <? if ($option->description): ?>
          <br/><?= h($option->description) ?>
        <? endif ?>
      </label><br/>

    <? endif ?>
  <? endforeach ?>
  <input type="hidden" name="checkout_step" value="<?= $checkout_step ?>"/>
  <input
      class="btn btn-primary btn-large"
      type="button"
      value="Next"
      onclick="return $(this).getForm().sendRequest(
    'place_order_and_pay', {update:{'checkout_page': 'shop:checkout_partial', 'checkout_progress_meter': 'shop:checkout_progress'}
  })"
  />
<? else: ?>
  <p>There are no shipping options available for your location.</p>
<? endif ?>
