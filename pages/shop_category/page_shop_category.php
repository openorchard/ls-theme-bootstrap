<div id="category-page">
<?
    /*
        This will check for a category first, if one is not found then it displays an error message.
        If the category is found, then it will get the name and short description.  Once those are pulled in
        the system will render the shop:products partial and give it the products variable containing a list
        of all the products in the given category for manipulation.
    */
?>
        <? if (!$category): ?>
            <h2>We are sorry, the specified category not found.</h2>
        <? else: ?>
            <h2><?= h($category->name) ?></h2>
            <p class="description"><?= h($category->short_description) ?></p>
            <? $this->render_partial('shop:product_list', 
                    array(
                        'products'=>$category->list_products(),
                        'records_per_page'=>24,
                        'paginate'=>true,
                        'pagination_base_url'=>$category->page_url('shop/category'),
                        'page_index'=>$this->request_param(1, 0)
                        /*NOTE: If you are using Nested Category URL's, set the 1 to -1 in the line above.*/
                    ),
                    array(
                        'cache'=>true,
                        'cache_vary_by'=>array('url'), //Different caches to each URL (category)
                        'cache_versions'=>array(), //There should be no version specific output in the default configuration.
                        'cache_ttl'=>1800 //30 minute life for the cache.  Ignored when using file-based caching.
                )); 
            ?>
        <? endif ?>
    </div>