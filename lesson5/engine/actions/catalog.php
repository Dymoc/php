<?php

require DOCROOT . '/engine/db.php';

if (is_numeric(array_get($_GET, 'id'))) {

     $item = dbGetRow('select * from imgs where id = ' . (int)$_GET['id']  . ';');


     // $var = array_get($item, 'test');
     // $var = isset($item['test']) ? $item['test'] : 123;

     if (!$item) {
          abort(404);
     }

     $title = 'Картинка';

     $content = view('pages/img_item', $item);

     return require TPL_PATH . 'layout.php';
}



$title = 'Каталог';

$data = dbGetAll('select * from imgs;');


$content = view('pages/catalog', $data);

require TPL_PATH . 'layout.php';
