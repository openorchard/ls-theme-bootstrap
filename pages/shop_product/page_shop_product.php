<div id="product_page" class="span9">
<? if ($product_unavailable): ?>
  <h2>We are sorry, product unavailable.</h2>
<? elseif(!$product): ?>
  <h2>We are sorry, product not found.</h2>
<? else:?>

<?
    /**
        Lets setup the Option Matrix.
            These variables must be set at the top of the page so the OM will work properly.
            The first one looks for all the options, and the second gets the price of the item from the OM for the selected option.
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
            <img src="<?= $image->getThumbnailPath(270, 270) ?>"/>
        </div>
    <? endforeach ?>
  
    <?= $this->render_partial('shop:product_options') ?>
  
    <? if ($product->track_inventory && $product->om('in_stock', $posted_options) > 0): ?>
        <p>Number of items in stock: <strong><?= $product->om('in_stock', $posted_options) ?></strong></p>
    <? endif ?>
 
<? if ($product->is_out_of_stock()): ?>
<p>
<strong>This product is temporarily unavailable</strong>
<? if ($product->expected_availability_date): ?> 
<br/>The expected availability date is <strong><?= $product->displayField('expected_availability_date') ?></strong>
<? endif ?>
</p>
<? endif ?>
  
  
  <?= $product->description ?>
  <p>Price: <?= format_currency($product->price()) ?></p>
  
  <input class="btn btn-primary" type="submit" name="add_to_cart" value="Add to cart"/>
</form>
</div><!--Ending the span for the product form-->

<div class="span6">
    <?= $this->render_partial('shop:product_attributes') ?>
</div><!--Ending the span for the product attributes, description, and other static content that does not deal with the product form-->
</div><!--Ending fluid row for the product page-->
<? endif ?>
</div>