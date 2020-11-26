
<?php if(!$items): ?>	
	<div class="alert alert-info">Корзина пуста</div>
<?php else:?>
<form method="post" action="/basket/">
	<input type="hidden" name="action" value="order">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>name</th>
				<th>price</th>
				<th>Qty</th>
				<th>sale</th>
				<th>amount</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $totalAmount = 0; ?>
			<?php foreach ($items as $item): ?>		

			<tr>
				<td><?= $item['id'] ?> <input type="hidden" name="id[<?= $item['id'] ?>]" value="<?= $item['id'] ?>"></td>
				<td><?= $item['name'] ?></td>
				<td><?= $item['price'] ?></td>
				<td><input type="text" class="form-control" name="qty[<?= $item['id'] ?>]" value="<?= $item['added'] ?>"></td>
				<!-- рассчетная скидка в валюте -->
				<td><i class="js-sale" data-sale="<?= $item['sale'] ?>">0</i></td>
				<!-- итоговая сумма по позиции -->
				<td><i class="js-amount"><?= $amount = $item['price'] *  $item['added'] ?></i></td>
				<td><button type="button" data-id="<?= $item['id'] ?>" class="btn btn-sm btn-danger js-remove-basket">x</button></td>
			</tr>
			<?php $totalAmount += $amount; ?>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th><i class="js-sale-total">0</i></th>
				<th><i class="js-amount-total"><?= $totalAmount  ?></i></th>
				<th></th>
			</tr>
		</tfoot>
	</table>

	<button type="submit" class="btn btn-success">Оформить заказ</button>

</form>
<?php endif;?>