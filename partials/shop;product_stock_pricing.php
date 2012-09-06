<? $posted_options = Shop_ProductHelper::get_default_options($product); ?>

<!--This is going to display the stock level as a number.-->
        <p>Number of items in stock: <strong><?= $product->om('in_stock', $posted_options) ?></strong></p>
 
<? 
    /** 
    *    Now we are checking to see if the product is out of stock.  If it is then we will display that the
    *    item is temporarily unavailable.  Next we check for an expected restock date (set in backend) and 
    *    if one is found then we display that.  Once these two checks are done, we close it all up.
    **/
    if ($product->is_out_of_stock()): 
?>
        <p>
            <strong>This product is temporarily unavailable</strong>
                <? if ($product->expected_availability_date): ?> 
                    <br/>The expected availability date is <strong><?= $product->displayField('expected_availability_date') ?></strong>
                <? endif ?>
        </p>
    <? endif ?>
  <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
  <meta itemprop="currency" content="USD">
    <p <? /** If product is on sale, add a class. **/ if ($is_discounted = $product->om('is_on_sale')): ?> class="red_scratch" <? endif ?>>Price: <span <? if (!$is_discounted = $product->om('is_on_sale')): echo 'itemprop="price"'; endif ?>><?= format_currency($product->om('price', $posted_options)); ?></span></p>
    <? 
        /**
        *    If product is on sale, then show a sale price.
        **/
        if ($is_discounted = $product->om('is_on_sale')): 
    ?>
       <p>Sale price:<span itemprop="price"><?= format_currency($product->om('sale_price')); ?></span></p>
    <? endif ?>
  </div>