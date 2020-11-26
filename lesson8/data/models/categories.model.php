<?php

const CATEGORIES_STATUS_ACTIVE = 'active';
const CATEGORIES_STATUS_DELETED = 'deleted';
const CATEGORIES_TABLE = 'categories';
const CATEGORIES_PRIMARY = 'id';
const CATEGORIES_FILLABLE = ['name', 'status', 'created_at'];

function categoriesSearch(array $filters = []): array {

	$sqlTpl = vsprintf(
		"select * from %s where status != '%s' {conditions}", 
		[CATEGORIES_TABLE, CATEGORIES_STATUS_DELETED]
	);

	$conditions = [];

	if(is_numeric($id = array_get($filters, 'id'))) {
		$conditions[] = sprintf("id = %d", (int)$id);
	}

	$conditionRow = implode(' and ', $conditions);

	$sql = str_replace('{conditions}', $conditionRow ? 'and ' . $conditionRow : '', $sqlTpl);

	// dd($sql);

	return array_get($filters, 'isRow') ? dbGetRow($sql) : dbGetAll($sql);

}

function categoriesFind(int $id): array {
	return categoriesSearch(['id' => $id, 'isRow' => true]);
}

function categoriesCreate(array $data): bool{

	$payload = array_only($data, CATEGORIES_FILLABLE);

	$keys = implode(', ', array_keys($payload));
	$values = implode("', '", array_map(fn($val) => dbEscape($val), $payload));

	$query = vsprintf(
		"INSERT INTO %s (%s) VALUES ('%s');",
		[CATEGORIES_TABLE, $keys, $values]
	);

	return (bool) dbQuery($query);
}

function categoriesUpdate(int $id, array $data): bool{
	$payload = array_only($data, CATEGORIES_FILLABLE);

	$set = [];

	foreach ($payload as $key => $value) {
		$set[] = "`$key` = '" . dbEscape($value) . "'";
	}

	if(!$set) {
		return true;
	}

	$query = vsprintf(
		"UPDATE %s set %s where %s = %d;", 
		[CATEGORIES_TABLE, implode(', ', $set), CATEGORIES_PRIMARY, $id]
	);

	return (bool) dbQuery($query);
}