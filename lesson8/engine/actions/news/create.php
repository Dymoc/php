<?php 

if(!array_get($_SESSION, 'user')){
	abort(405);
}

$validator = require DOCROOT .'/engine/validators/news.php';
$statusList = $newsModel['statusList'];
$title = 'Добавление новости';

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


	$res = $newsModel['create']($post);
	
	if($res) {
		header('Location: http://' . $_SERVER['HTTP_HOST']. '/news/');
	} else {
		$message = 'Что-то пошло не так!';
		return require TPL_PATH . 'pages/error.php';
	}


}

$content = view('forms/news.view',[
	'statusList' => $statusList
]);

return require TPL_PATH . 'layout.php';

