
//	console.log('load page functions');
	/*
	 * Default variables
	 */

	 if($('.home.page.page-id-21').length){
	 	carousel1= new $.magcarousel('.carousel',{bottomPadding:100,navOffset:1});

	 	$('.carcl-slides').swipe({
			swipeLeft:function(event, direction, distance, duration, fingerCount) {
				$('.carousel a.next').click();
			},
			swipeRight:function(event, direction, distance, duration, fingerCount) {
				$('.carousel  a.back').click();
			}
		});
	 }

	 if($('.addthis_toolbox').length){
			
 		addthis.init();	
  		addthis.toolbox('.addthis_toolbox');

	 }

	 if($('.comparisonChart').length){
		var oldli;

		$('.comparisonChart li h5').click(function(e){

			e.preventDefault();
			var indexNum = $(this).closest('ul').index()+''+$(this).parent().index();
		
			$('.comparisonChart ul').removeClass('on');
			$('.comparisonChart ul li').removeClass('on');
			
			if(oldli !== indexNum ){
				$(this).parent().addClass('on');
				$(this).closest('ul').addClass('on');
				oldli = indexNum;
			}
			else{
				oldli=false;
			}	
		});

		$('.comparisonChart li h5').each(function(){
			var bars = '<em class="included"></em>'
			$(this).parent().prepend(bars);
		})
	
	}


	var $window = $(window),
		$document = $(document);

	$('.mag-customselect').selectToAutocomplete();

	$('#show_search').click(function(){
		$('#searchform').toggleClass('hidden');
		$('#s').focus();
		return false;
	});

	$('.signup-user-type').change(function(){
		$('.signup-type').addClass('hidden');
		$('.signup-'+ $(this).val()).removeClass('hidden');
	});

	$('.expand-row, .expand-next').click(function(){
		if($(this).hasClass('more-link')){
			$(this)
			.toggleClass('t-desc-open')
			.closest('table')
			.next().stop(true, true).slideToggle(400);
		}else{
			$(this)
			.toggleClass('t-desc-open')
			.find('.t-description').stop(true, true).slideToggle(200);
		}
	});
	$('.t-description').click(function(){ return false; });

	$('#resend_magplus_activation_email').click(function(){
		$.ajax({
			url: psVar.ajaxurl,
			type: 'post',
			data: 'action=resend_activation_mail',
			success: function(msg){
				
			}
		});
		return false;
	});


	if($('.single-clients').length){

		$('#subNav li a').click(function(event) {
			event.preventDefault();
			var link;
			if($(this).attr('data-taxname')){
				link = '/clients/?filter='+$(this).attr('data-taxname');
			}
			else{
				link = '/clients/';
			}
			window.location.href= link;
			loadMoreClients();
		});
						
		$('#subNav li a').click(function(event) {
			event.preventDefault();
			var link;
			if($(this).attr('data-taxname')){
				link = '/clients/?filter='+$(this).attr('data-taxname');
			}
			else{
				link = '/clients/';
			}
			window.location.href= link;
			loadMoreClients();
		});
	}

	/**
	 * Make the buy buttons follow with down on scroll
	 */
	$('.black-box-placeholder').css({height: $('.black-box-placeholder').height() +'px'});
	if($('.black-box .primary-button:first').length > 0){
		var window_top,
			buttons_pos = $('.black-box .primary-button:first').offset(),
			is_under = false;
		$window.scroll(function(){
			window_top = $document.scrollTop();

			if(window_top > buttons_pos.top){
				if(!is_under){
					$('.black-box-wrap').addClass('block-fixed');
					is_under = true;
				}
			}else{
				if(is_under){
					$('.black-box-wrap').removeClass('block-fixed');
					is_under = false;
				}
			}

		});
	}


	// add tracking to normal links and buttons
	$('.ps-analytics').click(function(){
		var title  = $(this).attr('title');
		_gaq.push(['_trackEvent', 'CustomTracking', title]);
	});

	// track social links
	$('.social-link').click(function(){
		var alt  = $(this).find('img').attr('alt');
		_gaq.push(['_trackEvent', 'socialLinks', alt]);
	});


	/**************************************************/
	/*
	/* Share
	/*
	/**************************************************/
	/**
	 * Create a share popup when clicking on a social media button
	 */
	$('.social-link').click(function(){
		var $this = $(this);
		var windowOptions = 'scrollbars=yes,resizable=yes,toolbar=no,location=yes',
			widthDefault = 750,
			heightDefault = 550,
			height = $this.attr('data-height'),
			width = $this.attr('data-width'),
			winHeight = screen.height,
			winWidth = screen.width,
		    left = Math.round((winWidth / 2) - (width / 2)),
			top = 0;
		// Put the position of the popup in the middle
		if (winHeight > height) { top = Math.round((winHeight / 2) - (height / 2)); }
		// If height/width is to small or none set the default
		if(width < 100){ width = widthDefault; }
		if(height < 100){ height = heightDefault; }
		//window.open($(this).attr('href'), 'socialWindow', windowOptions +',width=' + width +',height='+ height +',left='+ left +',top='+ top);
		return false;
	});
	// Share links (dialogs)
	$(document).delegate('.facebook-share', 'click', function(){
		var $this = $(this),
			name = $this.attr('data-name'),
			link = $this.attr('href'),
			picture = $this.attr('data-picture'),
			caption = $this.attr('data-caption'),
			description = $this.attr('data-description'),
			track = $this.attr('data-track');
		FB.ui({
			method: 'feed',
			name: name,
			link: link,
			picture: picture,
			caption: caption,
			description: description
		}, function(response) {
			if (response && response.post_id) {
				_gaq.push(['_trackEvent', 'mag-custom', track]);
			} else {
				//alert('Post was not published.');
			}
		});
		return false;
	});



