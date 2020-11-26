<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
	abort(405);
}

$item = $newsModel['find']($id = (int)array_get($_GET, 'id'));

if(!$item || $item['status'] === NEWS_STATUS_DELETED){
	abort(404);
}

if(!$newsModel['update']($id, ['status' => NEWS_STATUS_DELETED])){
	$message = 'Что-то пошло не так!';
	return require TPL_PATH . 'pages/error.php';
}

header('Location: http://' . $_SERVER['HTTP_HOST']. '/news/');