<?
/**

This displays an unordered list of products from the category.
It sets up a list item for each product, within that list item it pulls in the name and image of the item (as a link to the product page) and finally the base price.
The image is 150px by 150px in size and retrieved from the Option Matrix.

**/
?>
<?
    /**
        This block of code activates pagination in the list that is outputed.
        If you don't want pagination, remove this and the related code on the
        category page that sets up pagination.
    **/
  if (isset($paginate) && $paginate)
  {
    $page_index = isset($page_index) ? $page_index-1 : 0;
    $records_per_page = isset($records_per_page) ? $records_per_page : 3;
    $pagination = $products->paginate($page_index, $records_per_page);
  }
  else
    $pagination = null;

  $products = $products instanceof Db_ActiveRecord ? $products->find_all() : $products;
?>


<ul id="product_list" class="category_list">
  <? foreach ($products as $product): ?>

    <li class="product_span">
      <a href="<?=  $product->page_url('/shop/product') ?>">
        <?= h($product->name) ?>
        <br>
        <?
            $images = $product->om('images');
            $image_url = $images->count ? $images[0]->getThumbnailPath(150, 150) : null;
            if ($image_url):
        ?>
        <img src="<?= $image_url ?>" alt="<?= h($product->name) ?>"/>
    </a>
    <br>
      <? endif ?>
      <?= format_currency($product->price()) ?>
    </li>
  <? endforeach ?>
</ul>
        <? if ($pagination): ?>
                <div class="span9 pagination pagination-centered">
                    <? $this->render_partial('pagination', array('pagination'=>$pagination, 'base_url'=>$pagination_base_url)); ?>
                <br>
                </div>
                
        <? endif ?>