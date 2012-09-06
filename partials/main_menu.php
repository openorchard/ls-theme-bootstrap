    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?= root_url('/') ?>"><?=Shop_CompanyInformation::get()->name;?></a>

          <!--Main menu section-->
            <div class="nav-collapse">
              <ul class="nav">
                <li><a href="<?= root_url('/')?>">Home</a></li>
                <li><a href="<?= root_url('about/')?>">About Us</a></li>
                <li><a href="<?= root_url('contact/')?>">Contact</a></li>
              </ul>

          <!--Ending main menu links-->

          <!--Customer button and search form area-->
            <div class="btn-group pull-right hidden-phone">
              <? if (!$this->customer || $this->customer->guest): /*Display the following menu options only if the customer is not logged in. */ ?>
                  <a class="btn" href="<?= root_url('login/').'/'.$this->create_redirect_url() ?>">Login/Register</a>
              <? else: /*If any user is not a guest, then display their name as a menu option and then as a nested menu their account and other specific page info. */ ?>
               <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="icon-user"></i> <?= h($this->customer->name) ?>
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="<?= root_url('profile/') ?>">Profile</a></li>
                    <li><a href="<?= root_url('shop/cart/') ?>">Cart</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= root_url('logout/') ?>">Log Out</a></li>
                      </ul>
                <? endif /*Display for all users regardless of login status */ ?>
                </div><!--Ending login/user button-->
                <div class="pull-right">&nbsp;</div>
                <form class="pull-right hidden-phone form-search" action="/search">
                  <div class="input-append btn-group">
                      <input id="appendedInputButton" class="span2 search-query" type="text" name="query" value="<?= isset($query) ? $query : null ?>" placeholder="Search here...">
                      <button class="btn btn-search" type="submit" name="records" value="24"><i class="icon-search"></i>&nbsp;Search</button>
                  </div><!--ending div for the input append for search-->
                </form>
          <!--Ending customer button and search form area-->


            </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<script>
    $('.dropdown-toggle').dropdown();
</script>
