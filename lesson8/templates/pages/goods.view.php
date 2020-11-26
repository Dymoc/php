<a href="/basket" class="btn btn-default float-right">
	Корзина
 (<span id="basket-count"><?= count((array)array_get($_SESSION, 'basket')) ?></span>)
</a>
<ul class="nav nav-pills justify-content-center mb-3">
	<li class="nav-item">
	    <a class="nav-link <?= 0 === $currentCategory ? 'active' : ''?>" href="/goods/">Все</a>
	  </li>
	<?php foreach ($categories as $item): ?>
	  <li class="nav-item">
	    <a class="nav-link <?= (int)$item['id'] === $currentCategory ? 'active' : ''?>" href="/goods/?category_id=<?= $item['id'] ?>"><?= $item['name'] ?></a>
	  </li>
  	<?php endforeach; ?>
</ul>
<div class="row row-cols-1 row-cols-md-2">
	<?php foreach ($items as $item): ?>
  	<div class="col mb-4 col-6">
		<div class="card" style="width: 18rem; margin: 0 auto;">
		  <img src="/uploads/goods/<?= $item['main_img'] ?>" class="card-img-top" alt="<?= $item['name'] ?>">
		  <?php if($item['sale']): ?>
		  <div class="badge badge-danger sale-percent"><b><?= $item['sale'] ?></b>%</div>
		  <?php endif; ?>
		  <div class="card-body">
		    <h5 class="card-title"><?= $item['name'] ?></h5>
		    <?php if($item['sale']): ?>
		    <p>
		    	<strike class="text-danger mr-2">
		    		<b class="text-secondary">
		    			<?= number_format($item['price'], 2, '.', ' ') ?>
	    			</b>
	    		</strike>
	    		<span class="badge badge-danger"><?= number_format($item['price'] * (1 - $item['sale'] / 100), 2, '.', ' ') ?></span>
	    	</p>
		    <p></p>
		    <?php else: ?>
	    	<p><?= number_format($item['price'], 2, '.', ' ') ?></p>
	    	<?php endif; ?>
		    <p class="card-text"><?= $item['description'] ?></p>
		    <button class="btn btn-info js-add-basket" data-id="<?= $item['id'] ?>">Купить</button>
		  </div>
		</div>
	</div>
	<?php endforeach; ?>
</div>