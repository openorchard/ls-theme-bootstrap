<div class="span9">
    <ul id="tabs" class="nav nav-tabs">
        <li class="active">
            <a href="#" data-tab="tab1">Account Details</a>
        </li>
        <li><a href="#" data-tab="tab2">Orders</a></li>
    </ul>
        <script>
            // On li click
                $("#tabs li").click(function() {
            // Reset them
                $("#tabs li").removeClass("active");
            // Add to the clicked one only
                $(this).addClass("active");
            });
        </script>
    
    <div id="content">
        <div id="tab1" class="wrapper">
            <h2>Change Password</h2>
                <hr>
                <?= open_form(array('class'=>'form-inline')) ?>
                    <?= flash_message() ?>
                        <label class="span3" for="old_password">Old Password</label>
                        <input class="span4" id="old_password" type="password" name="old_password"/><br/>
                        <br>
                        <label class="span3" for="password">New Password</label>
                        <input class="span4" id="password" type="password" name="password"/><br/>
                        <br>
                        <label class="span3" for="password_confirm">Password Confirmation</label>
                        <input class="span4" id="password_confirm" type="password" name="password_confirm"/><br/>
                        <br>
                        <input class="btn btn-primary" type="submit" name="change_password" value="Submit"/>
                </form> 
            
        </div>
        <div id="tab2" class="wrapper">
            <?= $this->render_partial('account:orders') ?>
        </div>
    </div>

    <script>
    $(document).ready(function() {
    $("#content .wrapper").hide(); // Initially hide all content
    $("#tabs li:first").attr("id","current"); // Activate first tab
    $("#content .wrapper:first").fadeIn(); // Show first tab content

    $('#tabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return
        }
        else{
        $("#content .wrapper").hide(); //Hide all content
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
        $('#' + $(this).attr('data-tab')).fadeIn(); // Show content for current tab
        }
    });
});
    </script>
    
    
</div><!--Ending span9 for content-->