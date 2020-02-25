function getFooterHeight(){
	return $('footer').height()+parseInt($('footer').css('bottom'))+parseInt($('footer').css('border-top-width'));
}



//Hide Download button in footer on Mobile
$.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
  
if($.browser.device){
	$('html').addClass('isMobile');

	//Move SUbnav
	if($('#subNav').length){
		if(!$('.selText').length){
			$('#subNav').prepend("<span></span>");
		}
		$('#content').prepend($('#subNav'));

		//move tertiary nav to subnav
		if($('.ps-subnav-ul').length){
			if($('.ps-subnav-ul .current_page_item').length){
			$('.ps-subnav-ul .current_page_item .children').insertAfter($('#subNav .current_page_item a'));
			}
			if($('.ps-subnav-ul .current_page_parent').length){
				$('.ps-subnav-ul .current_page_parent .children').insertAfter($('#subNav .current_page_parent a'));
			}
			
		}
		
		var selText= $('#subNav .current_page_item a').html();
		$('#subNav span').html(selText);

		//Set click functionality
		$('#subNav').click(function(){
			if($('#subNav.active').length){
				$('#subNav').removeClass('active');

			}
			else{
				$('#subNav').addClass('active');
			}
		});

	}

	

		/**************************************************/
		/*                   Mobile Nav
		/**************************************************/

		$('.isMobile .navigation-toggle').click(function() {

			if(!$('html.viewmenu').length){
				$('html').addClass('viewmenu');
			}
			else{
				$('html').removeClass('viewmenu')
			}

		});
}



/**************************************************/
/*
/* Uses Section (highlight Nav)
/*
/**************************************************/

if($('.single-use_types').length){

	$('#menu-item-20841').addClass('current-menu-item')
}


function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}