$(function(){
	//Hide submenu in navigation bar
	var primaryHeaderMenuItem=$('ul.navbar-nav li.menu-item-has-children.nav-item a.nav-link');
	var primaryHeaderSubMenu=$('ul.navbar-nav li.menu-item-has-children.nav-item ul.sub-menu');

	primaryHeaderMenuItem.click(function(){		
		var subMenu=$(this).siblings('ul.sub-menu');
		if(!subMenu.is(':visible'))
			primaryHeaderSubMenu.hide();
		subMenu.slideToggle('500');
		return false;
	});

	$(window).scroll(function(){
		if(primaryHeaderSubMenu.is(":visible"))
			$(primaryHeaderSubMenu).hide();
	});

	//print current year in copyright
	$('#copyright-year').text(
		new Date().getFullYear()
	);
})