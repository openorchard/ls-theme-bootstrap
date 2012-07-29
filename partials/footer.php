    <hr> <!--Creates a horizontal row using html for a nice sepearater effect -->
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