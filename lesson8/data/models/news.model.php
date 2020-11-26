<?php 

const NEWS_STATUS_DRAFT = 'draft';
const NEWS_STATUS_ACTIVE = 'active';
const NEWS_STATUS_DELETED = 'deleted';

$newsModel = [
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

$newsModel['find'] = function(int $id) use($newsModel): array{
	return $newsModel['search'](
		[
			$newsModel['primary'] => $id, 
			'isRow' => true
		]
	);
};

$newsModel['create'] = function(array $data) use($newsModel) : bool {

	$payload = array_only($data, $newsModel['fillable']);

	$keys = implode(', ', array_keys($payload));
	$values = implode("', '", array_map(fn($val) => dbEscape($val), $payload));

	return (bool)dbQuery("INSERT INTO {$newsModel['table']} ($keys) VALUES ('$values');");
};

$newsModel['update'] = function(int $id, array $data) use($newsModel) : bool {

	$payload = array_only($data, $newsModel['fillable']);

	$set = [];

	foreach ($payload as $key => $value) {
		$set[] = "`$key` = '" . dbEscape($value) . "'";
	}

	if(!$set) {
		return true;
	}

	return (bool)dbQuery("UPDATE {$newsModel['table']}  set ". implode(', ', $set) ." where {$newsModel['primary']} = $id;");
};

$newsModel['uploadImage'] = function(array $img, string $path) : string {

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

return $newsModel;