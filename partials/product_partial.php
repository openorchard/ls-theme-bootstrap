<?php
    /**
        * Lets setup the Option Matrix.
        *    These variables must be set at the top of the page so the OM will work properly.
        *    The first one looks for all the options, and the second gets the price of the
        *    item from the OM for the selected option.
        *
        *
        *   IMPORTANT NOTICE:
        *       If you make a partial (such as the images and stock/pricing partial) you
        *       will need to add the $posted_options variable to the top of those as well!
    **/
    $posted_options = Shop_ProductHelper::get_default_options($product);
    $price = $product->om('price', $posted_options);
?>
<div class="row-fluid">
    <div class="span6">
        <form class="product_form row-fluid">
            <h2 class="span12"><?= $product->name ?></h2>
                <br><br><br><!--These breaks are needed since the alignment is off due to the use of jcarousel within Bootstrap and I'm too lazy to *really* fix it.-->
                    <?=
                        $this->render_partial('shop:product_images');
                        $this->render_partial('shop:product_options');
                        echo '<br>';
                        $this->render_partial('shop:product_extra_options');
                        $this->render_partial('shop:product_stock_pricing');
                        $this->render_partial('shop:product_add_to_cart');
                    ?>
        </form>
    </div><!--Ending the span for the product form-->
    <div class="span6">
        <?= $this->render_partial('shop:product_information') ?>
    </div><!--Ending the span for the product attributes, description, and other static content that does not deal with the product form-->
</div><!--Ending fluid row for the product page-->
<hr>
<?= $this->render_partial('shop:product_reviews') ?>
