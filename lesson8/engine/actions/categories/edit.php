<?php

$title = 'Редактирование категории';
$item = categoriesFind($id = (int)array_get($_GET, 'id'));

if(!$item){
	abort(404);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$post = array_clean($_POST);

	if(!array_get($post, 'name')){
		$content = view('forms/category.view',[
			'errors' => ['name' => 'Обязательно для заполнения'],
			'post' => $post
		]);

		return require TPL_PATH . 'layout.php';
	}

	$res = categoriesUpdate($id, $post);
	
	if($res) {
		header('Location: http://' . $_SERVER['HTTP_HOST']. '/categories/');
	} else {
		$message = 'Что-то пошло не так!';
		return require TPL_PATH . 'pages/error.php';
	}
}



$content = view('forms/category.view',['post' => $item]);
return require TPL_PATH . 'layout.php';