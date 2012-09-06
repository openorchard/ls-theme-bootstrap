            <?
              /*
                Setting up the options matrix with posted options, then
                setting up the max_value variable for setting the max value
                acceptable for the input.  It is equal to the stock level
                of the item/options available.
              */
              $posted_options = Shop_ProductHelper::get_default_options($product);
              $max_value =  $product->om('in_stock', $posted_options);
            ?>
            <div class="qty_controls">
                <div class="btn-group quantity_control">
                     <a href="#" class="arrow up btn"><i class="icon-arrow-up"></i></a>
                     <input class="input-mini" type="number" name="product_cart_quantity" value="<?= post('product_cart_quantity', 1) ?>" min="1" max="<?= $max_value ?>"/>
                     <a href="#" class="arrow down btn"><i class="icon-arrow-down"></i></a>
                </div><!--Ending button group controls for the quantity.-->
            </div><!--Ending the entire quantity control container-->
            <button
               class="button_control btn btn-primary btn-large btn-block"
               onclick="return $(this).getForm().sendRequest('shop:on_addToCart', {
                   onAfterUpdate: init_effects,
                   update: {
                      'product_page': 'product_partial',
                      'mini_cart': 'shop:mini_cart'
                    },
                    onSuccess: function() {
            site.message.addToCart($('[name=product_cart_quantity]').val());
          },
                  })">
                Add to cart
            </button>
