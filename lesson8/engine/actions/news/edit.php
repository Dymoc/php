<?php

if(!array_get($_SESSION, 'user') || array_get($_SESSION['user'], 'login') !== 'test'){
	abort(405);
}

$validator = require DOCROOT .'/engine/validators/news.php';
$statusList = $newsModel['statusList'];
$title = 'Редактирование новости';
$item = $newsModel['find']($id = (int)array_get($_GET, 'id'));

if(!$item){
	abort(404);
}

if(array_get($item, 'img')){
	$item['img'] = '/uploads/img/' . $item['img'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$post = array_clean($_POST);

	$errors = $validator['validate']($post);

	if($errors){
		$content = view('forms/news.view',[
			'statusList' => $statusList,
			'errors' => $errors,
			'news' => $post
		]);

		return require TPL_PATH . 'layout.php';
	}

	if(array_get($_FILES, 'img')){
		$imageName = $newsModel['uploadImage']($_FILES['img'], '/img/');

		if($imageName) {
			$post['img'] = $imageName;
		}

	}

	$res = $newsModel['update']($id, $post);
	
	if($res) {
		header('Location: http://' . $_SERVER['HTTP_HOST']. '/news/');
	} else {
		$message = 'Что-то пошло не так!';
		return require TPL_PATH . 'pages/error.php';
	}
}



$content = view('forms/news.view',[
				'statusList' => $statusList,
				'news' => $item
			]);
return require TPL_PATH . 'layout.php';