    <ul id="myTab" class="nav nav-tabs">
        <li class="active">
            <a href="#main_details" data-toggle="tab">Account Details</a>
        </li>
        <li><a href="#orders" data-toggle="tab">Orders</a></li>
    </ul>

    <div class="tab-content">
        <div id="main_details" class="tab-pane active">
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
        <div class="tab-pane" id="orders">
            <?= $this->render_partial('account:orders') ?>
        </div>
    </div>
    <script>
    $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    })

$(function () {
$('#myTab a:first').tab('show');
})
</script>
