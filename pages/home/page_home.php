<div class="hero-unit">
        <h2>Our Company:</h2>
            <p>
                lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lobortis tortor quis mi rhoncus vel tincidunt odio consequat. Donec pellentesque, ante sed hendrerit sagittis, urna metus tristique sem, quis mattis tellus libero nec purus. Aenean adipiscing vehicula nulla condimentum imperdiet. Etiam sapien justo, rutrum in aliquam et, venenatis ut lectus. Donec dolor dolor, condimentum a aliquam pharetra, fringilla vel elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut ultrices dapibus elit sed gravida.
            </p>
            <p>
                    Pellentesque est nunc, dapibus ut pulvinar non, tristique ut ante. Curabitur sem sapien, condimentum non facilisis blandit, lobortis non justo. Fusce vitae sem nec orci pellentesque imperdiet ut ac odio. Aenean ac elit ante, eu vehicula diam. Mauris lacinia dolor vitae nisi tincidunt pellentesque. Morbi aliquam elementum quam, ut congue augue vulputate nec. Nam ante augue, semper eu mollis id, vestibulum sed lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis massa id ante facilisis lobortis. Nullam molestie viverra elit at iaculis. Sed in pulvinar lacus. Duis ornare lacinia leo, vel interdum eros congue ac. Aenean dapibus, nisl eu volutpat scelerisque, felis massa sodales leo, eu dictum turpis urna vitae mi. Nam laoreet lectus id neque iaculis dignissim. Mauris pulvinar rhoncus tortor, nec interdum dui tincidunt eu.
            </p>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <h3>Latest products:</h3>
            <hr>
                <?
                    $latest_products = Shop_Product::create()->apply_filters()->order('created_at desc')->limit(6);
                    $this->render_partial('shop:product_list', array('products'=>$latest_products, 'paginate'=>false));
                ?>
        </div>
    </div><!--Ending fluid row for latest products-->

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
                                <a href="/blog/post/<?= $post->url_title ?>">Read more...</a>
                            </p>
                    </div>
                <? endforeach ?>
            </div><!--Ending fluid row for blog posts-->