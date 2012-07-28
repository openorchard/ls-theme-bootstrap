<?  
if (!isset($category_url_name))
$category_url_name = null;
 
$categories = isset($parent_category) ? $parent_category->list_children() : Shop_Category::create()->list_root_children();
 
if ($categories->count): ?>
<ul class="nav nav-list">
<? foreach ($categories as $category):  ?>
<li <? if ($category_url_name == $category->url_name): ?>class="current"<? endif ?>>
<a href="<?= $category->page_url('/category') ?>"><?= $category->name ?></a>
 
<? $this->render_partial('shop:categories', array('parent_category'=>$category)) ?>
</li>
<? endforeach; ?>
</ul>
<? endif ?>