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
                <? $this->render_partial('shop:checkout_progress_static'); ?>
                <div class="span9">
                    <div class="row-fluid">
                        <div class="span12">
                            <? $this->render_page(); /* This renders what is in the "content" section of the page. */ ?>
                        </div><!--Ending span12 for the page content-->
                    </div><!--Ending the fluid row for the page content-->
                </div><!--Ending the span9 for the content column-->
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
<?  $this->render_partial('site:foot'); ?>
