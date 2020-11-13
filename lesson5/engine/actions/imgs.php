<?php

require DOCROOT . '/engine/db.php';



$title = 'Каталог';

$data = dbGetAll('select * from imgs;');


$content = view('pages/imgs', ['imgs' => $data]);

require TPL_PATH . 'layout.php';
