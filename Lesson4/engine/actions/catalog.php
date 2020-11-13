<?php

$title = 'Catalog';
$post_file_path = '/post_file/';


$imgs = array_filter(scandir(IMG_PATH), function ($name) {
     return !in_array($name, ['..', '.']);
});

$imgsPath = array_map(function ($name) {
     return '/img/' . $name;
}, $imgs);

// $imgs = array_filter(scandir(IMG_PATH), fn ($name) => !in_array(($name), ['..', '.']));  // ------> не могу понять почему стрелочные не работают, ошибка синтаксиса
// $imgPath = array_map(fn ($name) => '/img/' . $name, $imgs);

require(TPL_PATH . './pages/catalog.php');