$('.what-is-tour-wrap a.secondary-button ').click(function() {

	_gaq.push(['_trackEvent', 'Video', "Play", "Mag+ Tour"] );
	});


	// footer links
	// disable some of the links in the footer
	$('#footer_nav').find('.disable-link > a').click(__return_false());


	/* Show by href
	------------------------------------*/
	$('.open-by-href').click(function(){
		$($(this).attr('href')).removeClass('hidden');
		return false;
	});



	/**************************************************/
	/*
	/* Colorbox - popup - dialogs
	/*
	/**************************************************/
	// ---   Colorbox   ---
	// regular colorbox
	$('.colorbox').colorbox();
	// iframe colorbox
	$('.colorbox-inline, .colorbox-inline-menu a').colorbox({
		inline:true,
		href: $(this).attr('href')
	});
	// sales area button
	$('.colorbox-iframe').colorbox({
		iframe:true,
		width: '100%',
		height: '100%',
		maxWidth: 900,
		maxHeight: 506
	});

	// popup
	$('.open-window').click(function(){
		var width = 600,
			height = 600,
			winHeight = screen.height,
			winWidth = screen.width,
		    left = Math.round((winWidth / 2) - (width / 2)),
			top = Math.round((winHeight / 2) - (height / 2)),
			extra = $(this).attr('data-param');

		window.open($(this).attr('href')+extra, 'magup', 'scrollbars=yes,resizable=yes,toolbar=no,location=yes,width='+ width +
			',height='+ height +',left='+ left +',top='+ top);
		return false;
	});



	/**************************************************/
	/*
	/* Size contact form iFrames to content inside
	/*
	/**************************************************/
	if($('.frame-cf').length>0){

			 $('.frame-cf').load(function(){
    			$('.frame-cf').height($(".frame-cf").contents().find("body").height()+20);
    			$('.salesforce-loading-form').remove();
    		});
  		}





	/**************************************************/
	/*
	/* Buy Mag+
	/*
	/**************************************************/

  	var iW;
  	var iH;
  	var scrlg;

	if($.browser.device){
		iW = screen.width - 15;
  		iH = screen.height - 15;
  		scrlg = true;

	}
	else{
		iW = 820;
  		iH = 480;
  		scrlg = false;
	}
	$('.buy-form-button').colorbox({
		iframe: true,
		innerWidth:iW, 
		innerHeight:iH,
		scrolling:scrlg,
		onComplete:function(){
			sizeIframe()
		}
	});

	function sizeIframe(){

		if(!$('.page-id-3270 #colorbox iframe').length){
			checkForLoad=setTimeout(function(){
				sizeIframe()
			},1000);
		}
		else{	
		
			if($('.page-id-3270').length>0){
			 	$('.page-id-3270 #colorbox iframe').load(function(){
    				var cboxheight = $(".page-id-3270 #colorbox iframe").contents().find("body").height()+20;
    				$.colorbox.resize({width:$('#colorbox').width , height:cboxheight})
    			});
			}
			clearTimeout(checkForLoad);
		}

		}
	/* Buy Mag+ */
	var magplus_buy_loading = (function(){
			var status = 'no';
			return function( check ){
				check = check || false;
				if(check) return (status == 'no') ? false : true;
				if( status != 'no' ){
					status = 'no';
					$('#buy_loader').hide();
				}else{
					status = 'yes';
					$('#buy_loader').show();
				}
			}
		})();

	/* 
	Logic to open Sales force form confirmation window in popup.
	A cookie is passed that coorisponds to the button pressed
	*/

	if($('#content.pricing').length){
		$('.buy-form-button').click( function() {
			var buytype=$(this).attr('data-id');
			document.cookie ='buytype='+buytype.toLowerCase()+'; ;path=/salesforce-buy-form-thanks';
			document.cookie ='buytype='+buytype.toLowerCase()+'; ;path=/salesforce-buy-form';
			$('#sf_Lead_Event_Origin__c').val("Buy "+buytype);
			
		});
	}

	if($('.isMobile .pricing-mobile-nav').length){
		$('.pricing-mobile-nav li').click(function(){
			
			$('.pricing-mobile-nav li').removeClass('on');
			$('.package').removeClass('on');

			$(this).addClass('on');
			$('.package.'+$(this).attr('data-pkg')).addClass('on');
		});

	}

