<?php
	$news = isset($news) ? $news : [];
?>
<form method="post" enctype="multipart/form-data">
	<p>
		<label>Заголовок <i style="color: red;">*</i></label>
		<input type="text" name="title" value="<?= array_get($news, 'title') ?>">
		<?php if(isset($errors['title'])): ?>
		<i style="color: red;"><?= $errors['title'] ?></i>
		<?php endif ?>
	</p>
	<p>
		<label>Контент <i style="color: red;">*</i></label>
		<textarea name="content" rows="3" cols="20"><?= array_get($news, 'content') ?></textarea>
		<?php if(isset($errors['content'])): ?>
		<i style="color: red;"><?= $errors['content'] ?></i>
		<?php endif ?>
	</p>
	<p>
		<label>Статус <i style="color: red;">*</i></label>
		<select name="status">
			<option value="">Не выбрано</option>
			<?php foreach($statusList as $value): ?>
			<option value="<?= array_get($value, 'id') ?>" <?= array_get($news, 'status') === array_get($value, 'id') ? 'selected="selected"' : ''; ?>  >
				<?= array_get($value, 'name') ?>
			</option>
			<?php endforeach; ?>
		</select>
		<?php if(isset($errors['status'])): ?>
		<i style="color: red;"><?= $errors['status'] ?></i>
		<?php endif ?>
	</p>
	<button type="submit">Сохранить</button>
</form>