<?
  foreach ($product->extra_options as $option):
  $control_name = 'product_extra_options['.$option->option_key.']';
  $posted_options = post('product_extra_options', array());
  $is_checked = isset($posted_options[$option->option_key]);
?>
<span>
  <?= h($option->description) ?>:
    <? if ($option->price > 0): ?>
      + <?= format_currency($option->get_price($product)) ?>
    <? else: ?>
      free
    <? endif ?>
<br>
<div class="normal-toggle-button">
    <input type="checkbox" name="<?= $control_name ?>" id="extra_option_<?= $option->id ?>" <?= checkbox_state($is_checked) ?> value="1">
</div>
<script>
$('.normal-toggle-button').toggleButtons();
</script>
</span>
<br><br>
<? endforeach ?>


