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

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <h1><a class="brand"><?= /*This pulls the company name in from the backend as plain-text in the front-end. */ Shop_CompanyInformation::get()->name; ?></a></h1>
 <div class="btn-group pull-right hidden-phone">
           <? if (!$this->customer || $this->customer->guest): /*Display the following menu options only if the customer is not logged in. */ ?>
                <a class="btn" href="<?= root_url('/login') ?>">Login/Register</a>
          <? else: /*If any user is not a guest, then display their name as a menu option and then as a nested menu their account and other specific page info. */ ?>
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> <?= $this->customer->name ?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?= root_url('profile') ?>">Profile</a></li>
              <li class="divider"></li>
              <li><a href="<?= root_url('signout') ?>">Sign Out</a></li>
            </ul>
          <? endif /*Display for all users regardless of login status */ ?>
          </div><!--Ending login/user button-->
          
          <form class="navbar-search pull-right hidden-phone">
            <input class="search-query" type="text" name="query" value="<?= isset($query) ? $query : null ?>" placeholder="Search here...">
            <button type="submit" name="records" value="999"><i class="icon-search"></i>&nbsp;Search</button>
          </form>
          
          
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="<?= root_url('')?>">Home</a></li>
              <li><a href="<?= root_url('account')?>">About</a></li>
              <li><a href="<?= root_url('contact')?>">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<script>
    $('.dropdown-toggle').dropdown();
</script>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <nav class="well sidebar-nav">
            <?= $this->render_partial('shop:categories') ?>
          </nav><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <p>Display recent product additions or somem other updating content here.  Perhaps a slider.</p>
          </div>
          <div class="row-fluid">
            <div class="span12">
                <h2>Latest from the blog:</h2><hr>
            </div>
            <? $post_list = Blog_Post::list_recent_posts(3) ?>
                <? foreach ($post_list as $post): ?>
                    <div class="span4">
                        <h3><?= h($post->title) ?></h3>
                            <p>
                                Published by <?= h($post->created_user_name) ?>
                                on <?= $post->published_date->format('%F') ?><br>
                                Comment(s): <?= $post->approved_comment_num ?>
                            </p>
                            <p>
                                <?= h($post->description) ?>
                            </p>
                            <p>
                                <a href="/blog/<?= $post->url_title ?>">Read more...</a>
                            </p>
                    </div>
                <? endforeach ?>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer class="row-fluid">
        <div class="span3">
            <p>&copy; <?= /*This pulls the company name in from the backend as plain-text in the front-end. */ Shop_CompanyInformation::get()->name; ?> 2012</p>
        </div>
        <div class="span3">
         Payments Accepted:<br>
         <p>payments</p>

         <br>
         Policies:<br>
         <a href="<?= root_url('policies/terms_and_conditions') ?>">Terms &amp; Conditions</a> <br>
         <a href="<?= root_url ('policies/return_policy') ?>">Return Policy</a> <br>
         <a href="<?= root_url('policies/privacy_policy') ?>">Privacy Policy</a><br>
        </div>
        <div class="span3">
        </div>
        <div class="span3">
            <a href="<?= root_url('/contact')?>">Email Us</a><br>
            Phone: Company phone <br>
            Address: <br>
                Company address
        </div>
      </footer>

    </div><!--/.fluid-container-->


  </body>
</html>
