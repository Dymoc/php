<?php

$title = 'Catalog';
$img_dir = scandir(IMG_PATH);
$post_file_path = (ACTIONS_PATH . 'post_file.php');


$imgs = array_filter($img_dir, 'validArray');

function validArray($name)
{
     return !in_array($name, ['..', '.']);
}

require(TPL_PATH . './pages/catalog.php');
