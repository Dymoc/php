<?php 

require DOCROOT . '/engine/db.php'; 

$statusList = [
	[
		'id' => 'draft',
		'name' => 'Черновик'
	],
	[
		'id' => 'active',
		'name' => 'Опубликован'
	]
];

// $id = (int)$_GET['id'];
// $id = (int)array_get($_GET, 'id');

// var_dump(is_numeric(123));

// var_dump((array)array_get($_GET, 'id'));

if(is_numeric(array_get($_GET, 'id')) && array_get($_GET, 'action') === 'edit'){

	$item = dbGetRow('select * from news where id = '. ($id = (int)$_GET['id'])  .';');

	// $var = array_get($item, 'test');
	// $var = isset($item['test']) ? $item['test'] : 123;

	if(!$item){
		abort(404);
	}

	// UPDATE `news` SET `title`=[value-2],`content`=[value-3],`status`=[value-5] WHERE `id`= $id

	$content = view('forms/news',[
				'statusList' => $statusList,
				'news' => $item
			]);

			return require TPL_PATH . 'layout.php';
			die;
}


if(is_numeric(array_get($_GET, 'id'))){

	$item = dbGetRow('select * from news where id = '. (int)$_GET['id']  .';');

	// $var = array_get($item, 'test');
	// $var = isset($item['test']) ? $item['test'] : 123;

	if(!$item){
		abort(404);
	}

	$content = view('pages/news_item', $item);

	return require TPL_PATH . 'layout.php';

}

if(array_get($_GET, 'action') === 'create'){


	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$post = [];

		foreach ($_POST as $key => $value) {
			$post[$key] = dbEscape($value);
		}

		$errors = [];

		$validateRules = [
			'title' => 'required',
			'content' => 'required',
			'status' => 'required',
		];

		foreach ($validateRules as $key => $value) {
			
			if(!array_get($post, $key)){
				$errors[$key] = 'Поле обязательно для заполнения';
			}

		}

		if($errors){
			$content = view('forms/news',[
				'statusList' => $statusList,
				'errors' => $errors,
				'news' => $post
			]);

			return require TPL_PATH . 'layout.php';
			die;
		}	

		
		$res = mysqli_query($connection, $query = "INSERT INTO news(title, content, status) 
			VALUES ('{$post['title']}', '{$post['content']}', '{$post['status']}');");


		if($res) {
			header('Location: http://' . $_SERVER['HTTP_HOST']. '/news/');
		} else {
			var_dump(mysqli_error($connection) , $query);
		}


	}


	$content = view('forms/news',[
		'statusList' => $statusList
	]);

	return require TPL_PATH . 'layout.php';

	die;

}



$title = 'Новости';

$data = dbGetAll('select * from news;');

$content = view('pages/news', ['news' => $data]);

require TPL_PATH . 'layout.php';
