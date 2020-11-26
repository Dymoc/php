<?= isset($login) ? $login : '' ?>

<form method="post" action="<?= isset($action) ? $action : '' ?>">
	<input type="hidden" name="csrf_token" value="dsfhjksdfjksjgfdmlhgkjd">
	<div>
		<label for="login">Login</label>
		<input type="text" name="login">	
	</div>
	<div>
		<label for="password">Password</label>
		<input type="password" name="password">	
	</div>
	<div>
		<label for="check"><?= $labelCheck ?></label>
		<input type="hidden" name="check" value="<?= $check?>">	
		<input type="text" name="check2">	
	</div>
	<button type="submit">Войти</button>
</form>