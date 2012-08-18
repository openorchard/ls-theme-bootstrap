<? foreach ($product->extra_options as $option):
  $control_name = 'product_extra_options['.$option->option_key.']';
  $posted_options = post('product_extra_options', array());
  $is_checked = isset($posted_options[$option->option_key]);
?>

<input
    name="<?= $control_name ?>"
    <?= checkbox_state($is_checked) ?>
    id="extra_option_<?= $option->id ?>"
    value="1"
    type="checkbox"
/>
<label for="extra_option_<?= $option->id ?>">
    <?= h($option->description) ?>:
      <? if ($option->price > 0): ?>
          + <?= format_currency($option->get_price($product)) ?>
        <? else: ?>
          free
      <? endif ?>
</label>
<? endforeach ?>
