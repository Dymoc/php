<h1><?= $title ?></h1>
<?php if(isset($img)) :?>
	<img src="<?= $img ?>" alt="<?= $title ?>" class="img-fluid">
<?php endif; ?>
<p>
	<?= $content ?>
</p>
<i><?= date('d.m.Y H:i', strtotime($created_at)); ?></i>