<?php


if(is_numeric(array_get($_GET, 'id'))){

	$item = categoriesFind((int)$_GET['id']);

	if(!$item){
		abort(404);
	}

	$content = view('pages/categories_item.view', $item);
	$title = '';
	return require TPL_PATH . 'layout.php';

}

$title = 'Категории';
$data = categoriesSearch();
$content = view('pages/categories.view', ['items' => $data]);

require TPL_PATH . 'layout.php';