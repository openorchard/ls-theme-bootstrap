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
              <li><a href="<?= root_url('logout') ?>">Log Out</a></li>
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