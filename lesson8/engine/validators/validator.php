<?php


$validator = [
	'ruleTypes' => [
		'required' => function(array $data, string $field) :bool {
			return (bool) array_get($data, $field);
		},
		'email' => function(array $data, string $field) :bool {
			return (bool) filter_var(array_get($data, $field), FILTER_VALIDATE_EMAIL);
		}
	],
	'ruleMessages' => [
		'required' => 'Поле обязательно для заполнения',
		'email' => 'Поле должно содержать электронную почту',
	],
	'rules' => []
];

if(!function_exists('validateByRule')) {

	function validateByRule(array $data, string $key, callable $execRule, string $errMsg = null){

		$errMsg = $errMsg ?: 'Ошибка валидации';

		return $execRule($data, $key) ? null : $errMsg;
	}
}

$validator['validate'] = function(array $data) : array {

	$errors = [];

	$currentValidator = array_get($GLOBALS, 'currentValidator', []);

	$rules = (array)array_get($currentValidator, 'rules');
	$ruleTypes = (array)array_get($currentValidator, 'ruleTypes');
	$ruleMessages = (array)array_get($currentValidator, 'ruleMessages');

	foreach ($rules as $key => $rule) {
		
		if(is_array($rule)){

			foreach ($rule as $ruleItem) {

				$ruleCallback = is_callable($ruleItem) ? $ruleItem : array_get($ruleTypes, $ruleItem);

				if(!is_callable($ruleCallback)){
					throw new Exception("Rule for key '$key' must be callable!");
				}

				$err = validateByRule($data, $key, $ruleCallback , (string) array_get($ruleMessages, $ruleItem));
				if($err) {
					$errors[$key][] = $err;	
				}
				
			}


		} else {

			$ruleCallback = is_callable($rule) ? $rule : array_get($ruleTypes, $rule);

			if(!is_callable($ruleCallback)){
				throw new Exception("Rule for key '$key' must be callable!");
				
			}


			$err = validateByRule($data, $key, $ruleCallback, (string) array_get($ruleMessages, $rule));

			if($err) {
				$errors[$key][] = $err;	
			}
		}

	}

	return $errors;
};

return $validator;