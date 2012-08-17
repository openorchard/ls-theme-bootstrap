<? 
    $this->render_partial('site:head');
    $this->render_partial('main_menu'); 
?>
    
        <div class="container-fluid"><!--This starts the fluid grid for the page.-->
            <div class="row-fluid"><!--This starts the main row for holding content.-->
<div class="span12">
<?
    $this->render_partial('primary_sidebar');
?>
<div class="span6">
<?
    $this->render_page(); /* This renders what is in the "content" section of the page. */
?>
</div><!--Ending span6 for the content-->
<div class="span3 well">
<?
    $this->render_partial('blog:sidebar');
?>
</div><!--Ending span3 for blog sidebar-->
</div><!--Ending span12 of the row-->
            </div><!--Ending the content fluid row-->
<? $this->render_partial('footer'); ?>

        </div><!--/.fluid-container-->
<?  $this->render_partial('site:foot'); ?>