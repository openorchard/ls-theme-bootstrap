<div class="span9">
<div class="row-fluid">
<h2>Product Search</h2>
<? if (strlen($query)): ?>
<p>Products found: <?= $pagination->getRowCount() ?></p>
 
<? $this->render_partial('shop:product_list', array('products'=>$products, 'paginate'=>false)) ?>
 <div class="pagination span12">
<? $this->render_partial('pagination', array(
'pagination'=>$pagination,
'base_url'=>root_url('/search'),
'suffix'=>$search_params_str)) ?>
</div>
  <? else: ?>
    <p>Please enter a search query to the <srtong>Find products</srtong> field and hit Enter.</p>
  <? endif ?>
</div><!--Ending fluid row-->
</div><!--Ending span9 for page content-->