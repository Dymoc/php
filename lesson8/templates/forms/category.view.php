<?php
	$post = isset($post) ? $post : [];
?>
<form method="post">
	<div class="form-group">
		<label for="name" class="">Название</label>
		<input type="text" class="form-control" name="name" placeholder="Название" value="<?= array_get($post, 'name') ?>">
		<?php if(isset($errors['name'])): ?>
		<i class="text-danger fv-error"><?= implode('<br>', (array)$errors['name']) ?></i>
		<?php endif ?>	
	</div>

	<button type="submit" class="btn btn-success">Сохранить</button>
</form>