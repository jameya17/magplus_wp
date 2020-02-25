//@prepros-prepend for-homepage/easeljs-0.7.1.min.js
//@prepros-prepend for-homepage/tweenjs-0.5.1.min.js
//@prepros-prepend for-homepage/movieclip-0.7.1.min.js
//@prepros-prepend for-homepage/preloadjs-0.4.1.min.js
//@prepros-prepend for-homepage/infographic-1.js
//@prepros-prepend for-homepage/infographic-2.js


var images;


PixelRatio = window.devicePixelRatio;
	if($('.infoGraphic').length){
		//console.log('homepage script');
		$('body').addClass('home').css("background-color", "#e9e9e9");
		$('body > .container ').css("background-color", "#e9e9e9");

		$(window).resize(function(){
			var w = $('canvas').width();
			var h= $('canvas').height();
			$('canvas').attr('width', window.innerWidth*PixelRatio);
			$('canvas').css('width', window.innerWidth);

			$('#canvas1').attr('height', lib1.properties.height*PixelRatio);

			$('#canvas2').attr('height', lib2.properties.height*PixelRatio);
			console.log(lib1.properties.height*PixelRatio);
		
			
		});

		$(window).resize();
		$(window).scrollTop(0);
		var infoG1_top;

		$( window ).scroll();

		wordCarousel = '.word-carousel';
		words =$(wordCarousel+' em').length;

		i=0;
		var delay;

		function setWords(){
			if( i < words){
				$(wordCarousel+' em').removeClass('on');
				$(wordCarousel+' em:eq('+i+')').addClass('on');
				$(wordCarousel).css('padding-left',$(wordCarousel+' em.on').width());
			//	console.log($(wordCarousel+' em:eq('+i+')').css('width'));
				i++;
				if(i==words){
					i=0;
				}

			}
		}
		setWords();

		var WordInterval = true;
		setInterval(function () {
			if(WordInterval){
				setWords();
			}
		  }, 3000); 


		var vid = document.getElementById("bgvid");
		function setWordInterval(){
			WordInterval=true;
			//$('#bgvid').css('visibility', 'visible');
		//	vid.play();

		}

		function stopWordInterval(){
			WordInterval=false;
		//	vid.pause();
			//$('#bgvid').css('visibility', 'hidden');
		}



		var infographics=[], infoG=[];
		//infographics[1] = new lib.infographic1();
		

		function init(num) {
			var num = num;
			var canvas;

			function handleComplete(pixRat) {
		
				//Add external iles into animation
				infographics[num] = eval('new lib'+num+'.infographic'+num+'()');

				var stage = new createjs.Stage(canvas);
				stage.addChild(infographics[num]);

				  // stage.scale= pixRat;

				createjs.Ticker.setFPS(eval('lib'+num+'.properties.fps'));
				createjs.Ticker.addEventListener("tick", stage);

				stage.update();
			}

			if(!isNaN(num)){
				canvas = document.getElementById("canvas"+String(num));

				images = images||{};

				//loader for external files I.E. images /audio
				var loader = new createjs.LoadQueue(false);
				loader.addEventListener("fileload", handleFileLoad);
				loader.addEventListener("complete", handleComplete);
				loader.loadManifest(eval('lib'+num+'.properties.manifest'));
			//	console.log(eval('lib'+num+'.properties.manifest'));
				handleComplete(window.devicePixelRatio);
				
			}


		




		function handleFileLoad(evt) {
			//console.log(evt.item.id);
				if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
			}


		function checkVis(el,parm){
			if($('.infographic'+num).css('visibility') !== parm){
				$('.infographic'+num).css('visibility', parm)

			}

		}
		

		infoG[num] = $('.infographic'+num).parent();
		infoG[num]['pos'] = $(infoG[num]).offset();
		infoG[num]['top'] = infoG[num]['pos'].top;
		infoG[num]['h'] = $(infoG[num]).height();
		infoG[num]['bot'] = infoG[num]['top']+infoG[num]['h'];
		var scale;

		$( window ).scroll(function() {

			var scale =($(window).height()*100)/$('body').height();

			var scrollSpot = ($(window).scrollTop()*(100))/68//(footer height);
			
				if(num != 'mantle'){
					if (scrollSpot >=(infoG[num]['top'])){
						infographics[num].Play();
					}
					if(scrollSpot <=(infoG[num]['top'] -(infoG[num]['top']/2))){
						infographics[num].Reset();
					}
				}
				else{
					if (scrollSpot < (infoG[num]['top']+(infoG[num]['h']/2))){
						setWordInterval();
					}
					if(scrollSpot >infoG[num]['bot']){
						stopWordInterval();
					}
				}

				if (scrollSpot > (infoG[num]['top']-(infoG[num]['h']/2)) && $(window).scrollTop()  < infoG[num]['bot']){
						checkVis(num,'visible');
						
					}
					if($(window).scrollTop() >infoG[num]['bot'] || scrollSpot < (infoG[num]['top']-(infoG[num]['h']/.2))){
						checkVis(num,'hidden');
						
					}		

			});

			if(num == 1){
				$('.btn-seeit').click(function(e){
					e.preventDefault();
					var body = $("html, body");
					_gaq.push(['_trackEvent', 'Home Page', "Button Click", "See More"] );
					
					body.animate({scrollTop:infoG[num]['top']}, '500', 'swing', function() {
				});

			});
			}
		}

		//Is desktop
		if(!$.browser.device || ($(window).width()>768 || !$.browser.device)){
			init(1);
			init(2);
			init('mantle');
		}
		//Is Mobile
		else{
			$('.btn-seeit').click(function(e){
				var pos = $('.igbox-1').offset();
				var posT = pos.top;
				console.log(posT);
				var body = $("html, body");
				body.animate({scrollTop:posT}, '500', 'swing', function() {});
			});

			$('body').append('<div class="more-arrow"> </div>');

			//display scroll arrow
			var homeScrolling;
			var scrT;//scroll pos
			var prevT = 0;//previous scroll pos
			var scrH;//height of scroll
			var oldscrT; //previous scroll pos before timeout check

			$( window ).scroll(function() {
				var scale =($(window).height()*100)/$('body').height();
				scrT= $(window).scrollTop();
				scrH= ($('body').height()-$(window).height());

				if((scrT <=(scrH-500) && scrT>prevT )&& !homeScrolling){
					homeScrolling =true;
					console.log('set Timeout');
				 	setTimeout(checkScrolling, 500);

				}
				prevT = scrT;

				function checkScrolling() {
					console.log('check scroll pos');
					
					setTimeout(function(){
						console.log($(window).scrollTop() +"  "+oldscrT+"  "+homeScrolling);
						if(($(window).scrollTop() == oldscrT) && !homeScrolling){
							oldscrT = $(window).scrollTop();
					    	console.log('show arrow');
					    	oldscrT =$(window).scrollTop();

					    	$('.more-arrow').addClass('show');
					    	setTimeout(function(){
					    		$('.more-arrow').removeClass('show');
					    	}, 1500);
					    	 
					    }
					    
					   
					  },500);
					homeScrolling = false; 
					oldscrT = $(window).scrollTop();

				


					

				}
			});




		}


		$('.btn-usecases').click(function(e){
			_gaq.push(['_trackEvent', 'Home Page', "Button Click", "View Use Cases"] );
			
		});

		$('.get-started .btn-signup').click(function(e){
			_gaq.push(['_trackEvent', 'Home Page', "Button Click", "Sign Up"] );
			
		});
		$('.get-started .btn-pricing').click(function(e){
			_gaq.push(['_trackEvent', 'Home Page', "Button Click", "View Pricing"] );
			
		});


	var slide_xpos;
	var slide_num=0;

    $(window).resize(function(){
    	var ww = $(window).width();
    	var wh = $(window).height();

    	$('.slider').css('width',ww*4);
    	$('.slide').css('width',ww);
    	$('.slide').css('height',wh);
    	$('.slider').css('left', 0-(ww*slide_num));
    	$('.noanimation').css('width',ww);
    	
	});

    

    $('.slider').css('left',0);
	$('.slider').swipe({
		swipeLeft:function(event, direction, distance, duration, fingerCount) {
			slide('next');
		},
		swipeRight:function(event, direction, distance, duration, fingerCount) {
			slide('prev');
		}
	});

	function slide(dir){

		var sw = parseInt($('.slider').width());
		var sl = parseInt($('.slider').css('left'));
		var ww = parseInt($(window).width());

		if(dir =="next"){

			if(sl> (0-(sw-ww))){
				xpos = (sl-ww);
				$('.slider').css('left',xpos);
				slide_num++;
				slide_xpos =xpos;

			}
		}
		

		if(dir =="prev"){

			if((sl< 0)){
				xpos = (sl+ww);
				console.log('swipe left');
				$('.slider').css('left',xpos);
				slide_num--;
				slide_xpos =xpos;

			}
		}
	}

}
