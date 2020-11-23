(function(){
	// set active nav
	let action = '/' + (location.pathname.split('/').filter(it => it)[0] || '');
	$('.main-nav .active').removeClass('active');
	$(`.main-nav a[href="${action}"]`).addClass('active');

}());

