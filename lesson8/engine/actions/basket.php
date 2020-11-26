<?php

// $arr['test'][]['test1'] = 123;
// $arr['test'][0]['test2'] = 321;
// // $arr['test'][]['test2'] = 321;

// dd($arr);

// $_SESSION['basket'] = [];

// пустая
// добавление - вернуть кол-во

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	if(array_get($_POST, 'action') === 'order') {


		if(!array_get($_SESSION, 'user')){
			header('Location: http://' . $_SERVER['HTTP_HOST']. '/login/?back=/basket/');
		}

		// dd($_POST);

		$orderId = ordersCreate([
			'user_id' => $_SESSION['user']['id'], 
			'amount' => 0
		]);



		die;
	}


	if (is_numeric(array_get($_POST, 'id'))) {

		if(array_get($_POST, 'action') === 'rm'){

			// dd($_SESSION['basket']);
			$_SESSION['basket'] = array_filter($_SESSION['basket'], function($id){
				return (int)$id !== (int)$_POST['id'];
			});

			if(isAjax()){
				echo json_encode(['count'=> count($_SESSION['basket'])]);
				return;
			}

			header('Location: http://' . $_SERVER['HTTP_HOST']. '/basket/');
		}


		$_SESSION['basket'][] = (int)$_POST['id'];

		if(isAjax()){
			echo json_encode(['count'=> count($_SESSION['basket'])]);
			return;
		}

		header('Location: http://' . $_SERVER['HTTP_HOST']. '/goods/');
	}



}


$basket = (array)array_get($_SESSION, 'basket');

$data = $basket ?  goodsSearch(['id' => $basket]) : [];

foreach ($data as $key => $item) {
	$data[$key]['added'] = count(array_filter($basket, fn($el) => (int)$el === (int)$item['id']));
}

$content = view('pages/basket.view', [
	'items' => $data,
]);

require TPL_PATH . 'layout.php';