<?php
  if (strpos(Phpr::$request->getUserAgent(), 'MSIE 6.') !== false ||
     strpos(Phpr::$request->getUserAgent(), 'MSIE 7.') !== false ||
     strpos(Phpr::$request->getUserAgent(), 'MSIE 8.') !== false):
?>

<?
   foreach ($product->extra_options as $option):
  $control_name = 'product_extra_options['.$option->option_key.']';
  $posted_options = post('product_extra_options', array());
  $is_checked = isset($posted_options[$option->option_key]);
?>
<span>
<input
  name="<?= $control_name ?>"
  <?= checkbox_state($is_checked) ?>
  id="extra_option_<?= $option->id ?>"
  value="1"
  type="checkbox"/>
    <?= h($option->description) ?>
    <? if ($option->price > 0): ?>
+ <?= format_currency($option->get_price($product)) ?>
<? else: ?>
free
<? endif ?>
<br>

<? endforeach ?>
</span>
<? else:
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
  <div class="onoffswitch">
    <input type="checkbox" name="<?= $control_name ?>" class="onoffswitch-checkbox" id="extra_option_<?= $option->id ?>" <?= checkbox_state($is_checked) ?> value="1">
    <label class="onoffswitch-label" for="extra_option_<?= $option->id ?>">
        <div class="onoffswitch-inner">
            <div class="onoffswitch-active">Yes</div>
            <div class="onoffswitch-inactive">No</div>
        </div>
        <div class="onoffswitch-switch"></div>
    </label>
  </div>
</span>
<?
  endforeach;
  endif
?>


