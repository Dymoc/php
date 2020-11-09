<?php

$title = 'Catalog';
$post_file_path = (ACTIONS_PATH . 'post_file.php');


$imgs = array_filter(scandir(IMG_PATH), 'validArray');

function validArray($name)
{
     return !in_array($name, ['..', '.']);
}

require(TPL_PATH . './pages/catalog.php');
