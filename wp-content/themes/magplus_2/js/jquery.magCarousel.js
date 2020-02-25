    $.magcarousel = function(el, options) {

        var width;
        var height;
        var slideAmnt;
        var slideNum = 1;
        var bottomPadding;
        var maxH = 0;
        var viewH;
        var zoomLevel;
        var footerHeight;
        var clearForHover;
        var scrollDelay;
        var navOffset = 0; // how many slides to not make accessable from nav

        //Defaut Settings
        var defaults = {

        };

        var plugin = this;
        plugin.settings = {};

        var init = function() {
            plugin.settings = $.extend({}, defaults, options);
            plugin.el = el;
            bottomPadding = plugin.settings.bottomPadding;

            if (plugin.settings.navOffset) {
                navOffset = navOffset + plugin.settings.navOffset;
            }

            target = plugin.el;
            slideAmnt = $('.carcl-slides>li').length;
            footerHeight = $('.carcl-nav').height();


            $(el + ' a.back').click(function(event) {
                event.preventDefault();
                $('body').addClass('anim');
                slideNum--;
                slideCarousel('b');


            });

            $(el + ' a.next').click(function(event) {
                event.preventDefault();
                $('body').addClass('anim');
                slideNum++;
                slideCarousel('n');

            });


            $('.carcl-nav ul li').click(function(event) {
                event.preventDefault();
                $('body').addClass('anim');
                //console.log('navoffset+2 '+navOffset+2);
                slideNum = $(this).index() + (navOffset + 1);
                $(el).addClass('view');
                $(el).removeClass('hover');
                $('.mantle').addClass('showCarousel');

                if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
                    $('body').scrollTop($('#header_wrap').height());
                    $('.mantle').height($(window).height());
                }

                slideCarousel();

            });

            $(el + ' .closer').click(function(event) {
                event.preventDefault();
                $(el).removeClass('view');
                clearForHover = true;
                clearHover = setTimeout(function() {
                    clearForHover = false;
                    slideNum = 1;
                    $('.mantle').removeClass('showCarousel');
                    slideCarousel();
                    clearTimeout(clearHover);
                    $(window).resize();
                }, 500);

            });

            $(el).click(function(event) {
                $(el).removeClass('hover');
            });

            $(el).hover(function(event) {
                if (!$(el).hasClass('view') && !clearForHover) {
                    $(el).addClass('hover');
                }
            });

            $(el).mouseleave(function(event) {
                $(el).removeClass('hover');
            });

            $('.landingpage-wrapper ').click(function(event) {
                event.preventDefault();
                var offset = $(this).offset();
                // $("html, body").animate({ scrollTop: offset.top-10}, 500);
                slideNum = 1;
                slideCarousel();
            });



            var navItem = 0;
            navCnt = $('.carcl-nav li').length;
            itemWidth = (($('.carcl-container').width() / navCnt));

            // console.log('navCnt= '+navCnt+" itemWidth= "+$('.carcl-container').width());
            $.each($('.carcl-nav li'), function() {

                $('.carcl-nav li:eq(' + navItem + ')').css('width', itemWidth);
                navItem++;

            });

            $('.home ' + el + ' .closer').click();
            // sizeSlides();
            $('.home .mantle').removeClass('showCarousel');

            sizeSlides();
            slideCarousel();

        };

        var sizeSlides = function() {
            width = $(window).width();
            height = $(window).height();
            $('.carcl-slides').width(width * slideAmnt);
            $('.carcl-slides>li').width(width);

            //if on homepage
            if ($('.mantle .floater').length) {
                $('.mantle .floater').css('padding-bottom', $('.carcl-nav').height());
            }

            //$('.carousel .carcl-slides').css('height',$('.carousel').height()-$('.carcl-nav').height());

            var offset = $(plugin.el).offset();
            // $(plugin.el).css('height',height-(offset.top+bottomPadding)); 
            $(plugin.el).css('width', width);


            for (var i = 0; i < slideAmnt; i++) {
                $('.carcl-slides>li:nth-child(' + (i + 1) + ')').css('left', (width * i));
            }

            viewH = ($(plugin.el).height() - footerHeight);
            //zoomLevel = Math.floor(((viewH-80)*100)/maxH)/100;
            zoomLevel = 1;
            $('.carcl-slides>li').height(viewH);

            if (zoomLevel < 1) {
                $(plugin.el + ' ul .carcl-container').css('zoom', zoomLevel).css('-moz-transform', 'scale(' + (zoomLevel) + ')');
                //$(plugin.el+ ' ul .carcl-container').css('width',$(plugin.el+ ' ul .carcl-container').height()*2);

            } else {
                $('ul .carcl-container').css('zoom', 1);
                // $(plugin.el+ ' ul .carcl-container').css('width',auto)
            }

            $.each($('.carcl-slides>li'), function() {
                var newH = $(this).find('.carcl-column-l').height();

                $(this).css('margin-top', (0 - (newH / 2)) - footerHeight);


                if (newH > maxH) {
                    maxH = newH;
                }
            });
            slideCarousel();
        };

        var slideCarousel = function(direction) {

            if (direction) {
                if (direction == 'b' && slideNum <= (navOffset + 1)) {

                    slideNum = navOffset + 1;
                }

                if (direction == 'n' && slideNum >= slideAmnt) {

                    slideNum = slideAmnt;
                }
            }

            scrollTime = 10;
            //console.log('scroll top= '+$("html, body").scrollTop());

            if ($(".anim .holder > div.on").length) {
                scrollTime = 1000;
                //console.log('100 sec');
            }

            setTimeout(function() {
                $('.carcl-slides').css('left', 0 - (width * (slideNum - 1)));
            }, scrollTime);



            updateNav(slideNum);
        };

        var setFeatImg = function() {
            var featW;
            var featH;
            var featMarg;
            var dimens;
            if (width > height) {
                featW = width;
                featH = 'auto';
                dimens = 'w';
            } else {
                featW = 'auto';
                featH = height;
                margin = 'auto';
                dimens = 'h';
            }

            $('.carcl-feat-image').css('width', featW).css('height', featH).css('margin', featH);
            if (dimens == 'w') {
                featMarg = $('.carcl-feat-image').height() / 2;
                $('.carcl-feat-image').css('margin-top', 0 - featMarg).css('top', '50%');
            } else {

                $('.carcl-feat-image').css('margin', 0).css('margin-right', 0).css('margin-left', 0).css('top', '0');
            }
        };

        var updateNav = function(slideOn) {

            var navOn = slideOn - navOffset;
            if(navOn){
                $('.carcl-nav li').removeClass('on');
                $('.carcl-nav ul>li:nth-child(' + (navOn) + ')').addClass('on');

                //Track event
                
                if($('.page-template-template-landingpage-2-php').length){
                    //console.log($('.carcl-nav .on a').html()+' '+navOn);
                    _gaq.push(['_trackEvent', 'Home Carousel', "View Slide", $('.carcl-nav .on a').html()] );
                }
                

                if ($('.carcl-feat-image').length) {

                    $('.anim .carcl-feat-image').removeClass('on');

                    setTimeout(function() {
                        $('.carcl-feat-image.' + $('.carcl-nav .on').attr("data-title")).addClass('on');

                    }, 1000);

                }

                $('.anim .carcl-slides li').removeClass('on');
                $('.anim .carcl-slides > li:nth-child(' + (slideOn) + ')').addClass('on');



                //console.log('navOn= '+navOn+' amount= '+slideAmnt);

                if (navOn <= navOffset + 1) {
                    // console.log('mute next');
                    $(el + ' a.next').removeClass('mute');
                    $(el + ' a.back').addClass('mute');
                } else if (navOn >= (slideAmnt - navOffset)) {
                    //console.log('mute back');
                    $(el + ' a.back').removeClass('mute');
                    $(el + ' a.next').addClass('mute');
                } else {
                    //console.log('remove mute');
                    $(el + ' a').removeClass('mute');
                }
                setFeatImg();
            }
        };

        $(window).resize(function() {
            //console.log('resize');
            $('body').removeClass('anim');

            sizeSlides();
        });


        init();
    };
