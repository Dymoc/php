(function(){
	// set active nav
	let action = '/' + (location.pathname.split('/').filter(it => it)[0] || '');
	$('.main-nav .active').removeClass('active');
	$(`.main-nav a[href="${action}"]`).addClass('active');


	// add basket
	$('.js-add-basket').on('click', function(){
		let id = $(this).data('id');
		$.post('/basket', {id}, function(res){
			$('#basket-count').text(res.count);
		}, 'json');
	});
	$('.js-remove-basket').on('click', function(){

		if(!confirm('Вы уверены?')){
			return;
		}

		let id = $(this).data('id');
		$.post('/basket', {id, action: 'rm'}, function(res){
			location.reload();
		}, 'json');
	});
}());

