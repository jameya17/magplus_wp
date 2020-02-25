$('#loader').height($(window).height());

carousel = function() {
	
	var winheight; //Window Height minus the height of the header
	var holderOffset; //The height of the subpage content used to reposition the scroll
	var slideId; //The Page ID of associated slide in the carousel
	var containerName; // The name of the div for the page. Based of off page's post_name
	var isSubPage; //Determine whether or not the page loading is a subpage or not. This value helps detemine the scroll pos
	$('#header_wrap').append($('.carcl-nav'));
	var headerOffset = $('#header_wrap').height(); // The number deducted from the Holder winheight
	var setupSite; // Has the site fully initialized
	var listenForScrolling; //Dont detect scroll if scroll is animating
	var animScrolling; //variable for the speed of scrolling the browser 
	var oldSlideLink; //variable to test whether the browser history should be updated
	var loadAllPages = true; // Load all the subpages automatically?
	var popState = false; //Check to see if page state is being set by the browser buttons
	var cycle = 0; // used in output to keep track of number of page setting script cycles been run 
	var browserContainer = (jQuery.browser.webkit ? "body" : "html");
	var localHostName = location.protocol + "//" + location.hostname // Used to strip out domain from SlideLink when updating url during scrolling, and add to url's during pushState
	var scrollTo; //The sroll position of the window;
	var scrollPos;

	//order top nav so li indexes line up with slideshow order


/* ///////////////////////////////////////////////////////////////////////
                			  Initialize Site
/////////////////////////////////////////////////////////////////////// */
	init = function() {

		$(window).ready(function() {
			 //outputToLog('init');
			//Make sure nav displays in an order coorsiponding to the slideshow.
			carousel1 = new $.magcarousel('.carousel', {
				bottomPadding: 100
			});
			// "View More" Ajax call to load page
			//Features Nav Clicks
			$('.carcl-slides li a').click(function() {
				 //outputToLog('clicked carcl-slides');
				loadPage();
				return false
			})

			$('.overview a.primary-button').click(function() {
				// outputToLog('h3 index= ' + $(this).attr('data-link'));
				$('.carcl-nav li:eq(' + $(this).attr('data-link') + ')').click();
				return false
			})

			/* ------- Functions triggered on Resize ------- */
			$(window).resize(function() {
				// outputToLog('resize');

				var marg = 59;
				// Is the footer locked on window or below the content
				if ($('footer.static').length) {
					marg = 0;
				}

				winheight = $(window).height() - (headerOffset + marg);

				$('#loader').height($(window).height());

				// Resize the containers apropriately to the height of the window \

				$('.holder > div.on').css('min-height', winheight);
				$('.mantle').css('height', winheight);

				//Reposition scroll as necessary
				if ($('.carousel.view').length) {
					// outputToLog('reposition scroll');
					if (($(browserContainer).scrollTop() + $(browserContainer).scrollTop()) > ($('.carousel').height() / 2)) {
						// outputToLog('reposition scroll to subsection');
						holderOffset = $('.holder').offset();
						$(window).scrollTop(holderOffset.top - headerOffset);
					}
				}


/* ///////////////////////////////////////////////////////////////////////
			           Set up Initial State of Site
/////////////////////////////////////////////////////////////////////// */
				if (!setupSite) {
					// outputToLog('not setup');
					winLoc = location.href;
					var foundURL;

					$('.carcl-nav li a').each(function() {
						if ($(this).attr('href') == winLoc) {
							foundURL = true;
							
							$(this).parent().click();
						}
					})

					if (!foundURL) {
						popState = true;
						$('.carcl-nav li:eq(0)').click();
					}

				}
			});

			$(window).resize();
		});


/* ///////////////////////////////////////////////////////////////////////
                      		Detect Window Scrolling & Update URL
/////////////////////////////////////////////////////////////////////// */

		$(window).scroll(function() {
			scrollPos = $(window).scrollTop();
		//	outputToLog('scroll pos= '+(scrollPos < oldScrollPos)+(" "+scrollPos+" "+ oldScrollPos+" "));
		//	outputToLog('scroll pos= '+(scrollPos < oldScrollPos)+(" "+scrollPos+" "+ oldScrollPos+" "));
			//outputToLog('listenForScrolling= '+listenForScrolling);
			
			if ((scrollPos > (winheight / 2)) && !isSubPage && listenForScrolling) {
		//		 outputToLog('slidelink not subpage ' + slideLink);
				//	outputToLog('Chnage URL from scroll 1');
				 changeURL(containerName, slideLink, slideId, 0);
				

			}

			else if ((scrollPos < (winheight / 2)) && isSubPage && listenForScrolling ) {
		//		 outputToLog('set to main  scroll top is= ' + $(browserContainer).scrollTop() + '  winheight/2 is ' + (winheight / 2));
				//outputToLog('Chnage URL from scroll 2');
				changeURL('', '/product-features/', '22179', 0);
			}

			headerMargin = (winheight - $(window).scrollTop());



			var ignoreHeader = (Math.abs(headerMargin) <= headerOffset && headerMargin <= 0);
			//// outputToLog(ignoreHeader+"   "+Math.abs(headerMargin)+"  "+ headerOffset);


			if (ignoreHeader) {
				if (!$('#header_wrap.ignore').length) {
					$('#header_wrap').addClass('show').addClass('ignore');
				}
				$('#header_wrap').css('margin-top', headerMargin);
			} else {
				if ($('#header_wrap.ignore').length) {
					// outputToLog('remove show');
					$('#header_wrap').removeClass('ignore');
					$('#header_wrap').css('margin-top', 0);

					//If scroll is beyond - header height
					if (Math.abs(headerMargin) > headerOffset) {
						$('#header_wrap').removeClass('show')
					}
				}
			}
			
		});

	}


/* ///////////////////////////////////////////////////////////////////////
	                  Load Carousel with AJAX is on a Subpage
/////////////////////////////////////////////////////////////////////// */
	if ($('.showCarousel .carousel').length) {
		if (loadAllPages) {
			autoLoadPages();
		} else {
			init();
		}
		amntLoaded(1);
	} else {
		loadCarouselWithAjax();
		amntLoaded();
	}


/* ///////////////////////////////////////////////////////////////////////
	                 Feature Navigation & Arrows
/////////////////////////////////////////////////////////////////////// */

	//Update URL and set load page variable when clicking nav or arrows
	$('.carcl-nav li, .btns').click(function() {
		// outputToLog('clicked nav ');
		var el = $(this);

		if ($(el).hasClass('next')) {
			//// outputToLog('has class next');
			el = $('.carcl-nav ul li:eq(' + ($('.carcl-slides .on').index() + 1) + ')');
		}
		if ($(el).hasClass('back')) {
			el = $('.carcl-nav ul li:eq(' + ($('.carcl-slides .on').index() - 1) + ')');
		}

		el = $(el).find('a');

		$('.holder > div').removeClass('on');
		$('.holder > div').removeAttr('style');
		$('body').removeClass('view');

		slideId = $(el).attr('data-id');
		slideLink = $(el).attr('href');

		// outputToLog('slideLink= ' + slideLink);
		// outputToLog('has hostnam= ' + slideLink.indexOf(localHostName));

		if (slideLink.indexOf(localHostName) > -1) {
			// outputToLog('spliting domain from URL');
			slideLink = slideLink.split(localHostName);
			slideLink = slideLink[1];
			// outputToLog('url = ' + slideLink);

		}

		containerName = $('.carcl-slides li:eq(' + $(el).parent().index() + ')').attr('class');
		// outputToLog('containerName= ' + containerName);

		if (containerName) {
			var getName = containerName.split(" ");

			if (getName[0]) {
				containerName = getName[0]
			}
		}


		/* ---------------- If initializing and on subpage load it ------------ */
		/* ---------------- If loading for Popstate check if a subpage is being loaded------------ */
		
		// outputToLog('path= ' + window.location.pathname + " this index= " + $(this).index());

		if (((window.location.pathname !== '/product-features/' && window.location.pathname != '/product-features')) && !setupSite) {
			// outputToLog('window.location.pathname= ' + window.location.pathname);
			$('.carcl-slides li:eq(' + $(this).index() + ') a').click();
		} else {
			// outputToLog('Not REG or Popped URL');
			//Any other click on the nav will set URL to the root
			//outputToLog('Change URL from scroll from nav click');
			changeURL('', '/product-features/', '22179', 1);
		}

	});


/* ///////////////////////////////////////////////////////////////////////
                        Create Browser History
/////////////////////////////////////////////////////////////////////// */
	function changeURL(containerName, slideLink, slideId, animScroll) {
		animScrolling = animScroll;
		// outputToLog('change URL = ' + containerName + ' slideid= ' + slideId + ' slideLink= ' + slideLink);
		//// outputToLog('changeURL= '+containerName+'  '+slideLink+'  '+slideId);
		baseTitle = ' Digital Publishing Features - Content Curation Platform, Content Publishing Solutions | mag+';

		if (!containerName || containerName == "overview" || containerName == "") {
			pTitle = baseTitle;
		}

		//Check if subpage to determine if pag should scroll
		splitSlideLink = slideLink.split('product-features/');
		// outputToLog('splitSlideLink = ' + splitSlideLink[1]);
		if (splitSlideLink[1]) {
			isSubPage = 1;
		} else {
			isSubPage = 0;
		}

		if (containerName.indexOf(baseTitle) < 0 && containerName.length) {
			var subPageTitle = $('.carcl-nav ul .on a').html();
			if (subPageTitle == 'Overview') {
				subPageTitle = 'All Features';
			}
			pTitle = baseTitle + " - " + subPageTitle;
		}

		if (!slideLink) {
			//	slideLink= '/';
		}

		document.title = pTitle;

		//Store page history data
		// outputToLog('slideLink = ' + slideLink + ' oldSlideLink= ' + oldSlideLink + ' popState= ' + popState);

		if ((slideLink !== oldSlideLink) && !popState) {
			// outputToLog('update history'+(slideLink !== oldSlideLink)+" "+ popState);
			// outputToLog('pushState= '+localHostName + slideLink);
			if (history.pushState) {
				window.history.pushState({
					"section": 'Features',
					"pTitle": pTitle,
					"pUrl": localHostName + slideLink,
					"pID": slideId
				}, 'features', slideLink);
			}

			_gaq.push(['_trackPageview', slideLink]);

		}
		//outputToLog('updateStates from chnage URL');
		updateStates();

		oldSlideLink = slideLink;
	}



/* ///////////////////////////////////////////////////////////////////////
                      Set site when using browser buttons
/////////////////////////////////////////////////////////////////////// */
	window.onpopstate = function(e) {

		/* If used correctly, this function should treat the site as if the page is being loaded for the first time*/

	//	outputToLog('popstate to ' + e.state.pTitle);

		setupSite = false;

		//Update Browser with history data
		if (e.state && history.pushState) {
			document.title = e.state.pTitle;

			//Find Main nav item with the same url as in the history and click it
			var foundURL;

			$('.carcl-nav li a').each(function() {
				//outputToLog('popstste= ' + $(this).attr('href') + ' =  ' + e.state.pUrl)
				if ($(this).attr('href') == e.state.pUrl) {
				//	outputToLog('url found= ' + $(this).attr('href') + '  pURL=' + e.state.pUrl);
					popState = 'subpage';
					foundURL = true;
					$(this).parent().click();
				}

			});



			if (!foundURL) {
			//	outputToLog('popstate is Product Features');
				popState = 'true';
				$('.carcl-nav li:eq(0)').click();
			}
			

		}
	}


/* ///////////////////////////////////////////////////////////////////////
                   				 Ajax Loader
/////////////////////////////////////////////////////////////////////// */

	loadPage = function() {
		// outputToLog('load page= '.containerName);
		if ($('.holder.content .' + containerName).length || (containerName == 'feature')) {
			// outputToLog(containerName + ' content already Loaded');
			//outputToLog('Change URL loadpage');
			changeURL(containerName, slideLink, slideId, 1);
		} else {
			//Show loader
			// outputToLog('making Ajax Call');
			showLoader();

			$.get('/feature?id=' + slideId, function(data) {
				//outputToLog('making Ajax respsoned');
				addPage(data);
			});

			function addPage(results) {

				results = results;
				$('.holder.content').append('<div class="' + containerName + '"><div class="shadow-wrapper"></div></div>');
				$('.holder.content .' + containerName + ' .shadow-wrapper').append(results);
				//Hide loader
				$('#loader').css('display', 'none');
				$('#loader').removeClass('fadeIn');
				//outputToLog('added page');
				changeURL(containerName, slideLink, slideId, 1);


			}
		}
	}


/* ///////////////////////////////////////////////////////////////////////
                   			 Update Page States
/////////////////////////////////////////////////////////////////////// */
	updateStates = function() {
		// outputToLog('update States');

		if (!$('body.view').length) {
			$('body').addClass('view');
		}

		holderOffset = $('.holder').offset();
		// outputToLog("holderOffset.top-headerOffset= " + (holderOffset.top + "  " + headerOffset));

		$('.holder > div').removeClass('on');
		$('.holder > div').removeAttr('style');
		// outputToLog('turn on ' + containerName);

		$('.holder .' + containerName).addClass('on');

		$('.holder > div.on').css('min-height', winheight + 100);
		//outputToLog('scroll to= ' + holderOffset.top + ' ' + '  ' + headerOffset + '  ' + isSubPage);

	

	/* ///////////////////////// Set speed and transition animation ////////////////////////////*/

		listenForScrolling = false;

		scrollTo = (holderOffset.top - headerOffset) * isSubPage;

		var speed = 500;
		animatedScroll = function(){
			
			if ((!setupSite && isSubPage) || popState || !animScrolling) {
				speed = 200; //no delay causes a conflict in scrolltop detection 
			}
	

			$(browserContainer).animate({
				scrollTop: scrollTo
			}, speed, function() {
				setPage(speed);
			});
		}



	/* ///////////////////////// Determin scrollin scenerio ////////////////////////////*/
		if(animScrolling && !popState){
			animatedScroll()
		}

		else if(popState){
			//timeout give the page time to animate the scc transitions so height of hte page can be detected
			setTimeout(function(){ animatedScroll()}, 800)
		}
		
		else{
			setPage(speed);
		}
			

	/* ///////////////////////// Reset page variables ////////////////////////////*/
		function setPage(timerSpeed){
		
			//outputToLog('pageset scrollTop;= '+$(window).scrollTop());

			animScrolling = false;

			if (!setupSite) {
				setupSite = true;
				hideLoader();
			}
		
			if(!scrollPos){
				//this won't be et on in initial load and the scrolling nees it to be for url change to work
				scrollPos = $(window).scrollTop();
			}
			
			//outputToLog('popstates = '+popState);
			popState =  false;
			
			//Delay listening for scroll. IMportant when scrolling between carousel and subpage
			setTimeout(function(){ listenForScrolling = true;}, timerSpeed*2);	

			cycle++;
	
			//outputToLog('++++++++++++++++++++++++ Cycle : ' + cycle + ' ++++++++++++++++++++++++++++');

		}
	}

} // end of carousel function

