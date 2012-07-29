<div class="span9">
    <div class="span4">
        <h3>Login</h3>
        <br>
            <?= open_form() ?>
                <label for="login_email">Email</label>
                <input id="login_email" type="text" name="email" value="<?= h(post('email')) ?>" placeholder="user@example.com"/><br>
  
                <label for="login_password">Password</label>
                <input id="login_password" type="password" name="password" placeholder="Password"/><br>
  
                <input type="submit" name="login" value="Login"/>
                <input type="hidden" name="redirect" value="/"/>
            </form>
    </div><!--Ending span for login area-->

    <div class="span4 offset1">
        <h3>Register with us.</h3>
        <br>
            <?= open_form() ?>
                <label for="first_name">First Name</label>
                <input name="first_name" value="<?= h(post('first_name')) ?>" id="first_name" type="text" placeholder="First Name"/><br>
  
                <label for="last_name">Last Name</label>
                <input name="last_name" value="<?= h(post('last_name')) ?>" id="last_name" type="text" placeholder="Last Name"/><br>
  
                <label for="signup_email">Email</label>
                <input id="signup_email" type="text" name="email" value="<?= h(post('email')) ?>" placeholder="user@example.com"/><br> 
        
                <label for="signup_email">Email Confirmation</label>
                <input id="signup_email" type="text" name="email" value="<?= h(post('email')) ?>" placeholder="user@example.com"/><br>
        
                <label for="password">Password</label>
                <input id="password" type="password" name="password" value="" autocomplete="off" placeholder="Password"/>

                <label for="password_confirm">Password Confirmation</label>
                <input id="password_confirm" type="password" name="password_confirm" value="" autocomplete="off" placeholder="Password Confirm"/>
                
                <br>
                
                <input type="hidden" name="customer_auto_login" value="1"/><!--This hidden input will automatically log a customer in after the signup is complete. To turn this off either change the value to 0 or delete this line.-->
                
                <input type="submit" name="signup" value="Register"/>
                <input type="hidden" name="redirect" value="/registration_thankyou"/>
            
            </form> 

    </div><!--Ending span for register area-->
</div><!--Ending span9 for the content area.-->