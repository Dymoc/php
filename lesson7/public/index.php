<?php 

define('DOCROOT', __DIR__ . '/../');
define('TPL_PATH', DOCROOT . 'templates/');
define('MODEL_PATH', DOCROOT . 'data/models/');
define('UPLOAD_PATH', __DIR__ . '/uploads/');

require DOCROOT . '/engine/helpers/helper.php';
require DOCROOT . '/engine/db.php'; 

session_set_cookie_params(60 * 60 * 24, '/', array_get($_SERVER, 'HTTP_HOST'), false, true);
session_start();

// setcookie();

if(array_get($_COOKIE, 'auth_key')) {

	$user = dbGetRow(sprintf("select * from users where auth_key = '%s'", dbEscape($_COOKIE['auth_key'])));	

	if($user) {
		$_SESSION['user'] = $user;
	}
}

$title = 'My app';

// $content = require(DOCROOT . '/config/database.php');

// var_dump($content);
// die;

// $content = require(TPL_PATH . 'form.php');
// require('./log.txt');
// require(TPL_PATH . 'layout.php');


// echo "<pre>";
// var_dump($_SERVER['REQUEST_URI']);
// die;
// $config = require(DOCROOT . '/config/database.php');
// var_dump(__DIR__, DOCROOT, DIRECTORY_SEPARATOR);

// /news/edit?id=2&action=edit
// ['/news/edit', 'id=2&action=edit']
// '/news/edit'
// ['', 'news' ... ]
// [1 => 'news',  3 => 'edit']
// ['news',  'edit']
$uriArr = array_values(array_filter(explode('/', explode('?',$_SERVER['REQUEST_URI'])[0]) , fn($it) => boolval($it))) ;


$currentAction = array_get($uriArr, 0, 'home');

// DOCROOT .'engine/actions/news'
$actionPath = DOCROOT .'engine/actions/'. $currentAction;

if(is_dir($actionPath)) {

	$fileName = array_get($uriArr, 1, $currentAction);
	// DOCROOT .'engine/actions/news/edit'
	$actionPath .= '/' . $fileName;
}

$filePath = $actionPath .'.php';

// var_dump($filePath);

if(!file_exists($filePath)){
	abort(404);
}

require($filePath);