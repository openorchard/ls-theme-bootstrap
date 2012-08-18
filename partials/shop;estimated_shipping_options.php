<? if (count($shipping_options)): ?>
  <ul>
    <? foreach ($shipping_options as $option): ?>
      <? if ($option->error_hint): ?>
        <li><?= h($option->name) ?> - <?= h($option->error_hint) ?></li>
      <? else: ?>
        <? if ($option->multi_option): ?>
          <li>
            <h4><?= h($option->name) ?></h4>
            <? if ($option->description): ?>
              <p><?= h($option->description) ?></p>
            <? endif ?>
  
            <ul>
            <? foreach ($option->sub_options as $sub_option): ?>
              <li>
                <?= h($sub_option->name) ?> - 
                <strong><?= !$sub_option->is_free ? format_currency($sub_option->quote) : 'free' ?></strong>
              </li>
            <? endforeach ?>
            </ul>
          </li>
        <? else: ?>
          <li>
            <?= h($option->name) ?> - 
            <strong><?= !$option->is_free ? format_currency($option->quote) : 'free' ?></strong>
            <? if ($option->description): ?>
              <span><?= h($option->description) ?></span>
            <? endif ?>
          </li>
        <? endif ?>
      <? endif ?>
    <? endforeach ?>
  </ul>
<? else: ?>
  <p>There are no shipping options available for your location.</p>
<? endif ?>