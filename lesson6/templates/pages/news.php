<a href="/news/?action=create">Добавить</a>

<ul style="list-style: none;">
	<?php foreach ($news as $item): ?>
		<li style="margin-bottom: 1rem;">
			<a href="/news/?id=<?= $item['id'] ?>" style="padding: .2rem; border: 1px solid #cecece;"><?= $item['title'] ?></a>
			<a href="/news/?id=<?= $item['id'] ?>&action=edit">Редактировать</a>
		</li>
	<?php endforeach; ?>
</ul>
