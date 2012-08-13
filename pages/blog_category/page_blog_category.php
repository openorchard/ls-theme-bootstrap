<? if ($category): ?>
  <h2><?= h($category->name) ?></h2>

  <?
    $pagination = $posts->paginate($this->request_param(1, 1)-1, 2);
    $post_list = $posts->find_all();  
  ?>
  <ul>
    <? foreach ($post_list as $post): ?>
    <li>
      <h3><?= h($post->title) ?></h3>
      <p>
        Published by <?= h($post->created_user_name) ?>
        on <?= $post->published_date->format('%F') ?>
        Comment(s): <?= $post->approved_comment_num ?>
      </p>
      <p><?= h($post->description) ?></p>
      <p><a href="/blog/post/<?= $post->url_title ?>">Read more...</a></p>
    </li>
  <? endforeach ?>
  </ul>
<div class="span12 pagination pagination-centered">
  <? $this->render_partial('pagination', array('pagination'=>$pagination, 'base_url'=>'/blog/category/'.$category->url_name)) ?>
</div>
<? else: ?>
  <h2>Category not found</h2>
<? endif ?>