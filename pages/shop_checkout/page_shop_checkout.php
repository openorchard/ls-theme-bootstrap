<div class="span9">
    <h2>Check Out</h2>
        <? if (Shop_Cart::get_item_total_num() != 0): ?>
            <div id="checkout_page">
                <? $this->render_partial('shop:checkout_partial') ?>
            </div>
        <? else: ?>
            <p>Your shopping cart is empty.</p>
        <? endif ?>
</div>