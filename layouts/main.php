<? 
    $this->render_partial('site:head');
    $this->render_partial('main_menu'); 
?>
    
        <div class="container-fluid"><!--This starts the fluid grid for the page.-->
            <div class="row-fluid"><!--This starts the main row for holding content.-->

<?
    $this->render_partial('category_sidebar');
    $this->render_page(); /* This renders what is in the "content" section of the page. */
?>
            </div><!--Ending the content fluid row-->
<? $this->render_partial('footer'); ?>

        </div><!--/.fluid-container-->
<?  $this->render_partial('site:foot'); ?>