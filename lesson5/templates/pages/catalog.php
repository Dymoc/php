<?php foreach ($data as $item) : ?>
     <a href="/catalog/?id=<?= $item['id'] ?>"><img src="<?= $item['path_img'] . $item['name'] . '.png' ?>" alt="" style="width:100px"></a>
<?php endforeach; ?>