$(function(){
	//Hide submenu in navigation bar
	var primaryHeaderMenuItem = $('ul.navbar-nav li.menu-item-has-children.nav-item a.nav-link');
	var primaryHeaderSubMenu = $('ul.navbar-nav li.menu-item-has-children.nav-item ul.sub-menu');
	var primaryHeaderSubMenuItem = $('ul.navbar-nav li.menu-item-has-children.nav-item ul.sub-menu li.menu-item a.nav-link');

	primaryHeaderMenuItem.click(function(){		
		var subMenu=$(this).siblings('ul.sub-menu');
		if(!subMenu.is(':visible'))
			primaryHeaderSubMenu.hide();
		subMenu.slideToggle('500');
		return false;
	});

	primaryHeaderSubMenuItem.click(function(){
		var url = $(this).attr('href');
		window.location=url;
	})

	$(window).scroll(function(){
		if(primaryHeaderSubMenu.is(":visible"))
			$(primaryHeaderSubMenu).hide();
	});

	//print current year in copyright
	$('#copyright-year').text(
		new Date().getFullYear()
	);

	//FOR CSS & JS MINIFIER
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

	//FOR COLOR CONVERTER
	$('#color-rgb-red, #color-rgb-green, #color-rgb-blue').keyup(function(){
		var red = $('#color-rgb-red').val();
		var green = $('#color-rgb-green').val();
		var blue = $('#color-rgb-blue').val();
		var hex = '';
		if( red != '' && green != '' && blue != '' ){
			hex = rgbToHex(parseInt(red), parseInt(green), parseInt(blue));
			$('#color-hex').val(hex);
		}		
		changeSampleColor(hex);
	})
	$('#color-hex').keyup(function(){
		var hex = $('#color-hex').val();
		if( hex != ''){
			var rgb = hexToRgb(hex);
			$('#color-rgb-red').val(rgb.r);
			$('#color-rgb-green').val(rgb.g);
			$('#color-rgb-blue').val(rgb.b);
		}
		changeSampleColor(hex);
	})
	function componentToHex(c) {
	    var hex = c.toString(16);
	    return hex.length == 1 ? "0" + hex : hex;
	}
	function rgbToHex(r, g, b) {
	    return componentToHex(r) + componentToHex(g) + componentToHex(b);
	}
	function changeSampleColor(color){
		$('.color-sample').css('background-color', '#'+color);
	}
	function hexToRgb(hex) {
	    var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
	    hex = hex.replace(shorthandRegex, function(m, r, g, b) {
	        return r + r + g + g + b + b;
	    });
	    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
	    return result ? {
	        r: parseInt(result[1], 16),
	        g: parseInt(result[2], 16),
	        b: parseInt(result[3], 16)
	    } : null;
	}

	//FOR ASPECT RATIO CALCULAR
	$('#dimension-w, #dimension-h').keyup(function(){
		var w = $('#dimension-w').val();
		var h = $('#dimension-h').val();
		if( w != '' && h != ''){
			var aRatio = calculateAspectRatio(parseInt(w), parseInt(h));
			$('#calculated-aspect-ratio').text(parseInt(w)/aRatio + ':' + parseInt(h)/aRatio);
		}
	})	
	function calculateAspectRatio(w, h){
		var factor = HCF(w,h);
		return factor;
	}
	function HCF(a, b){
		return (b == 0) ? a : HCF(b, a % b);
	}
})