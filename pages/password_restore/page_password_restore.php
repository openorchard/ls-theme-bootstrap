<h2>Password Restore</h2>
<?= open_form(array('class'=>'form-inline')) ?>
    <?= flash_message() ?>
	<label for="email">Email</label>
	<input id="email" type="text" name="email" value="<?= h(post('email')) ?>" class="text"/><br/>
	<br>
	<input class="btn btn-primary" type="submit" name="password_restore" value="Submit"/>
	<input type="hidden" name="redirect" value="<?= root_url() ?>"/>
</form>