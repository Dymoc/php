<?php foreach ($imgs as $item) : ?>
     <a href="?id=<?= $item['id'] ?>"><img src="<?= $item['path'] . $item['name'] . '.png' ?>" alt="" style="width:100px"></a>
<?php endforeach; ?>