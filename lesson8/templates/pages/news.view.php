<nav class="mb-2">
	<a href="/news/create" class="btn btn-sm btn-outline-secondary">Добавить</a>
</nav>
<ul class="list-unstyled">
	<?php foreach ($news as $item): ?>
		<li class="mb-2">
			<a href="/news/?id=<?= $item['id'] ?>"><?= $item['title'] ?></a>
			<a href="/news/edit?id=<?= $item['id'] ?>" class="ml-2 badge badge-info">Редактировать</a>
			<form method="post" style="display: inline;" action="/news/delete?id=<?= $item['id'] ?>" id="rm-news-<?= $item['id'] ?>">
				<a href="javascript:void(0)" onclick="confirm('Вы уверены?') ? $('#rm-news-<?= $item['id'] ?>').submit() : null " class="badge badge-danger">Удалить</a>
			</form>
			<?php if($item['status'] === NEWS_STATUS_DRAFT): ?>
				<span class="badge badge-dark">Черновик</span>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
</ul>
