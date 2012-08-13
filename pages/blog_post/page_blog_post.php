<? if ($post): ?>
  <h2><?= h($post->title) ?></h2>

  <p>
    Published by <?= h($post->created_user_name) ?>
    on <?= $post->published_date->format('%F') ?>
    Comment(s): <?= $post->approved_comment_num ?>
  </p>

  <?= $post->content ?>

<? else: ?>
  <h2>Post not found</h2>
<? endif ?>