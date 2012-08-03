<div class="span9">
          <div class="hero-unit">
            <h2>Example carousel</h2>
          <p>Watch the slideshow below.</p>
          <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
              <div class="item active">
                <img src="<?= theme_resource_url('demo/bootstrap-mdo-sfmoma-01.jpg') ?>" alt="">
                <div class="carousel-caption">
                  <h4>First Thumbnail label</h4>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
              </div>
              <div class="item">
                <img src="<?= theme_resource_url('demo/bootstrap-mdo-sfmoma-02.jpg') ?>" alt="">
                <div class="carousel-caption">
                  <h4>Second Thumbnail label</h4>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
              </div>
              <div class="item">
                <img src="<?= theme_resource_url('demo/bootstrap-mdo-sfmoma-03.jpg') ?>" alt="">
                <div class="carousel-caption">
                  <h4>Third Thumbnail label</h4>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
           
           
           <script>
            $('.carousel').carousel()
           </script>
           
           
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