<ul class="nav nav-list">
  <?
      $categories = Blog_Category::create()->find_all();
      foreach ($categories as $category):
  ?>
      <li>
        <a href="/blog/category/<?= $category->url_name ?>">
        <?= $category->name ?> (<?= $category->published_post_num ?>)
      </a>
      </li>
  <? endforeach ?>
</ul>