/*
	function getCookie(cname){
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++){
		  var c = ca[i].trim();
		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
		  }
	}
	*/
	

	$("#buy_form-sf").submit(function(e){
    var form = $(this);
    $.ajax({ 
         success: function(response){
            alert(response); // do what you like with the response
         }
    });
    return false;
 	});

	

	/* end pop-up logic */
	
	$('#buy_form').submit( function() {
		$('#sf_Lead_Event_Origin__c').val("Buy Form: "+$.trim($('#product_to_buy').val()));

		// if loading
		if( magplus_buy_loading(true) ) return false;
		magplus_buy_loading();

		// validate eula
		if( !$('#buy_eula_accept').is(':checked') ){
			alert('You must accept "Mag+ end user license agreement" by checking the box.');
			magplus_buy_loading();
			return false;
		}
		var $this = $(this);
		$.ajax({
			url: psVar.ajaxurl,
			type: 'post',
			data: $(this).serialize() +'&action=buy_magplus_form',
			success: function(msg){
				if( msg.success ){
					var prod = $.trim($('#product_to_buy').val());
					if(msg.mail){
						_gaq.push(['_trackPageview', '/buy/success/'+ prod]);
						
						$this.html(msg.msg);
						$.colorbox.resize();
                                                
						$('#cboxContent').append('<iframe src="/features-price/salesforce-buy-form-thanks-'+prod+'" style="display:none"></iframe>');
						//$('#cboxContent').append('<iframe src="/features-price/order-confirmation/?='+prod'" style="display:none"></iframe>');
					}else{
						// something went worng sending the mail
						alert('There were an error sending the mail try again or contact sales@magplus.com');
					}
				}else{
					alert("Please correct these errors: \n"+ msg.errors.join(", \n"));
				}

				magplus_buy_loading();
			},
			error: function(){
				alert('There was an error.');
				magplus_buy_loading();
			}
		});
		return false;
	});




/**************************************************/
	/*
	/* Contact Us Form Button (Scroll to)
	/*
	/**************************************************/

	$('#contact-btn.primary-button').click(function(evt){
		evt.preventDefault();
		var offset = $('.anchor-form').offset();
		$("html, body").animate({ scrollTop: offset.top}, 300);

	})



	/*   equal height   */
	var eqHeightBiggest = 0;
	$('.eq-height').each(function(){
		if($(this).height() > eqHeightBiggest){
			eqHeightBiggest = $(this).height();
		}
	});
	if(eqHeightBiggest > 0){
		$('.eq-height').css('height', eqHeightBiggest +'px');
	}



	/**
	 *  Tool tips
	 */
	// my Mag+ big boxes
	if($('.mag-icon-link').length){

		$('.mag-icon-link').magbubble();
		// Feature & price Buy
		$('.f-row:not(.f-row-title) .tooltip-text').closest('.f-row').magbubble({
			top: 10,
			delay: 400,
			forceEnd: true
		});

		$('.fp-row .tooltip-text').closest('.fp-relative').magbubble({
			top: 0,
			delay: 400,
			forceEnd: true
		});


		$('.remove-x').click(function(){
			$(this).closest('.remove-me').remove();
		});
	}



	/**************************************************/
	/*
	/* Chatengage module : Cusotm Hide and Show func
	/*
	/**************************************************/
	setTimeout(function(){ 

		if($("#SnapABug_Button").length){
			//console.log('button exists');
					

				$("#SnapABug_Button").click(function(e){
					$(this).addClass('active');
					_gaq.push(['_trackEvent', 'Online Chat', 'Clicked']);
				})


				setInterval(function(){ 

					if(!$("#SnapABug_CBMBtn").length && $("#SnapABug_Button.active").length){
						$("#SnapABug_Button").removeClass('active');

					}

				 }, 2000);

			
		}
		
	}, 2000);



	/**************************************************/
	/*
	/* Blog Landing Page Select Menu "Go" button
	/*
	/**************************************************/

	if($('.blog-tag-list').length){

		$('.blog-tag-list .btn-go').click(function(){
			var val = $('#subjectTag').val();
			if(val != "#"){
				//alert("/"+$('#subjectTag').val());
				location.href="/"+$('#subjectTag').val();
			}
		});

	};







