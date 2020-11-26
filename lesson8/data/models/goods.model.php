<?php

const GOODS_STATUS_ACTIVE = 'active';
const GOODS_STATUS_DELETED = 'deleted';
const GOODS_TABLE = 'goods';
const GOODS_PRIMARY = 'id';
const GOODS_FILLABLE = ['name', 'status', 'created_at'];

function goodsSearch(array $filters = []): array {
	// , round(price*(1-sale/100), 2) as sales_price
	$sqlTpl = vsprintf(
		"select * 
		from %s where status != '%s' {conditions}", 
		[GOODS_TABLE, GOODS_STATUS_DELETED]
	);

	$conditions = [];

	if(($id = array_get($filters, 'id'))) {

		if(is_numeric($id)){
			$conditions[] = sprintf("id = %d", (int)$id);	
		}

		if(is_array($id)) {
			$arr = array_map(fn($it) => (int)$it, $id);
			$conditions[] = sprintf("id in(%s)", implode(',', $arr));
		}
	}

	if(is_numeric($cat_id = array_get($filters, 'category_id')) && $cat_id) {
		$conditions[] = sprintf("category_id = %d", (int)$cat_id);
	}

	if(array_get($filters, 'test')) {
		$conditions[] = "qty > 0";
	}
	// ... 

	$conditionRow = implode(' and ', $conditions);

	$sql = str_replace('{conditions}', $conditionRow ? 'and ' . $conditionRow : '', $sqlTpl);

	// dd($sql);

	return array_get($filters, 'isRow') ? dbGetRow($sql) : dbGetAll($sql);

}

function goodsFind(int $id): array {
	return goodsSearch(['id' => $id, 'isRow' => true]);
}

function goodsCreate(array $data): bool{

	$payload = array_only($data, GOODS_FILLABLE);

	$keys = implode(', ', array_keys($payload));
	$values = implode("', '", array_map(fn($val) => dbEscape($val), $payload));

	$query = vsprintf(
		"INSERT INTO %s (%s) VALUES ('%s');",
		[GOODS_TABLE, $keys, $values]
	);

	return (bool) dbQuery($query);
}

function goodsUpdate(int $id, array $data): bool{
	$payload = array_only($data, GOODS_FILLABLE);

	$set = [];

	foreach ($payload as $key => $value) {
		$set[] = "`$key` = '" . dbEscape($value) . "'";
	}

	if(!$set) {
		return true;
	}

	$query = vsprintf(
		"UPDATE %s set %s where %s = %d;", 
		[GOODS_TABLE, implode(', ', $set), GOODS_PRIMARY, $id]
	);

	return (bool) dbQuery($query);
}

/**
	join
	order by
	having
	group by
*/

function goodsCategories(): array {

	$sql = "select distinct category_id, categories.* from goods 
			left join categories on category_id = categories.id;";

	return dbGetAll($sql);
}
