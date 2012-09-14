<?
    $this->render_partial('site:head',
        array(), //No partial-specific parameters by default for this partial.
        array(
            'cache'=>true, //Turn caching on for this partial
            'cache_vary_by'=>array('url'),
                /* 
                    Having a different version for each URL. 
                    This way titles, meta-data, and other content specific to pages
                    will be properly chached.
                */
            'cache_versions'=>array('cms'), //Update this cache when a user updates the CMS.
            'cache_ttl'=>1800 //30 minute life for the cache.  Ignored when using file-based caching.
        ));
    $this->render_partial('main_menu',
        array(), //No partial-specific parameters by default for this partial.
        array(
            'cache'=>true, //Turn caching on for this partial
            'cache_vary_by'=>array('customer','customer_presence'),
                /*
                    Here we are telling the caching API to create different caches based on the customer
                    that is logged into the front-end (since we do have information specific to them in
                    the menu by default such as their name as a menu item) and based on whether a customer
                    is actually logged in or is a guest.
                
                    We don't tell it to cache based on URL by default here since their are no real advantages
                    in the default setup since we don't have anything URL specific in the navbar.
                */
            'cache_versions'=>array('cms'), //Update when the CMS updates.
            'cache_ttl'=>1800 //30 minute life for the cache.  Ignored when using file-based caching.
        ));
?>
        <div class="container-fluid"><!--This starts the fluid grid for the page.-->
            <div class="row-fluid"><!--This starts the main row for holding content.-->
                <div class="span12">
                    <? $this->render_partial('primary_sidebar');/* I don't recommend caching the sidebar here, but instead doing caching within the partial itself. */ ?>
                    <div class="span6">
                        <div class="row-fluid">
                            <div class="span12">
                                <? $this->render_page(); /* This renders what is in the "content" section of the page. */ ?>
                            </div><!--Ending span12 for content output-->
                        </div><!--Ending row-fluid for content-->
                    </div><!--Ending span6 for the content column-->
                    <div class="span3 well">
                        <? 
                            $this->render_partial('blog:sidebar',
                                array(),
                                array(
                                    'cache'=>true, //Turn the caching system on
                                    'cache_vary_by'=>array(), //Nothing in the sidebar that warrents a different version.
                                    'cache_versions'=>array('blog'), //Update when the blog updates in the backend.
                                    'cache_ttl'=>1800  //30 minute life for the cache.  Ignored when using file-based caching.
                            )); 
                        ?>
                    </div><!--Ending span3 for blog sidebar-->
                </div><!--Ending span12 of the row-->
            </div><!--Ending the content fluid row-->
            <? 
                $this->render_partial('footer',
                    array(), //No partial-specific parameters by default for this partial.
                    array(
                        'cache'=>true,
                        'cache_vary_by'=>array(),
                        'cache_versions'=>array(),
                            /*
                                The footer is static across the entire site by default, so we don't need
                                any different versions of it.  One output to cache for the entire site.
                            */
                        'cache_ttl'=>1800 //30 minute life for the cache.  Ignored when using file-based caching.
                    )); 
            ?>
        </div><!--/.fluid-container-->
<?  $this->render_partial('site:foot'); /* The foot is just </body></html> (two tags that are actually optional in HTML5.) In my honest opinion it is pointless to cache this. */ ?>
