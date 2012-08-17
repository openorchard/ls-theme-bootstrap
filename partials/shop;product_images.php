<?
    /*
      This block sets up the posted_options for the Option Matrix.
      Then it gets the images from the OM as the "images" variable.
    */
    $posted_options = Shop_ProductHelper::get_default_options($product);
    $images = $product->om('images', $posted_options);
?>
  <!--
    For consistancy the images up to always use the carousel styling.
  -->
<? if ($images->count): ?>
  <ul class="product_images carousel jcarousel-skin-custom span6">
    <? foreach ($images as $image): ?>
      <li><a title="<?= h($image->title) ?>" class="gallery_image" rel="product_image" href="<?= $image->getThumbnailPath(500, 'auto') ?>"><img src="<?= $image->getThumbnailPath(220, 'auto') ?>" alt="" width="220"/></a></li>
    <? endforeach ?>
  </ul>
    <!--
      This group of items sets up the controls for the image carousel.
    -->
    <div class="image_controls btn-group">
      <div class="prev_image btn" id="carousel_prev">Previous</div>
      <div class="image_index btn disabled">Image <span id="image_index">1</span> of <?= $images->count ?></div>
      <div class="next_image btn" id="carousel_next">Next</div>
    </div><!--Ending div element for the carousel button controls-->
<? endif ?>