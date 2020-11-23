<?php 

const NEWS_STATUS_DRAFT = 'draft';
const NEWS_STATUS_ACTIVE = 'active';
const NEWS_STATUS_DELETED = 'deleted';

$currentModel = [
	'primary' => 'id',
	'table' => 'news',
	'fillable' => ['title', 'content', 'status', 'img'],
	'statusList' => [
		[
			'id' => NEWS_STATUS_DRAFT,
			'name' => 'Черновик'
		],
		[
			'id' => NEWS_STATUS_ACTIVE,
			'name' => 'Опубликован'
		]
	],
	'search' => function(array $filters = []){
		$sqlTpl = "select * from news where status != 'deleted' {conditions}";

		$conditions = [];

		if(is_numeric($id = array_get($filters, 'id'))) {
			$conditions[] = sprintf("id = %d", (int)$id);
		}

		if(($status = array_get($filters, 'status'))){
			$conditions[] = sprintf("status = '%s'", dbEscape($status));
		}

		$conditionRow = implode(' and ', $conditions);

		$sql = str_replace('{conditions}', $conditionRow ? 'and ' . $conditionRow : '', $sqlTpl);

		// dd($sql);

		return array_get($filters, 'isRow') ? dbGetRow($sql) : dbGetAll($sql);
	}
];

$currentModel['find'] = function(int $id) use($currentModel): array{
	return $currentModel['search'](
		[
			$currentModel['primary'] => $id, 
			'isRow' => true
		]
	);
};

$currentModel['create'] = function(array $data) use($currentModel) : bool {

	$payload = array_only($data, $currentModel['fillable']);

	$keys = implode(', ', array_keys($payload));
	$values = implode("', '", array_map(fn($val) => dbEscape($val), $payload));

	return (bool)dbQuery("INSERT INTO {$currentModel['table']} ($keys) VALUES ('$values');");
};

$currentModel['update'] = function(int $id, array $data) use($currentModel) : bool {

	$payload = array_only($data, $currentModel['fillable']);

	$set = [];

	foreach ($payload as $key => $value) {
		$set[] = "`$key` = '" . dbEscape($value) . "'";
	}

	if(!$set) {
		return true;
	}

	return (bool)dbQuery("UPDATE {$currentModel['table']}  set ". implode(', ', $set) ." where {$currentModel['primary']} = $id;");
};

$currentModel['uploadImage'] = function(array $img, string $path) : string {

	if(array_get($img, 'error') !== UPLOAD_ERR_OK){
		writeLog('Can\'t upload image: ' . json_encode($img));
		return '';
	}

	$verify = getimagesize($img["tmp_name"]);

    $pattern = "/^image\/\w+/i";

    if(!preg_match($pattern, $verify['mime'])){
    	writeLog('Only image files are allowed!');
		return '';
    }

    $name = basename($img["name"]);
    if(move_uploaded_file($img["tmp_name"], UPLOAD_PATH . $path . $name)){
    	return $name;
    }

    return '';
};

return $currentModel;