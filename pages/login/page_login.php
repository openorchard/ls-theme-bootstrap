<div class="span6">
        <h3>Login</h3>
        <br>
            <?= open_form(array('class'=>'form-inline row-fluid')) ?>
                <label class="span5" for="login_email">Email</label>
                <input class="input-large" id="login_email" autofocus="autofocus" type="email" name="email" value="<?= h(post('email')) ?>" placeholder="user@example.com"/>
                <br>
                <br>
                <label class="span5" for="login_password">Password</label>
                <input class="input-large" id="login_password" type="password" name="password" placeholder="Password"/>
                <br>
                <br>
                <input class="btn btn-primary" type="submit" name="login" value="Login"/>
                <input type="hidden" name="redirect" value="<?= $this->redirect_url('/') ?>"/>
            </form>
    </div><!--Ending span for login area-->

    <div class="span6">
        <h3>Register with us.</h3>
        <br>
            <?= open_form(array('class'=>'form-inline row-fluid')) ?>
                <label class="span5" for="first_name">First Name</label>
                <input class="input-large" name="first_name" value="<?= h(post('first_name')) ?>" id="first_name" type="text" placeholder="First Name"/>
                <br>
                <br>
                <label class="span5" for="last_name">Last Name</label>
                <input class="input-large" name="last_name" value="<?= h(post('last_name')) ?>" id="last_name" type="text" placeholder="Last Name"/>
                <br>
                <br>
                <label class="span5" for="signup_email">Email</label>
                <input class="input-large" id="signup_email" type="email" name="email" value="<?= h(post('email')) ?>" placeholder="user@example.com"/>
                <br>
                <br>
                <label class="span5" for="password">Password</label>
                <input class="input-large" id="password" type="password" name="password" value="" autocomplete="off" placeholder="Password"/>
                <br>
                <br>
                <label class="span5" for="password_confirm">Password Confirmation</label>
                <input class="input-large" id="password_confirm" type="password" name="password_confirm" value="" autocomplete="off" placeholder="Password Confirm"/>
                <br>
                <label><input type="checkbox" id="terms"/> I agree to the <a href="<?= root_url('policies/terms_and_conditions')?>">Terms and Conditions</a> and the <a href="<?= root_url('policies/return_policy') ?>">Return Policy</a>.</label>
                <br>
                <input type="hidden" name="customer_auto_login" value="1"/><!--This hidden input will automatically log a customer in after the signup is complete. To turn this off either change the value to 0 or delete this line.-->
                <input
                            type="button"
                            onclick="return $(this).getForm().sendRequest('shop:on_signup',{
                                preCheckFunction: function() {
                                    var error = 0;
                                    if (!$('#terms').is(':checked')) {
                                        alert('Before you can continue we ask that you accept our Terms and Conditions and Privacy Policy.');
                                        error = 1;
                                    }
                                    else if ($('#password').val().trim().length < 8) {
                                        alert('You need to have a minimum of 8 characters in your password.');
                                        error = 1;
                                    }
                                    if (error) {
                                        return false;
                                    }
                                    else {
                                        return true;
                                    }},
                                            extraFields: {
                                                'redirect': '<?= $this->redirect_url('/') ?>',
                                                                },
                                        })"
                        class="btn btn-primary"
                        value="Register"/>

            </form>

    </div><!--Ending span for register area-->