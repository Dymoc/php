<?php

require DOCROOT . '/engine/db.php';

if (is_numeric(array_get($_GET, 'id'))) {

     $item = dbGetRow('select * from `imgs` where `id` = ' . (int)$_GET['id']  . ';');

     if (!$item) {
          abort(404);
     }

     $title = 'Картинка';

     $item['view']++;

     dbUpdateRow('update `imgs` SET `view`=' . (int)$item["view"] . ' where id = ' . (int)$_GET['id']  . ';');

     $content = view('pages/img_item', $item);

     return require TPL_PATH . 'layout.php';
}



$title = 'Каталог';

$data = dbGetAll('select * from `imgs` order by `view` desc;');


$content = view('pages/galary', $data);

require TPL_PATH . 'layout.php';
