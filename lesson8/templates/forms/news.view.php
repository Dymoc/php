<?php
	$news = isset($news) ? $news : [];
?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Заголовок <i class="text-danger">*</i></label>
		<input type="text" name="title" class="form-control" value="<?= array_get($news, 'title') ?>" placeholder="Заголовок">
		<?php if(isset($errors['title'])): ?>
		<i class="text-danger"><?= $errors['title'] ?></i>
		<?php endif ?>
	</div>
	<div class="form-group">
		<label>Контент <i class="text-danger">*</i></label>
		<textarea name="content"  class="form-control" rows="3" cols="20"  placeholder="Контент"><?= array_get($news, 'content') ?></textarea>
		<?php if(isset($errors['content'])): ?>
		<i class="text-danger"><?= $errors['content'] ?></i>
		<?php endif ?>
	</div>
	<div class="form-group">
		<label>Статус <i class="text-danger">*</i></label>
		<select name="status"  class="form-control">
			<option value="">Не выбрано</option>
			<?php foreach($statusList as $value): ?>
			<option value="<?= array_get($value, 'id') ?>" <?= array_get($news, 'status') === array_get($value, 'id') ? 'selected="selected"' : ''; ?>  >
				<?= array_get($value, 'name') ?>
			</option>
			<?php endforeach; ?>
		</select>
		<?php if(isset($errors['status'])): ?>
		<i class="text-danger"><?= $errors['status'] ?></i>
		<?php endif ?>
	</div>
	<div class="form-group">
		<label>Изображение</label>
		<input type="file" class="form-control" name="img">
		<?php if(array_get($news, 'img') ):?>
			<img src="<?= array_get($news, 'img') ?>" class="img-fluid">
		<?php endif; ?>
	</div>
	<button type="submit" class="btn btn-sm btn-success">Сохранить</button>
</form>