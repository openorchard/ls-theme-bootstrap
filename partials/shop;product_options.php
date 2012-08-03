<? if ($product->options->count): ?>
  <? foreach ($product->options as $option):
    $control_name = 'product_options['.$option->option_key.']';
    $posted_options = post('product_options', array());
    $posted_value = isset($posted_options[$option->option_key]) ? $posted_options[$option->option_key] : null;
  ?>
    <label><?= h($option->name) ?>:</label>
    <select name="<?= $control_name ?>">
      <?
        $values = $option->list_values();
        foreach ($values as $value):
      ?>
        <option <?= option_state($posted_value, $value) ?> value="<?= h($value) ?>"><?= h($value) ?></option>
      <? endforeach ?>
    </select>
  <? endforeach ?>
<? endif ?>