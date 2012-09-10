<h2>Compare Products</h2>

<?= open_form() ?>
  <? if (!$products->count): ?>
    <p>The product compare list is empty</p>
  <? else: ?>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <td>&nbsp;</td>
          <? foreach ($products as $product): ?>
            <td>
              <? $images = $product->om('images');
                $image_url = $images->count ? $images[0]->getThumbnailPath(130, 130) : null;
                if ($image_url != null): ?>
                <img src="<?= $image_url ?>" alt="<?= h($product->name) ?>"/>
              <? endif ?>

              <h3><a href="<?= $product->page_url('shop/product') ?>"><?= h($product->name) ?></a></h3>
            </td>
          <? endforeach ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>Price</th>
          <? foreach ($products as $product):
              $is_on_sale = $product->is_on_sale();
          ?>
            <td>
              <strong>
                <?= format_currency($product->om('price')) ?>
              </strong>
              <? if ($is_on_sale): ?>
                <strong class="sale_price">
                  <?= format_currency($product->om('sale_price')) ?>
                </strong>
              <? endif ?>
            </td>
          <? endforeach ?>
        </tr>
        <tr>
          <th>Description</th>
          <? foreach ($products as $product): ?>
           <td class="product"><?= $product->description ?></td>
          <? endforeach ?>
        </tr>
        <tr>
          <th>Manufacturer</th>
          <? foreach ($products as $product): ?>
            <td><?= $product->manufacturer ? h($product->manufacturer->name): null ?></td>
          <? endforeach ?>
        </tr>
        <? foreach ($attributes as $attribute): ?>
          <tr>
            <th><?= h($attribute) ?></th>
            <? foreach ($products as $product): ?>
              <td class="product"><?= $product->get_attribute($attribute) ?></td>
            <? endforeach ?>
          </tr>
        <? endforeach ?>
        <tr>
          <td>&nbsp;</td>
          <? foreach ($products as $product): ?>
          <td class="product">
          <input
            class="btn btn-primary"
            onclick="return $(this).getForm().sendRequest(
            'shop:on_addToCart', {
            extraFields: {product_id: '<?= $product->id ?>'},
            onSuccess: function(){alert('The product has been added to the cart')},
            update: {'mini_cart': 'shop:mini_cart'}})"
            type="button" value="Add to cart""/>
          </td>
          <? endforeach ?>
        </tr>
        <tr>
            <td>&nbsp;</td>
        <? foreach ($products as $product): ?>
            <td>
                <?= $product->name ?>
            </td>
        <? endforeach ?>
        </tr>
      </tbody>
    </table>
  <? endif ?>
</form>