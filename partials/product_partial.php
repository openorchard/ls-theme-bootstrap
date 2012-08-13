<?php
    /**
        Lets setup the Option Matrix.
            These variables must be set at the top of the page so the OM will work properly.
            The first one looks for all the options, and the second gets the price of the 
            item from the OM for the selected option.
    **/
    $posted_options = Shop_ProductHelper::get_default_options($product);
    $price = $product->om('price', $posted_options);
?>

<div class="row-fluid">

<div class="span6">
<form class="product_form">
  <h2 class="span12"><?= $product->name ?></h2>

    <? foreach ($product->om('images') as $image): ?>
        <div class="span12">
            <? 
                /**
                    The next img tag is going to pull the image of the product as 270px by 270px.
                    Then it will get the product's name as the alternate tag.
                        If you change the width/height of the image being rendered then you should
                        also change the HTML attributes to match.
                **/
            ?>
            <a>
                <img src="<?= $image->getThumbnailPath(270, 270) ?>" alt="<?= $product->name ?>" height="270" width="270"/>
            </a>
        </div>
    <? endforeach ?>
  
    <?= $this->render_partial('shop:product_options') ?>
        <!--This is going to display the stock level as a number.-->
        <p>Number of items in stock: <strong><?= $product->om('in_stock', $posted_options) ?></strong></p>
 
<? 
    /** 
        Now we are checking to see if the product is out of stock.  If it is then we will display that the
        item is temporarily unavailable.  Next we check for an expected restock date (set in backend) and 
        if one is found then we display that.  Once these two checks are done, we close it all up.
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
  
    <!--Getting the product description to show.-->
  <p><?= $product->description ?></p>
  
  <p <? /** If product is on sale, add a class. **/ if ($is_discounted = $product->om('is_on_sale')): ?> class="red_scratch" <? endif ?>>Price: <?= format_currency($product->om('price', $posted_options)); ?></p>
  <? 
    /**
        If product is on sale, then show a sale price.
    **/
    if ($is_discounted = $product->om('is_on_sale')): 
  ?>
       <p>Sale price: <?= format_currency($product->om('sale_price')); ?> </p>
  <? endif ?>
  <input class="btn btn-primary" type="submit" name="add_to_cart" value="Add to cart"/>
</form>
</div><!--Ending the span for the product form-->

<div class="span6">
    <?= $this->render_partial('shop:product_attributes') ?>
</div><!--Ending the span for the product attributes, description, and other static content that does not deal with the product form-->
</div><!--Ending fluid row for the product page-->
