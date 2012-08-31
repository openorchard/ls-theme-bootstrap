<? $postponed = isset($postponed) ? $postponed : null ?>
<table class="table table-striped table-bordered">
  <tr>
    <th>Cart Items</th>
    <th><? if (!$postponed): ?>Postpone<? else: ?>Postponed<? endif ?></th>
    <th>Quantity</th>
    <th>Delete</th>
    <th>Price</th>
    <th>Discount</th>
    <th>Total</th>
  </tr>
  <? if (!count($items)): ?>
    <tr>
      <td colspan="6">Your cart is empty.</td>
    </tr>
  <? else: ?>
  <?
    foreach ($items as $item):
    $images = $item->om('images');
    $image_url = $images->count ? $images[0]->getThumbnailPath(60, 100) : null;
    $options_str = $item->options_str();
  ?>
    <tr>
      <td>
        <? if ($image_url): ?>
          <img src="<?= $image_url ?>" alt="<?= h($item->product->name) ?>" height="100" width="60"/>
        <? endif ?>
        <strong><a href="<?= $item->product->page_url('shop/product') ?>"><?= h($item->product->name) ?></a></strong>
        <? if (strlen($options_str)): ?>
          <br/><?= h($options_str) ?>.
        <? endif ?>
        <? if ($item->extra_options): ?>
          <? foreach ($item->extra_options as $option): ?>
            <br/>
            + <?= h($option->description) ?>:
            <?= format_currency($option->get_price($item->product)) ?>
          <? endforeach ?>
        <? endif ?>
      </td>
      <td>
        <input type="hidden" name="item_postponed[<?= $item->key ?>]" value="0"/>
        <input type="checkbox" <?= checkbox_state($item->postponed) ?> name="item_postponed[<?= $item->key ?>]" value="1"/>
      </td>
      <td>
        <? if (!$postponed): ?>
          <div class=" btn-group quantity_control">
            <a href="#" class="arrow up btn"><i class="icon-arrow-up"></i></a>
            <input class="input-mini" type="number" name="item_quantity[<?= $item->key ?>]" value="<?= $item->quantity ?>"/>
            <a href="#" class="arrow down btn"><i class="icon-arrow-down"></i></a>
          </div>
        <? else: ?>
          <?= $item->quantity ?>
        <? endif ?>
      </td>
      <td><input type="checkbox" name="delete_item[]" value="<?= $item->key ?>"/></td>
      <td><?= format_currency($item->single_price()) ?></td>
      <td><?= format_currency($item->total_discount()) ?></td>
      <th><?= format_currency($item->total_price()) ?></th>
    </tr>
    <? endforeach ?>
  <? endif ?>
</table>
