<?
    $this->render_partial('site:head',
    array()//No partial specific options
    array(
        'cache'=>true, //Just turning on caching
        'cache_vary_by'=>array('url'), //Different head per page due to title being dependent upon the page.
        'cache_versions'=>array('cms'), //Recache when content in the CMS module is updated.
        'cache_ttl'=>1800 //This is setting the time to live for the cache if you are using memory based caching.  Filebased will ignore this.
    ));
    $this->render_partial('main_menu');
?>
        <div class="container-fluid"><!--This starts the fluid grid for the page.-->
            <div class="row-fluid"><!--This starts the main row-->
                <? $this->render_partial('primary_sidebar'); ?>
                <div class="span9">
                    <div class="row-fluid">
                        <div class="span12">
                            <? $this->render_page(); /* This renders what is in the "content" section of the page. */ ?>
                        </div><!--Ending span12 for the page content-->
                    </div><!--Ending the fluid row for the page content-->
                </div><!--Ending the span9 for the content column-->
            </div><!--Ending the main fluid row-->
            <? $this->render_partial('footer'); ?>

        </div><!--/.fluid-container-->
<?  $this->render_partial('site:foot'); ?>
