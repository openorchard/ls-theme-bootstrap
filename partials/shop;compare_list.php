<?= open_form() ?>
  <?
    $compare_product_list = Shop_ComparisonList::list_products();
    if ($compare_product_list->count):
  ?>
    <ul>
      <? foreach ($compare_product_list as $product): ?>
      <li>
        <a href="<?= $product->page_url('shop/product') ?>"><?= h($product->name) ?></a>
        <a href="#" title="Remove product" onclick="$(this).getForm().sendRequest(
          'shop:on_removeFromCompare', {
          extraFields: {product_id: '<?= $product->id ?>'},
          update: {compare_list: 'shop:compare_list'}
        }); return false">Remove</a>
      </li>
      <? endforeach ?>
    </ul>

    <a class="btn btn-inverse btn-small" href="<?= root_url('shop/compare') ?>">Compare!</a>
    or 
    <a class="btn btn-warning btn-small" href="#" onclick="return $(this).getForm().sendRequest(
      'shop:on_clearCompareList', {
      confirm: 'Do you really want to remove all products from the compare list?',
      update: {compare_list: 'shop:compare_list'}
    });">clear list</a>
  <? else: ?>
    <p>The product compare list is empty.</p>
  <? endif ?>
</form>
