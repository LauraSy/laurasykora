
jQuery(document).ready(function(){

	var
		_window = jQuery(window)
	;	

	_window.on("resize", function(){
		resizeFunction();
		heroBlock();
	})
	resizeFunction();
	heroBlock();

	function resizeFunction(){
		var
			newWidth = _window.width()
		,	marginHalf = _window.width()/-2;
		;
		if (jQuery('body').hasClass('cherry-fixed-layout')) {
			var
				newWidth = jQuery('.main-holder').width()
			,	marginHalf =jQuery('.main-holder').width()/-2;
			;	
		}

		jQuery('.wide').css({width: newWidth, "margin-left": marginHalf, left: '50%'});
	}
    

	jQuery('.sf-menu>li>a, a.btn').each(function(){
		$(this).attr("data-hover", $(this).text());
	});

	jQuery('a.btn').append(jQuery('<span></span>'));

	// setTimeout(onSlideLoaded, 500);

	function heroBlock(){
		var
			menuHeight = $('.stuck_wrapper').height();
			newHeight = _window.height()-menuHeight;
		;	

		if ($('html').hasClass('desktop')) {
			$('.parallax-slider').css('height', newHeight);
		}
	}
});

