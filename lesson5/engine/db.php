<?php

$dbConfig = require(DOCROOT . './config/database.php');

ob_start();

$connection = mysqli_connect(
	$dbConfig['host'], 
	$dbConfig['username'],
	$dbConfig['password'], 
	$dbConfig['db']
);

ob_end_clean();

if(!$connection){
	writeLog(mysqli_connect_errno() . ":" . mysqli_connect_error());
	print view('pages/error', ['message' => 'Нет соединения c БД!']);
	exit;
}

// $var = sprintf('test %d', 2);

// var_dump($var);



if(!function_exists('dbGetAll')) {

	function dbGetAll(string $sql): array {

		$connection = $GLOBALS['connection'];

		$res = mysqli_query($connection, $sql);

		if(!$res){
			writeLog(mysqli_error($connection) . ' in (' . $sql . ')');
			return [];
		}

		$data = [];

		while ($row = mysqli_fetch_assoc ($res)) {
			$data[] = $row;
		}

		return $data;
	}

}

if(!function_exists('dbGetRow')) {

	function dbGetRow(string $sql): array {

		$connection = $GLOBALS['connection'];

		$res = mysqli_query($connection, $sql);

		if(!$res){
			writeLog(mysqli_error($connection) . ' in (' . $sql . ')');
			return [];
		}

		$data = mysqli_fetch_assoc ($res);

		return $data ?: [];
	}

}

if(!function_exists('dbEscape')) {

	function dbEscape ($val){

		$connection = $GLOBALS['connection'];

		return mysqli_real_escape_string($connection, (string)htmlspecialchars(strip_tags($val)));
	}
}