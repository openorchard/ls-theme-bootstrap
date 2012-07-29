<div class="span9">
          <div class="hero-unit">
            <p>Display recent product additions or somem other updating content here.  Perhaps a slider.</p>
          </div>
          <div class="row-fluid">
            <div class="span12">
                <h2>Latest from the blog:</h2><hr>
            </div>
            <? $post_list = Blog_Post::list_recent_posts(3) /* Change the number here to change the number of posts to be pulled into the area.*/ ?>
                <? foreach ($post_list as $post): ?>
                    <div class="span4">
                        <h3><?= h($post->title) ?></h3>
                            <p>
                                Published by <?= h($post->created_user_name) ?>
                                on <?= $post->published_date->format('%F') ?><br>
                                Comment(s): <?= $post->approved_comment_num ?>
                            </p>
                            <p>
                                <?= h($post->description) ?>
                            </p>
                            <p>
                                <a href="/blog/<?= $post->url_title ?>">Read more...</a>
                            </p>
                    </div>
                <? endforeach ?>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->