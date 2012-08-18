<? $items = Shop_Cart::list_active_items();
   $total = Shop_Cart::total_price();
   $total_qty = Shop_cart::get_item_total_num();
?>

<div class="box base-mini mini-cart" style="text-align: center;">
    <div class="head">
                <h4> &nbsp;<a href="<?= root_url('shop/cart') ?>"><? if (!$this->customer || $this->customer->guest):; echo 'My'; else:; echo $this->customer->name.'\'s'; endif ?>&nbsp;Cart</a></h4>
    </div>
    <div class="actions">
		<p>There are <strong><?= $total_qty ?> item<? if($total_qty>1) echo 's' ?></strong> in your cart.</p>
		<p class="subtotal">Cart Subtotal <strong><span class="price"><?= format_currency($total) ?></span></strong></p>
		<button class="btn btn-info" type="button" onclick="location.href='<?= site_url('/checkout-start') ?>'"><span>Checkout</span></button>
	</div><!-- end .actions -->
	<h5>Recently added items</h5>
	<ol id="cart-sidebar">
		<?  $qty_count = 0;
			$items = array_reverse($items);
			foreach($items as $item):
			$options_str = $item->options_str();
		?>
			<li>
				<?= open_form() ?>
			    <div class="product-details">
    				<a href="#" class="widget-btn" onclick="return $(this).getForm().sendRequest('shop:on_deleteCartItem', {update: {'mini_cart': 'shop:mini_cart'}, confirm: 'Do you really want to remove this item from cart?', extraFields: {key: '<?= $item->key ?>'}})"><i class="icon-remove"></i></a>
					<?= $item->product->name ?><br>
					<? if (strlen(trim($options_str)) > 0): ?>
						<?= $options_str ?><br>
					<? endif ?>
					<strong><?= $item->quantity ?></strong> x <span class="price"><?= format_currency($item->single_price()) ?></span>
				</div><!-- .product-details -->
				</form>
			</li>
			<? if($qty_count > $item->quantity )
				  break;
				$qty_count++;
		    ?>
		<? endforeach ?>
	</ol>
</div><!-- end .mini-cart -->
