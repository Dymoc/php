<nav class="mb-2">
	<a href="/categories/create" class="btn btn-sm btn-outline-secondary">Добавить</a>
</nav>
<ul class="list-unstyled">
	<?php foreach ($items as $item): ?>
		<li class="mb-2">
			<a href="/categories/?id=<?= $item['id'] ?>"><?= $item['name'] ?></a>
			<a href="/categories/edit?id=<?= $item['id'] ?>" class="ml-2 badge badge-info">Редактировать</a>
			<form method="post" style="display: inline;" action="/categories/delete?id=<?= $item['id'] ?>" id="rm-news-<?= $item['id'] ?>">
				<a href="javascript:void(0)" onclick="confirm('Вы уверены?') ? $('#rm-news-<?= $item['id'] ?>').submit() : null " class="badge badge-danger">Удалить</a>
			</form>
		</li>
	<?php endforeach; ?>
</ul>
