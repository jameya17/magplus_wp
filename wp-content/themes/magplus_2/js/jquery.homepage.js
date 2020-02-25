//@prepros-prepend for-homepage/easeljs-0.7.1.min.js
//@prepros-prepend for-homepage/tweenjs-0.5.1.min.js
//@prepros-prepend for-homepage/movieclip-0.7.1.min.js
//@prepros-prepend for-homepage/preloadjs-0.4.1.min.js
//@prepros-prepend for-homepage/infographic-1.js
//@prepros-prepend for-homepage/infographic-2.js


	if($('.page-template-single-home-php').length){
		//console.log('homepage script');
		$('body').addClass('home').css("background-color", "#e9e9e9");
		$('body > .container ').css("background-color", "#e9e9e9");

		$(window).resize(function(){
			
			$('canvas').attr('width', window.innerWidth);
			
		});

		$( window ).resize();
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
			vid.play();

		}

		function stopWordInterval(){
			WordInterval=false;
			vid.pause();
			//$('#bgvid').css('visibility', 'hidden');
		}



		var infographics=[], infoG=[];
		//infographics[1] = new lib.infographic1();
		

		function init(num) {
			var num = num;
			var canvas;

		function handleComplete() {
			
			//Add external iles into animation
			infographics[num] = eval('new lib.infographic'+num+'()');
			var stage = new createjs.Stage(canvas);
			stage.addChild(infographics[num]);

			createjs.Ticker.setFPS(lib.properties.fps);
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
			loader.loadManifest(lib.properties.manifest);
			handleComplete();
		}



		function handleFileLoad(evt) {
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
				$('.btn-seeit').click(function(){
				var body = $("html, body");
				body.animate({scrollTop:infoG[num]['top']}, '500', 'swing', function() {
				});

				return false
			});
			}


		}

		init(1);
		init(2);
		init('mantle');

	}
