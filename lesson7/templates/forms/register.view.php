<?php
	$post = isset($post) ? $post : [];
?>
<form method="post" action="<?= isset($action) ? $action : '' ?>" style="max-width: 250px; margin: 0 auto;">
	<input type="hidden" name="csrf_token" value="dsfhjksdfjksjgfdmlhgkjd">
	<div class="form-group">
		<label for="login" class="">Логин</label>
		<!-- required -->
		<input type="text" class="form-control" name="login" placeholder="Логин" value="<?= array_get($post, 'login') ?>">
		<?php if(isset($errors['login'])): ?>
		<i class="text-danger fv-error"><?= implode('<br>', (array)$errors['login']) ?></i>
		<?php endif ?>	
	</div>
	<div class="form-group">
		<label for="password">Пароль</label>
		<input type="password" class="form-control" name="password" placeholder="Пароль">
		<?php if(isset($errors['password'])): ?>
		<i class="text-danger fv-error"><?= implode('<br>', (array)$errors['password']) ?></i>
		<?php endif ?>
	</div>
	<div class="form-group">
		<label for="password_repeat">Повтор пароля</label>
		<input type="password" class="form-control" name="password_repeat" placeholder="Повтор пароля">
		<?php if(isset($errors['password_repeat'])): ?>
		<i class="text-danger fv-error"><?= implode('<br>', (array)$errors['password_repeat']) ?></i>
		<?php endif ?>
	</div>
	<div class="form-group">
		<label for="email" class="">Электронная почта</label>
		<input type="email" class="form-control" name="email" placeholder="Электронная почта"  value="<?= array_get($post, 'email') ?>">
		<?php if(isset($errors['email'])): ?>
		<i class="text-danger fv-error"><?= implode('<br>', (array)$errors['email']) ?></i>
		<?php endif ?>	
	</div>
	<button type="submit" class="btn btn-outline-secondary">Отправить</button>
	<a href="/login" class="float-right">Войти</a>
</form>