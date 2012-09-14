        <div class="span3">
          <aside class="well sidebar-nav hidden-phone">
            <div id="mini_cart">
          		<? $this->render_partial('shop:mini_cart'); /* Not worth caching since it can change often and is highly user-specific. */ ?>
          	</div>
            <hr>
            <nav>
                <h4>Shop by category:</h4>
            	<? 
                    $this->render_partial('shop:categories',
                        array(),
                        array(
                            'cache'=>false,
                                /*
                                    This is turned off by default since there is most likely
                                    minimal gain from turning it on.  If you want you can test
                                    and see if your store and configuration see any improvement.
                                */
                            'cache_vary_by'=>array('url'), //Different versions for each URL since there are active states.
                            'cache_versions'=>array('catalog'), //Update the cache upon the catalog updating.
                            'cache_ttl'=>1800 //30 minute life for the cache.  Ignored when using file-based caching.
                    )); 
                ?>
          	</nav>
            <hr>
          	<h4>Compare</h4>
              <div id="compare_list">
                  <? $this->render_partial('shop:compare_list') /* Not worth caching since it can change often and is highly user-specific. */ ?>
              </div>
          </aside><!--/.well -->
        </div><!--/span-->
