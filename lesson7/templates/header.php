<header>
	<ul class="nav justify-content-center main-nav">
		<li class="nav-item">
		    <a class="nav-link active" href="/">Главная</a>
	  	</li>
	  	<li class="nav-item">
		    <a class="nav-link" href="/news">Новости</a>
	  	</li>
<!-- 	  	<li class="nav-item">
		    <a class="nav-link" href="/goods">Товары</a>
	  	</li> -->
	  	<li class="nav-item">
	  		<?php if(array_get($_SESSION, 'user')): ?>
  			<a class="nav-link" href="/logout">Выход</a>
  			<?php else: ?>
		    <a class="nav-link" href="/login">Вход</a>
			<?php endif; ?>
	  	</li>
	</ul>
	<hr class="mt-0">
	<div class="container-fluid">
		<h1><?= $title ?></h1>
	</div>
</header>