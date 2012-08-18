    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <h1><a class="brand"> <?=Shop_CompanyInformation::get()->name;?> </a></h1>

          <!--Main menu section-->
            <div class="nav-collapse">
              <ul class="nav">
                <li><a href="<?= root_url('')?>">Home</a></li>
                <li><a href="<?= root_url('about')?>">About Us</a></li>
                <li><a href="<?= root_url('contact')?>">Contact</a></li>
              </ul>

          <!--Ending main menu links-->

          <!--Customer button and search form area-->
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

                <form class="pull-right hidden-phone input-append" action="/search">
                  <input id="appendedInputButton" class="search-query" type="text" name="query" value="<?= isset($query) ? $query : null ?>" placeholder="Search here...">
                  <button class="btn btn-search" type="submit" name="records" value="999"><i class="icon-search"></i>&nbsp;Search</button>
                </form>
          <!--Ending customer button and search form area-->


            </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<script>
    $('.dropdown-toggle').dropdown();
</script>