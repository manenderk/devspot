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

	//AJAX for CSS & JavaScript Minifier
	$('#minify-resource').click(function(){
		var url='';
		if($("input[name='input-resource-type']:checked").val() == 'css')
			url= siteUrl + '/api/minify/css';
		else
			url= siteUrl + '/api/minify/js';
		
		var data = {
			unminified_resource : $('#input-resource').val().toString()
		}
		$.ajax({
			url: url,
			type: 'post',
			data: data,
			success: function(response){
				response= JSON.parse(response);
				$('#output-resource').val(response['minified_resource'])
				$('#minify-description').html('Original Size: ' + response['original_size']/1000 + 'KB' + "<br>" + 'Minified Size: ' + response['minified_size']/1000 + 'KB');
				$('#minify-description').show();
			}
		})
		
	})

	$('#copy-minified-resource').click(function(){
		$('#output-resource').select();
		document.execCommand("copy");
	})
})