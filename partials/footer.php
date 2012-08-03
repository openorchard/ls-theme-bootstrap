    <hr>
      
      <? 
        /*
            This is the footer for the site.  By default it is setup to have 4 grid squares for content.
            The first grid is used for display copyright information.
                This grid displays a copyright symbol and then pulls the company name in from the backend as plain-text.
                Once the company name is pulled it it will then setup a space and display the current year dynamically.  This will make it so the year should not need to be updated which makes the site more maintanable.
            The second grid is used for displaying what payments your company accepts via images and displaying links to the store policies.
            The thrid grid is empty.  You can fill this in with whatever you feel like.
            The fourth grid is for contact information.
                The contact information is setup using a schema [ http://schema.org/Store ] in order to let spiders know how to interpret the data.  The schema may not be implimented 100% properly, but a decent base is there.
        
        */
      ?>
      
      <footer>
        <div class="span3">
            <p>&copy;&nbsp;<?= Shop_CompanyInformation::get()->name; ?>&nbsp;<?= date('Y') ?></p>
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
            &nbsp;
        </div>
        <div class="span3">
        <div itemscope itemtype="http://schema.org/LocalBusiness">
            <div itemprop="name"><?= Shop_CompanyInformation::get()->name; ?></div>
            Phone: <span itemprop="telephone"><a href="tel:+18506484200">
                850-648-4200</a></span>
            <br>
            Contact:<span itemprop="contactPoint"><a href="<?= root_url('/contact')?>">Email Us</a></span>
            <br>
            Address:
                <div itemprop="address">
                    <span itemprop="streetAddress">1600 Amphitheatre Pkwy</span>
                    <br>
                    <span itemprop="addressLocality">Mountain View</span>
                    <span itemprop="addressRegion">CA</span>
                    <span itemprop="postalCode">94043</span>
                </div>
        </div><!--Ending the scope of company information.-->
        </div>
      </footer>