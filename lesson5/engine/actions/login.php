<?php
require DOCROOT . '/engine/db.php';
// echo "<pre>";
// var_dump($_SERVER);
// <script>alert(1)</script>
$title = 'Login';

$token = 'dsfhjksdfjksjgfdmlhgkjd';

$a = rand(1,10);
$b = rand(1,10);

$check =  md5($a + $b); 
$labelCheck = "Рассчитайте: $a + $b";

if(
	// array_get($_POST, 'login') && 
	array_get($_POST, 'check') &&
	array_get($_POST, 'check') === md5(array_get($_POST, 'check2')) 
){

	var_dump($_POST);
	die();

}


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
	'action' => '/login', 
	'labelCheck' => $labelCheck,
	'check' => $check
]);

require TPL_PATH . 'layout.php';