/**************************************************/
/*
/* Signup & download forms
/*
/**************************************************/
var MagPlus = {
	signup: function(result){
		if (result.status == 'success') {

			pingBing('New User');//defined in footer

			var data = {
					user: result.user,
					user_type: $('input[name="user_type"]:checked').val(),
					where: $('.register-new-form-where').val(),
					browser_lang: window.navigator.language || navigator.browserLanguage || '',
					action: 'ps_signed_up_user'
				};
			// save the user info
			jQuery.ajax({
				url: psVar.ajaxurl,
				data: data,
				type: 'POST'
			});
			// timeout the redirect to give a short time to send the post above
			setTimeout(function(){ window.location.href = result.redirect_to; }, 300);

		}else{
			var $form = jQuery('.magplus-signup');
			// hide the loader
			$form.find('.form-loader').hide();
			$form.find('.ps-container-error').removeClass('ps-container-error');
			for (var key in result.errors) {
				$form.find('input[name="registration['+ key +']"]')
					.parent()
					.addClass('ps-container-error')
					.find('.ps-error')
					.html(result.errors[key].join(', '));
			}
		}
	}
}




  /* Signup form */
	$('#magplus_signup').submit(function(e) {
		e.preventDefault();
		var $this = $(this);
		var theSourceURL = $this.find($('#Daddy_Analytics_WebForm_URL')).attr('value');
		if (theSourceURL.length > 255) {
			var newSourceURL = theSourceURL.slice(-254);
			$this.find($('#Daddy_Analytics_WebForm_URL')).attr('value', newSourceURL);
		}
		$loader = $this.find('.form-loader');
		// if end user licence agreement isn't accepted
		if (!$this.find('.accept-terms').is(':checked')) {
			alert('You need to verify that you have read & understood the End User License Agreement by checking the box.');
		} else {
			// email adresses not allowed by mailchimp
			var not_allowed = ['admin', 'abuse', 'postmaster', 'noc', 'root', 'security', 'spam', 'sysadmin', 'compliance', 'registrar'];
			// prevent not allowed emails
			var $email_input = $this.find('.registration-email'),
				mail_prefix = $email_input.val().split('@')[0];
			if (not_allowed.indexOf(mail_prefix) >= 0) {
				$email_input
					.parent()
					.addClass('ps-container-error')
					.find('.ps-error')
					.html('Do not use any of these addresses: admin@, abuse@, postmaster@, noc@, root@, security@, spam@, sysadmin@, compliance@, registrar@');
				return false;
			}
			$loader.show();
			$.ajax({
				url: ($this.attr('action') + '.js'),
				dataType: 'jsonp',
				jsonpCallback: 'MagPlus.signup',
				data: $this.serialize()
			});
		}
		return false;
	});



/* Download form
**************************************************/


	var $download_form = $('.magplus-download');
	if($download_form.length){

		// pre select OS
		var OS = 'Win';

		if (navigator.appVersion.indexOf("Mac")!=-1) OS = "MacOS";
		$download_form.find('input[name="os"][value="'+ OS +'"]').attr('checked', 'checked');

		$download_form.submit(function(){
			var os = $("input[name='os']:checked").val();
			var cs_version = $("input[name='cs_version']:checked").val();

			if( !(os === undefined) && !(cs_version === undefined) ){
				if(os == 'Win'){
					var extension = 'zip';
				}else{
					var extension = 'dmg';
				}
				window.open('https://download.magplus.com/index.php?cs='+cs_version+'&extension='+ extension,"_blank");
				window.location = "/my-magplus/installation/?downloaded=true";
			}else{
				alert('You have to choose Adobe CS version and operating system');
			}
			

			
			_gaq.push(['_trackEvent', 'Tool Downloads v '+readCookie('mg_browser'), cs_version, os] );
			return false
		});
	}



