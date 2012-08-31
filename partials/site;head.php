<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"><!--Setting the charset to UTF-8 since it is the most widely supported.-->
    <title><?= /* This automatically pulls the page title from what is assinged to the page in the backend. */ $this->page->title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $this->page->description ?>">
    <meta name="author" content="">

    <!-- The fav and touch icons -->
    <link rel="shortcut icon" href="<?= theme_resource_url('icons/favicon.ico') ?>"><!--You may also want to throw your favicon into the root folder, that way you error log for apache won't get loaded with failures from the backend.-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= theme_resource_url('icons/apple-touch-icon-144-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= theme_resource_url('icons/apple-touch-icon-114-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= theme_resource_url('icons/apple-touch-icon-72-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= theme_resource_url('icons/apple-touch-icon-57-precomposed.png') ?>">


    <!-- CSS stuff -->
        <?=
            $this->css_combine(array(
                'ls_styles',
                '@css/bootstrap.css',
                '@css/static.css',
                '@css/bootstrap-responsive.css',
                '@css/jquery.fancybox-1.3.4.css',
                '@css/style.css',
                ),
            array(
                'src_mode' => true,
                'skip_cache' => true,
                'reset_cache' => true
                ))
        /*
            This is the CSS Combine array.  It is a system that will combine and minify all files listed in the first array.
            It is very useful since it creates one request for the stylesheet compared to having possibly many more.

            The second array here is a set of options.
            The first is src_mode (src being short for source).  If set to true, it will keep the files uncompressed to make for easier debugging.  If set to False, it will minify the code for a live site.  In developement, use True and when you move to a live site set it to False.
            The second option is skip_cache.  If set to true then this file will not be cached on the interal Lemonstand system.  False will allow LS to cache it.  It should be set to true for development, and false for a live site.
            The third and final option is reset_cache.  If you are using remote files in your array, this will force LS to reset the cache of those files each time they are used so the most up-to-date is always used.  Set to True for development and False for a live site.

            The @ symbol is used to designate the theme resource folder [ /themes/$themename/resources/ ] dynamically.  This allows fast and dynamic access to the resource folder from within the array.
            If you are adding any custom information you should put it into the resources folder somewhere and link to it using this reference.

            Each of these options works the same in the javascript combine array that follows in this head.

            Please see the documentation http://lemonstand.com/docs/combining_and_minifying_javascript_and_css_files/  for more information on this method and the javascript combine in the javascript section of this head..
        */

        ?>

          <!--Javascript stuff-->
        <?=
            $this->js_combine(array(
                '@js/jquery-1.8.js',
                'ls_core_jquery',
                '@js/bootstrap.js',
                '@js/jquery.jcarousel.min.js',
                '@js/jquery.fancybox-1.3.4.pack.js',
                '@js/jquery.livequery.js',
                '@js/jquery.placeholder.js',
                '@js/global.js'

                ),
                array(
                'src_mode'=>true,
                'skip_cache'=>true,
                'reset_cache'=>true
                ))
            /*
                If you want to use the built-in jquery you can replace the @js/jquery.js call with simply jquery.  This is not gauranteed to work with Bootstrap though which is why I included the most up-to-date jquery (1.8 and minimized) at the time of development.
                The ls_core_jquery file listed is a system file and is *required* for Lemonstand to function properly.
                jcarousel and fancybox are the 2 plugins used on the product page for images.
                livequery and placeholder are 2 plugins used on the product pages for the quantity manipulation.
            */
        ?>

      <!--
        The HTML5 shim, for better IE6-8 support of HTML5 elements.
        This styling is only applied if the browser is older than IE9,
        otherwise it will be ignored by the browser.
      -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


  </head>
  <!--This would be a good place to use php's flush to increase first byte time and general loading speed of other pages. ex. <?php /* flush(); */ ?>
  For more information see: http://www.php.net/manual/en/function.flush.php  and  http://developer.yahoo.com/performance/rules.html#flush  -->
  <body>
