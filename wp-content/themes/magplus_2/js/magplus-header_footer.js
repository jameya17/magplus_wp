
//console.log('mag header footer scripts');
var setMoreInfoClick;
var focusSet;
var footerBarHeight;


//Update Nav state on Cached pages
function setNavState(){

	if(readCookie('mp_loggedin') == '1'){
		$('nav .login').remove();
		$('nav .signup').remove();
	}
	else{
		$('nav .mymag').remove();
		$('nav .logout').remove();
	}

	$('.auth-nav').css('display','block');
}
setNavState();


function checkFooter(reset){
	var buttonHover;
	var slideInFooter;

	//if($(window).height()>700){

	if($('footer.static').length>0){
		$('footer.static').removeClass('static');
		
	}
	if($('.showCarousel').length || $('.home.page').length){
		$('.holder.content').css('padding-bottom',footerBarHeight);
	}
	else{
		$('body').css('padding-bottom',footerBarHeight);
	}
	
	if(!setMoreInfoClick || reset){
		setMoreInfoClick = true;
	
		$('footer .more-info').click(function() {
				//console.log('click footer');
				if(!focusSet){
					//console.log('add focus');
					focusSet=true;
					//console.log($('footer').length);
					$('footer').addClass('focus');
				}
				else{
					focusSet=false;
					$('footer').removeClass('focus');
				}
		});
	}

	$('footer').mouseleave(function() {
		focusSet=false;
		$(this).removeClass('focus');
		clearTimeout(slideInFooter);
	});
}

$('.more-links ul.links').click(function() {
		if(!$(this).hasClass('expand')){
			$(this).addClass('expand');
		}
		else{
			$(this).removeClass('expand');
		}
	});
//For mobile

//For mobile

if($('#primaryNav .menu-item-has-children').length){

	$('#primaryNav .menu-item-has-children').click(function(){
		if($('#primaryNav .menu-item-has-children.hover').length){
		}
		else{
			$(this).addClass('hover');
			//alert('addhover');
			setTimeout(function(){ $('#primaryNav .menu-item-has-children.hover').removeClass('hover'); $('#primaryNav').click(); $('#primaryNav .menu-item-has-children').trigger('mouseout'); }, 4000);
		}
		
	});
	

}

/**************************************************/
/*
/* Mantle Footer and Header 
/*
/**************************************************/
//console.log('SET DFAULTS');
var imgW;
var imgH;
var ratio;
footerBarHeight = getFooterHeight();
var minHeight = parseInt($('.mantle').css('min-height'));
//console.log("footerBarHeight= "+footerBarHeight);
var borders = (parseInt($('.mantle').css('border-top-width'))*2);
//console.log('end defaults');

$('footer .buttons .download').click(function() {
	gqloc =window.location.pathname;
	_gaq.push(['_trackEvent', 'Footer Buttons', "Download", gqloc ] );
});
$('footer .buttons .contact').click(function() {
	gqloc =window.location.pathname;
	_gaq.push(['_trackEvent', 'Footer Buttons', "Contact Us", gqloc] );
});

//* Disable Resources link in Main Nav

$('#header_wrap header #main-menu.menu .menu-item-has-children > a').click(function(){
	return false;

});

//* add Arrow on subnav 

if($('#header_wrap #subNav').length || $('#header_wrap .carcl-nav').length){

	$('#main-menu').addClass('delta');

}

checkFooter();

	// Header Logic
	var oldScroll=0;

	$(window).scroll(function(event){
			var carouselH = $('body.view .features .carousel').height();
			var isFeatures = $('.view .features').length;
			var magHeader =$('#header_wrap').height();
			var scrollTheshold = ($('#header_wrap').height()+carouselH)* isFeatures;
			
			if(!$('#header_wrap').hasClass('ignore') && !$.browser.device){

					if($(window).scrollTop()<$('#header_wrap').height()){
						if(!$('#header_wrap').hasClass('show')){
							makeKenetic();
							hideHeader();
						}

						else{
							if($(window).scrollTop()<=1){
								makeKenetic();
								hideHeader();
							}
						}
					}
					
					else{
						
						makeStatic();

						if($(window).scrollTop()<oldScroll){
							showHeader();
						}
						else{
							hideHeader();
						}

						
					}
			
				if($(window).scrollTop()<1){
					$('#header_wrap').removeClass('ease');
				}

		}
			
		oldScroll=$(window).scrollTop();
	});



	function showHeader(){
		if(!$('#header_wrap.ease').length){
			$('#header_wrap').addClass('ease');
		}
					$('#header_wrap').addClass('show');
	}

	function hideHeader(){
		$('#header_wrap').removeClass('show');
	}

	function makeStatic(){
		$('#header_wrap').addClass('static');
		$('body > .container').css('margin-top',$('#header_wrap').height());
	}

	function makeKenetic(){
		$('#header_wrap').removeClass('static');
		$('body > .container').css('margin-top',0);
	}


	var mantle = '.home .mantle, .home .infoGraphic, .home .companies-using';
	var mantleBg = '.home .mantle .bg-image, .home .bgimage';

	$( window ).resize(function() {
		//console.log(arguments.callee.caller.toString()+ ' RESIZE= '+ratio);

		if($(mantle).length){
				if(!ratio){
					initMantle();
				}
			else{
				if(getFooterHeight()){
				footerBarHeight= getFooterHeight();
				}
				else{
					footerBarHeight=0;
				}

				var newHeight;

				if(!$.browser.device){
					newHeight = ($(window).height()-$('#header_wrap').height()-parseInt(footerBarHeight))-borders;
				}
				else{
					newHeight = $(window).height();
					//console.log('newHeight='+newHeight+" "+$(window).height())
				}
				//console.log('resize manatle= '+parseInt(footerBarHeight));

				//There is a min height to the mantle. IE can't see min height. This is the work around
				if(newHeight<minHeight){
					newHeight=minHeight;
				}
				$('.home .mantle').css('height',newHeight);
				if(!$.browser.device){
					$('.home .infoGraphic, .home .companies-using').css('height',newHeight+$('#header_wrap').height());
				}
				else{
					$('.home .infoGraphic, .home .companies-using').css('height',newHeight);
					//console.log('newHeight='+newHeight+" "+$(window).height())
				}




				mantleRatio = ($(mantle).height()*100)/$(mantle).width();
				//console.log('ratio = '+ratio+' mantleRatio= '+mantleRatio);
				if(mantleRatio<ratio ){
					$(mantleBg).addClass('wide');
					$(mantleBg).removeClass('tall');
				}
				else{
					$(mantleBg).removeClass('wide');
					$(mantleBg).addClass('tall');

				}

				if($(mantle).css('opacity')==0){
					$(mantle).css('opacity',1);
				}
			}
			
		}

		checkFooter();
		
	})

	function initMantle(){

	   		imgW = $(mantleBg).width();
			imgH = $(mantleBg).height();
			ratio =(imgH*100)/imgW;
			//console.log('inti mantle= '+imgW+"  "+imgH);
			$( window ).resize();

			showbg=setTimeout(function(){
	    		$('.bgimage').css('opacity',1);
      			clearTimeout(showbg);
     		},500);
		}
	
	if($(mantle).length){
		//console.log('has mantle');
		$(mantleBg).on('load',function() {
			//console.log('iMAGE IS LOADED');
			initMantle();
	    });
	    showMantle=setTimeout(function(){
	    	$(mantle).css('opacity',1);

	    	$( window ).resize();
      		clearTimeout(showMantle);
     	},1000);
	    
	}
	else{
		$( window ).resize();
	}	





