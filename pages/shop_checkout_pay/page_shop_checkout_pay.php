<h2>Check Out</h2>
  <h3>Order Review</h3>
  <hr>
  <div class="row-fluid">
    <div class="span6">
        <p>Bill to:<br>
            <strong><?= $order->billing_first_name; echo '&nbsp;' . $order->billing_last_name ?></strong><br>
              <?=
                    $order->billing_street_addr;echo '<br>';
                    echo $order->billing_city; echo '&nbsp;' . $order->billing_state->name; echo '&nbsp;' . $order->billing_zip;
              ?>
        </p>
      </div><!--Ending span6 for billto -->
      <div class="span6">
          <p>Ship to:<br>
              <strong><?= $order->shipping_first_name; echo '&nbsp;' . $order->shipping_last_name ?></strong><br>
          <?=
              $order->shipping_street_addr;echo '<br>';
              echo $order->shipping_city; echo '&nbsp;' . $order->shipping_state->name; echo '&nbsp;' . $order->shipping_zip;
          ?>
          </p>
      </div><!--Ending span6 for shipto -->
  </div><!--Ending fluid row for bill/ship information-->
<br>
<br>
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
    <?php
        $items = $order->items;
        foreach ($items as $item):
        $image_url = $item->product->image_url(0, 60, 'auto');
    ?>
    <tr>
      <td>
          <? if ($image_url): ?><img src="<?= $image_url ?>" alt="<?= $item->product->name ?>" width="60" height="60"/><? endif ?>
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

<h4><strong>Total: <?= format_currency($order->total) ?></strong></h4>
  <hr>
  <h3>Payment Options</h3>

<div id="payment_form">
  <? $this->render_partial('shop:checkout:payment_form') ?>
</div><!--Ending the payment_form-->
<?= open_form(array('class'=>'form-inline')) ?>
  <? $payment_methods = Shop_PaymentMethod::list_applicable(
     $order->billing_country_id,
     $order->total) ?>

  <? foreach ($payment_methods as $payment_method): ?>
    <input
      <?= radio_state($payment_method->id == $order->payment_method_id) ?>
      type="radio"
      value="<?= $payment_method->id ?>"
      name="payment_method"
      id="<?= 'payment_method'.$payment_method->id ?>"
      onclick="$(this).getForm().sendRequest('shop:on_updatePaymentMethod', {
         update: {'payment_form': 'shop:checkout:payment_form'}})"/>

    <label for="<?= 'payment_method'.$payment_method->id ?>"><?= h($payment_method->name) ?></label><br/>
  <? endforeach ?>
</form>