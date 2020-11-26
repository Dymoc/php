<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
	abort(405);
}

require MODEL_PATH . 'categories.model.php';

$item = categoriesFind($id = (int)array_get($_GET, 'id'));

if(!$item){
	abort(404);
}

if(!categoriesUpdate($id, ['status' => CATEGORIES_STATUS_DELETED])){
	$message = 'Что-то пошло не так!';
	return require TPL_PATH . 'pages/error.php';
}

header('Location: http://' . $_SERVER['HTTP_HOST']. '/categories/');