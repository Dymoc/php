<?php

$validator = require DOCROOT .'/engine/validators/register.php';
$post = $errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$post = array_clean($_POST);

	$errors = $validator['validate']($post);

	if(!$errors){
		
		$res = dbQuery("INSERT INTO `users`(`login`, `password`, `email`) 
			VALUES ('". dbEscape($post['login']) ."', '". password_hash($post['password'], PASSWORD_BCRYPT) ."','". dbEscape($post['email']) ."');");

		if(!$res) {
			var_dump('Error');
			die;
		}

		header('Location: http://' . $_SERVER['HTTP_HOST']. '/login/');
	}

}

$title = 'Регистрация';
$content = view('forms/register.view', ['post' => $post, 'errors' => $errors]);
require TPL_PATH . 'layout.php';