<h2>Order</h2>
<? if (!$order): ?>
  <h3>Order not found</h3>
<? else: ?>
  <p>
    Order # <?= $order->id ?><br/>
    Order Date: <?= h($order->order_datetime->format('%x')) ?><br/>
    Total: <?= format_currency($order->total) ?><br/>
    Status: <?= h($order->status->name) ?>
  </p>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Items</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <?
        foreach ($items as $item):
          $image_url = $item->product->image_url(0, 60, 'auto');
      ?>
        <tr>
          <td>
            <? if ($image_url): ?><img src="<?= $image_url ?>"/><? endif ?>
            <?= $item->output_product_name() ?>
            <? if ($item->product->product_type->files && $order->is_paid() && $item->product->files->count): ?>
              Download:
              <ul>
                <? foreach ($item->product->files as $file): ?>
                  <li><a href="<?= $file->download_url($order) ?>"><?= h($file->name) ?></a> (<?= $file->size_str ?>)</li>
                <? endforeach ?>
              </ul>
            <? endif ?>
          </td>
          <td><?= format_currency($item->single_price) ?></td>
          <td><?= format_currency($item->discount) ?></td>
          <td><?= $item->quantity ?></td>
          <th><?= format_currency($item->subtotal) ?></th>
        </tr>
      <? endforeach ?>
    <tbody>
  </table>

  <p>
    Subtotal: <?= format_currency($order->subtotal) ?><br/>
    Discount: <?= format_currency($order->discount) ?><br/>
    Goods tax: <?= format_currency($order->goods_tax) ?><br/>
    Shipping: <?= format_currency($order->shipping_quote) ?>
    <? if ($order->shipping_tax): ?>
      <br/>Shipping tax: <?= format_currency($order->shipping_tax) ?>
    <? endif ?>
  </p>

  <h3>Total:<strong> <?= format_currency($order->total) ?></strong></h3>
    <? if($order->payment_method->has_payment_form() && !$order->payment_processed()): ?>
      <a class="btn btn-primary" href="<?= root_url('shop/checkout/pay/'. $order->order_hash) ?>">Pay</a>
    <? endif ?>
  <p>
    <a href="/orders">Return to the order list</a>
  </p>
<? endif ?>
