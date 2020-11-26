<form method="post" action="<?= isset($action) ? $action : '' ?>" style="max-width: 250px; margin: 0 auto;">
	<?php if(isset($errorMsg)) : ?>
	<div class="alert alert-danger">
		<?= $errorMsg ?>
	</div>
	<?php endif;?>
	<input type="hidden" name="csrf_token" value="dsfhjksdfjksjgfdmlhgkjd">
	<div class="form-group">
		<label for="login" class="">Логин</label>
		<input type="text" class="form-control" name="login" placeholder="Логин">	
	</div>
	<div class="form-group">
		<label for="password">Пароль</label>
		<input type="password" class="form-control" name="password" placeholder="Пароль">	
	</div>
	
	<button type="submit" class="btn btn-outline-secondary">Войти</button>
	<a href="/register" class="float-right">Регистрация</a>
</form>