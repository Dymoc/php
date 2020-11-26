<?php 

$currentValidator = [
	'rules' => [
		'title' => 'required',
		'content' => 'required',
		'status' => 'required',
	],
];

// $currentValidator['validate'] = 123;

$currentValidator['validate'] = function(array $data) use($currentValidator) : array {

	$errors = [];

	foreach ($currentValidator['rules'] as $key => $value) {
		
		if(!array_get($data, $key)){
			$errors[$key] = 'Поле обязательно для заполнения';
		}

	}

	return $errors;
};

return $currentValidator;