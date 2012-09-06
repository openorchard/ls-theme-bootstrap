<h2>Product Search</h2>
    <? if (strlen($query)): ?>
        <form method="get" action="/search">
            <input class="input-xxlarge" name="query" type="text" value="<?= isset($query) ? $query : null ?>"/>
            <input class="btn btn-inverse" type="submit" value="Find Products"/>
            <input type="hidden" name="records" value="24"/>
        </form>
        <p>Products found: <?= $pagination->getRowCount() ?></p>
            <? $this->render_partial('shop:product_list', array('products'=>$products, 'paginate'=>false)) ?>
                <div class="span12">
                    <? $this->render_partial('pagination', array(
                        'pagination'=>$pagination,
                        'base_url'=>root_url('/search'),
                        'suffix'=>$search_params_str)) 
                    ?>
                </div>
    <? else: ?>
        <form method="get" action="/search">
            <input class="input-xxlarge" name="query" type="text" value="<?= isset($query) ? $query : null ?>"/>
            <input class="btn btn-inverse" type="submit" value="Find Products"/>
            <input type="hidden" name="records" value="24"/>
        </form>
    <? endif ?>