<?php


if(is_numeric(array_get($_GET, 'id'))){

	$item = goodsFind((int)$_GET['id']);

	if(!$item){
		abort(404);
	}

	$content = view('pages/categories_item.view', $item);
	$title = '';
	return require TPL_PATH . 'layout.php';

}

$title = 'Товары';
$data = goodsSearch(array_clean($_GET));

if(isAjax()){
	echo json_encode($data);
	return;
}

$content = view('pages/goods.view', [
	'items' => $data,
	'categories' => goodsCategories(),
	'currentCategory' => (int)array_get($_GET, 'category_id')
]);

require TPL_PATH . 'layout.php';