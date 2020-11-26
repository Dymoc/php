<?php

// echo "<pre>";
// var_dump($_SERVER);
// <script>alert(1)</script>

$title = 'Вход';
$back = array_get($_GET, 'back', '/');
// dd($_COOKIE);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$post = array_clean($_POST);

	if(!array_get($post, 'login') || !array_get($post, 'password')){
		$errorMsg = 'Необходимо передать логин и пароль';
		$content = view('forms/login', [
			'action' => '/login', 
			'errorMsg' => $errorMsg
		]);

		return require TPL_PATH . 'layout.php';
	}

	$user = dbGetRow(sprintf("select * from users where login = '%s'", dbEscape($post['login'])));

	// var_dump(dbEscape($post['password']), password_hash($post['password'], PASSWORD_BCRYPT, ['salt' => 'dsff2311']), $user['password']);

	if(!$user || !password_verify( dbEscape($post['password']) , $user['password'] )  ){
		$content = view('forms/login', [
			'action' => '/login', 
			'errorMsg' => 'Такой комбинации логин и пароль нет.'
		]);

		return require TPL_PATH . 'layout.php';
	}

	$_SESSION['user'] = $user;

	// if(($back = array_get($_GET, 'back'))){
	// 	header('Location: http://' . $_SERVER['HTTP_HOST']. $back);
	// } else {
	// 	header('Location: http://' . $_SERVER['HTTP_HOST']. '/');
	// }

	header('Location: http://' . $_SERVER['HTTP_HOST']. $back);
}


// $pass = 'mypass';
// $hash = password_hash($pass, PASSWORD_BCRYPT);
// var_dump(password_verify ( $pass , $hash ) );

// $token = 'dsfhjksdfjksjgfdmlhgkjd';

// $a = rand(1,10);
// $b = rand(1,10);

// $check =  md5($a + $b); 
// $labelCheck = "Рассчитайте: $a + $b";

// if(
// 	// array_get($_POST, 'login') && 
// 	array_get($_POST, 'check') &&
// 	array_get($_POST, 'check') === md5(array_get($_POST, 'check2')) 
// ){

// 	var_dump($_POST);
// 	die();

// }


// if(isset($_POST['login']) && array_get('csrf_token') === $token){
// 	// http_request_method_name(method);

// 	// var_dump($_POST);

// 	$post = [];

// 	foreach ($_POST as $key => $value) {
// 		$post[$key] = mysqli_real_escape_string($connection, $value);
// 		// $post[$key] = htmlspecialchars($value, ENT_QUOTES);
// 		// $post[$key] = strip_tags($value);
// 	}

// 	$content = view('forms/login', $post);
// 	require TPL_PATH . 'layout.php';
// 	die();
// }

$content = view('forms/login', [
	'action' => '/login/?back=' . $back, 
]);

require TPL_PATH . 'layout.php';