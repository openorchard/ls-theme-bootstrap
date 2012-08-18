<div class="span9">
    <h2><? if (!$this->customer || $this->customer->guest):; echo 'My'; else:; echo $this->customer->name.'\'s'; endif ?>&nbsp;Cart</h2>
    <hr>
    <?
        $active_items = Shop_Cart::list_active_items();
        $postponed_items = Shop_Cart::list_postponed_items();
    ?>
    <?= flash_message() ?>
    <? if ($active_items): ?>
    <div class="row-fluid">
        <?= open_form(array('class'=>'span11')) ?>
          <? $this->render_partial('shop:cart_table', array('items'=>$active_items)) ?>
            <div class="span3">
                <h3>Cart Total</h3>
                  <p><?= format_currency($cart_total) ?></p>
            </div>
            <div class="span3">
                <h3>Discount</h3>
                  <p><?= format_currency($discount) ?></p>
            </div>
            <div class="span3">
                <h3>Estimated Total</h3>
                  <p><?= format_currency($estimated_total) ?></p>
            </div>
            <div class="span11">
                <p>* Shipping cost, taxes and discounts will be evaluated during the checkout process.</p>
                    <label for="coupon_code">Do you have a coupon?</label>
                        <input id="coupon_code" value="<?= h($coupon_code) ?>" type="text" name="coupon"/>
                        <br>
                        <div class="span4">
                          <input class="btn btn-info" type="submit" value="Apply Changes"/>
                        </div>
                        <div class="span4 offset 3">
                          <input class="btn btn-primary btn-large" type="submit" value="Checkout" name="set_coupon_code"/>
                          <input type="hidden" name="redirect" value="<?= root_url('shop/checkout') ?>"/>
                        </div>
            </div><!--Ending span9 for cupon code input and fine print.-->
  </form>
</div><!--Ending fluid row for main cart-->
  <br>
  <hr>
  <?= $this->render_partial('shop:cart:shipping_cost_estimator') ?>
  <br>
  <hr>
<? else: ?>
  <p>Your cart is empty.</p>
<? endif ?>
<? if ($postponed_items): ?>
    <h3>Postponed items</h3>
      <?= open_form(array('class'=>'span11')) ?>
          <? $this->render_partial('shop:cart_table', array('items'=>$postponed_items, 'postponed'=>true)) ?>

        <input class="btn btn-info" type="submit" value="Apply Changes"/>
      </form>
<? endif ?>

</div><!--Ending span9 for the page.-->
