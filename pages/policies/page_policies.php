<h2>Store Policies</h2>
<hr>
<?
$about_page = Cms_Page::create()->find_by_url('/policies');
$this->render_partial('sitemap_pages', array('pages'=>$about_page->navigation_subpages()))
?>
