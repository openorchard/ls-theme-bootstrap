<? 
    $this->render_partial('site:head');
    $this->render_partial('main_menu');
    $this->render_partial('page_container');
    $this->render_partial('category_sidebar');
    $this->render_page(); /* This renders what is in the "content" section of the page. */
    $this->render_partial('footer');
    $this->render_partial('end_page');
    $this->render_partial('site:foot');
?>