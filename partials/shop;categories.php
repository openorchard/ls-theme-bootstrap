<?  
    if (!isset($category_url_name))
    $category_url_name = null;
    $categories = isset($parent_category) ? $parent_category->list_children() : Shop_Category::create()->list_root_children();

    if ($categories->count): 
?>
    <ul class="nav nav-list">
        <? foreach ($categories as $category):  ?>
            <li <? if ($category_url_name == $category->url_name): ?>class="current_category"<? endif ?>>
                <a href="<?= $category->page_url('/shop/category') ?>">
                    <? if ($category_url_name == $category->url_name): ?>
                        <div class="arrow-left"><?= $category->name ?></div>
                    <? else: ?>
                        <?= $category->name ?>
                    <? endif ?>
                </a>
                <? $this->render_partial('shop:categories', array('parent_category'=>$category)) ?>
            </li>
        <? endforeach; ?>
    </ul>
<? endif ?>