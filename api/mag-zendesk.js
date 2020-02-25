//document.domain = "magplus.com";   //NOT IN USE?  //Zendesk will not let us autologin our loggedin users to zendesk
function ps_check_login(msg){
	if(msg && currentUser.id == null ){
		window.location.href = 'http://support.magplus.com/login';
	}
}


//
if( currentUser.tags && currentUser.tags.length > 0 ){
	var utagsLength = currentUser.tags.length,
		magI,
		isMagFree = false;
	for( magI = 0; magI < utagsLength; magI++ ){
		if(currentUser.tags[magI] == 'user'){
			isMagFree = true;
		}
	}
	if(!isMagFree){
		jQuery('#green .tab_requests, #green .tab_new').css('display', 'block');
	}
}


jQuery(document).ready(function($){
	$('#green .tab_forums').remove();
	$('#top-right a[href$="login"]')
		.addClass('mag-login-button')
		.text('Activate Full Access');

	if( typeof currentUser == "undifined" || currentUser.id == null ){
		$('#ticket-deflect').before('<h3 id="logged_out_not_found">Please <a href="/login">login</a> to search our entire knowledge base and access the Q&A - Support forum.</h3>');
	}
	
	
	
	$('h2, h3, p').each(function() { //Remove empty h2, h3 and p tags
		var $this = $(this);
		if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
		$this.remove();
	});
	
	if(currentUser.isAnonymous){
		$('#suggest_form').after($('.introductory_display_texts'));
		$('.introductory_display_texts').after($('.mag-login-button'));
	}else{
		$('.introductory_display_texts').remove();
	}
	$('#footer').prepend($('.cboxElement'));
	if(jQuery.trim(jQuery('#top-right').html()) === '|'){
		$('#top-right').remove();
	}
});