<?php

const orders_STATUS_ACTIVE = 'active';
const orders_STATUS_DELETED = 'deleted';
const orders_TABLE = 'orders';
const orders_PRIMARY = 'id';
const orders_FILLABLE = ['user_id', 'user_comment', 'amount', 'status', 'created_at', 'updated_at'];

function ordersSearch(array $filters = []): array {

	$sqlTpl = vsprintf(
		"select * from %s where status != '%s' {conditions}", 
		[orders_TABLE, orders_STATUS_DELETED]
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

function ordersFind(int $id): array {
	return ordersSearch(['id' => $id, 'isRow' => true]);
}

function ordersCreate(array $data): int{

	$payload = array_only($data, orders_FILLABLE);

	$keys = implode(', ', array_keys($payload));
	$values = implode("', '", array_map(fn($val) => dbEscape($val), $payload));

	$query = vsprintf(
		"INSERT INTO %s (%s) VALUES ('%s');",
		[orders_TABLE, $keys, $values]
	);

	return dbQueryInsert($query);
}

function ordersUpdate(int $id, array $data): bool{
	$payload = array_only($data, orders_FILLABLE);

	$set = [];

	foreach ($payload as $key => $value) {
		$set[] = "`$key` = '" . dbEscape($value) . "'";
	}

	if(!$set) {
		return true;
	}

	$query = vsprintf(
		"UPDATE %s set %s where %s = %d;", 
		[orders_TABLE, implode(', ', $set), orders_PRIMARY, $id]
	);

	return (bool) dbQuery($query);
}

function ordersAddGood(int $order_id, int $good_id){

	$good = goodsFind($good_id);


	$payload = [
		'order_id' => $order_id,
		'good_id' => $good_id
		// ...
	];

	$keys = implode(', ', array_keys($payload));
	$values = implode("', '", array_map(fn($val) => dbEscape($val), $payload));

	$query = vsprintf(
		"INSERT INTO %s (%s) VALUES ('%s');",
		['order_items', $keys, $values]
	);

	return dbQuery($query);
}