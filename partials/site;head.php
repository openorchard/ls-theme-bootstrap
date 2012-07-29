<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"><!--Setting the charset to UTF-8 since it is the most widely supported.-->
    <title><?= /* This automatically pulls the page title from what is assinged to the page in the backend. */ $this->page->title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $this->page->description ?>">
    <meta name="author" content="">

    <!-- CSS stuff -->
    <link href="<?= theme_resource_url('css/bootstrap.css') ?>" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    
    <link href="<?= theme_resource_url('css/bootstrap-responsive.css') ?>" rel="stylesheet">

    <!-- The HTML5 shim, for better IE6-8 support of HTML5 elements. -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav and touch icons -->
    <link rel="shortcut icon" href="<?= theme_resource_url('icons/favicon.ico') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= theme_resource_url('icons/apple-touch-icon-144-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= theme_resource_url('icons/apple-touch-icon-114-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= theme_resource_url('icons/apple-touch-icon-72-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= theme_resource_url('icons/apple-touch-icon-57-precomposed.png') ?>">
  
          <!--Javascript stuff-->
          
          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
        <?= $this->js_combine(array(
        'ls_core_jquery',
        '@js/bootstrap.min.js',
        '@js/bootstrap-alert.js',
        '@js/bootstrap-button.js',
        '@js/bootstrap-carousel.js',
        '@js/bootstrap-collapse.js',
        '@js/bootstrap-dropdown.js',
        '@js/bootstrap-modal.js',
        '@js/bootstrap-popover.js',
        '@js/bootstrap-scrollspy.js',
        '@js/bootstrap-tab.js',
        '@js/bootstrap-tooltip.js',
        '@js/bootstrap-transition.js',
        '@js/bootstrap-typeahead.js',
        ),
        array(
        'src_mode'=>false,
        'skip_cache'=>false
        )) 
        /* This is the javascript combiner and minifier.  Please refer to the documentation <link> on proper usage.
        It is made to automatically combine and minify javascript so that instead of having multiple requests for javascript files you make one.
        Very useful to keep your javascript in seperate and easy to manage files; yet keep it so that you don't hinder performance due to it.
        */
        ?>
  
  </head>
  <body>