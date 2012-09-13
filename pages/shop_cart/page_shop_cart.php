<h2><? if (!$this->customer || $this->customer->guest):; echo 'My'; else:; echo $this->customer->name.'\'s'; endif ?>&nbsp;Cart</h2>
    <hr>
    <?
        $active_items = Shop_Cart::list_active_items();
        $postponed_items = Shop_Cart::list_postponed_items();
    ?>
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#main_cart" data-toggle="tab">Main Cart</a></li>
            <li><a href="#postponed" data-toggle="tab">Postponed Items</a></li>
        </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="main_cart">

             <? if ($active_items): ?>
                <div class="row-fluid">
                  <?=
                      open_form(array('class'=>'span12'));
                      $this->render_partial('shop:cart_table', array('items'=>$active_items))
                  ?>
                        <div class="span4">
                            <h3>Cart Total</h3>
                              <p><?= format_currency($cart_total) ?></p>
                        </div>
                        <div class="span3">
                            <h3>Discount</h3>
                              <p><?= format_currency($discount) ?></p>
                        </div>
                        <div class="span4">
                            <h3>Estimated Total</h3>
                              <p><?= format_currency($estimated_total) ?></p>
                        </div>
                        <div class="span11">
                            <p><b>Shipping cost, taxes and discounts will be evaluated during the checkout process.</b></p>
                                <div class="span4">
                                <label class="span12" for="coupon_code">Do you have a coupon?</label>
                                    <input class="span12" id="coupon_code" value="<?= h($coupon_code) ?>" type="text" name="coupon"/>
                                    </div>
                                      <div class="span7">
                                      <button class="btn btn-info btn-block" type="submit">Apply Changes</button>
                                          <button class="btn btn-primary btn-large btn-block" type="submit" value="Checkout" name="set_coupon_code">Checkout</button>
                                          <input type="hidden" name="redirect" value="<?= root_url('shop/checkout') ?>"/>
                                      </div>
                        </div><!--Ending span11 for cupon code input and fine print.-->
                        </form><!--Ending the primary table form-->
                        </div><!--Ending fluid row for main cart-->
                        <hr>
                        <div class="span11">
                          <?= $this->render_partial('shop:cart:shipping_cost_estimator') ?>
                        </div>
            <? else: ?>
                <p>Your cart is empty.</p>
            <? endif ?>

        </div>
        <div class="tab-pane" id="postponed">
            <? if ($postponed_items): ?>
                <h3>Postponed items</h3>
                    <?= open_form(array('class'=>'span11')) ?>
                        <? $this->render_partial('shop:cart_table', array('items'=>$postponed_items, 'postponed'=>true)) ?>
                        <input class="btn btn-info" type="submit" value="Apply Changes"/>
                    </form>
            <? else: ?>
                <p>You have no postponed items currently.</p>
            <? endif ?>
        </div>
    </div>

<script>
    $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    })

$(function () {
$('#myTab a:first').tab('show');
})
</script>