var loadDisplay; //Interval for Loading screen
amntLoaded = function(fast) {

	incrm = 1
	if (fast) {
		incrm = 20;
	}

	count = 1;

	loadDisplay = setInterval(function() {
		if (count * incrm < 101 && pg !== 'features') {
			$('#loader em').html("Loading " + (count * incrm) + "%");
			count++
		}

	}, 30);

}



stopAmntLoaded = function() {
	clearInterval(loadDisplay);
}


hideLoader = function() {
	if (loadDisplay) {
		stopAmntLoaded();
	}
	$('#loader').css('display', 'none');
	$('#loader').removeClass('fadeIn');
	$('#loader em').html("Loading ...");

}

showLoader = function() {
	$('#loader').css('display', 'block');
	setTimeout(function() {
		$('#loader').addClass('fadeIn');
	}, 100);


}

/* ///////////////////////////////////////////////////////////////////////
                    Auto Load all the pages option 
/////////////////////////////////////////////////////////////////////// */
autoLoadPages = function() {
	// outputToLog('autoload pages');
	var itemCount = $('.carcl-nav ul li').length;
	var count = 0;
	//var loadseperate <?= $_GET[loadseperate] ? '=='.true : false ?> ; //If for some reason pages need to be loaded sperately directly form WP instead of from the cache


	//load each subpage seperately from Wordpress (Old Way)
	if (loadseperate) {
		$('.carcl-nav ul li').each(function() {

			var slideId = $(this).find('a').attr('data-id');

			var containerName = $('.carcl-slides li:eq(' + $(this).index() + ')').attr('class');
			// outputToLog('containerName= ' + containerName);

			if (!$('.holder.content .' + containerName).length) {
				$.get('/feature?id=' + slideId, function(data) {
					addPage(data);
				});

				function addPage(results) {
					count++;

					results = results;
					$('.holder.content').append('<div class="' + containerName + '"><div class="shadow-wrapper"></div></div>');
					$('.holder.content .' + containerName + ' .shadow-wrapper').append(results);

					//Intialize site after all the sections == the amount of nav items
					if ($('.holder.content >div').length >= $('.carcl-nav ul li').length) {
						// outputToLog('init' + " " + $('.carcl-nav ul li').length + " " + $('.holder.content >div').length);
						
						init();
					}
				}
			}

		});
	}
	//Load all sub sections from Cache (New Way)
	else {
		// outputToLog('get from cache');
		//console.log('/feature-cache = '+uncache);
		$.get('/feature-cache'+uncache, function(data) {
			addPage(data);
		});

		function addPage(results) {
			//outputToLog('got results');
			count++;

			if(pg =='features'){
				hideLoader();
			}


			$('.holder.content').html(results);

			init();

		}

	}
}



/* ///////////////////////////////////////////////////////////////////////
                    Load Carousel with AJAX 
/////////////////////////////////////////////////////////////////////// */
loadCarouselWithAjax = function() {

	// outputToLog('load carousel');
	$.get('/features-carousel', function(data) {
		addPage(data);
	});

	function addPage(results) {
		results = results;
		$('.mantle.showCarousel').append(results);
		autoLoadPages();


	}

}

outputToLog = function(string) {
//	console.log(string);
}


// load carousel
carousel();