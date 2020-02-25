(function($) {

    $.expandbox = function(el, options) {
        var target;
        var height;
        var colmns;
        var zoomToHeight;
        var closedHeight = 0;
        var xPos = 0;
        var yPos = 0;
        var targetPane;
        var targetDiv;
        var oldBox;
        var offset;
        var kids;
        var allKids;
        var ignoreKids;
        var numbOfKids;
        var numbOfKidsWide;
        var parentOrder;
        var topPad = 0;
        var kidArray = [];
        var scrollDelay;
        var row = 0;
        var doc;


        //Defaut Settings
        var defaults = {
            closedHeight: 0,
            height: closedHeight
        };

        var columnCutter =1;
        if($.browser.device){
            if($(window).width()< '1024'){
                columnCutter =2;

            }
            if($(window).width()< '768'){
                columnCutter =3;
            }
        }

        var plugin = this;
        plugin.settings = {};

        var init = function() {

            plugin.settings = $.extend({}, defaults, options);
            plugin.el = el;

            target = plugin.el;
            height = plugin.settings.height;
            colmns = Math.round(plugin.settings.colmns/columnCutter);
         

            topPad = plugin.settings.topPad;

            doc ='body';
            brwsr = readCookie('mp_browser');
            if(typeof brwsr !== "undefined" && brwsr){
                
                if((brwsr != 'safari') && (brwsr != 'chrome')){
                    doc ='html';
                }
            }

            createElements();

        };

        var createElements = function() {


            //Close any open Targets befor loading more 
            if (targetPane) {
                $(targetPane).find('.btn-close').click();
            }

            /* ==========================================
            Collect elements
            =========================================== */
            $('.expander').css('position', 'relative');

            if (!$(el).hasClass('expandBox-holder')) {
                $(el).addClass('expandBox-holder');
            }

            allKids = $(el).children().length;

            kids = $(el).children().filter(function() {

                return !($(this).hasClass("holder"));
            });


            numbOfKids = kids.length;

            ignoreKids = parseInt(allKids - numbOfKids);

            var check=0;

            while (numbOfKids < 1 && check<50) {
                kids = kids.children();
                numbOfKids = kids.length;
                check++;
            }

            parentOrder = $(el).index();

            var targetChild = $(el + " " + $(kids).prop('tagName') + ":eq(0)");

            numbOfKidsWide = Math.round($(targetChild).parent().width() / ($(targetChild).parent().width() / colmns));


            /* ==========================================
            Make Rows and add expanders
            =========================================== */

            //add a new li that will hold the rows (we'll append the exisitng ones into this)
            if ($('.expandBox-holder .holder').length < 1) {
                $(el).append('<li class="holder"><ul></ul><div class="expander"></div></li>');
            }


            middleBox = Math.ceil(colmns / 2);
            for (var i = 0; i < kids.length; i) {
                if ((middleBox) == i) {
                    $(kids[i]).addClass("mid");
                    middleBox += colmns;
                }
                //add a new row as needed
                $(kids[i]).appendTo($(el + ' .holder >ul:eq(' + row + ')'));

                //console.log('adding li'+i+' to row '+row+'  i % numbOfKidsWide='+i % numbOfKidsWide);
                if (((i % numbOfKidsWide) == (numbOfKidsWide - 1))) {
                    $(el + ' .holder').append('<ul></ul><div class="expander"></div>');
                    row++;
                }

                i++;

            }



            /* ==========================================
            Create Interactive Elements
            ===========================================*/
            $(kids).click(function(event) {
                if ($(this).attr('data-link')) {

                    window.location.href = $(this).attr('data-link');
                    return;
                } else {
                    event.preventDefault();
                    $(kids).removeClass('animate');
                    $(el).removeClass('expanded');

                    //homepage specific code
                    setHomepageModH();

                    $('li.selected').addClass('animate');

                    $(kids).parent().find('li').removeClass('selected');
                    $(this).addClass('selected');

                    targetDiv = $(this).index() + "" + $(this).parent().index() + ".strng";
                    targetPane = $(this).parent().next();

                    if ($(targetPane).find('article')) {
                        $(targetPane).find('article').removeClass('on');
                        $(targetPane).find('article').addClass('old');
                    }
                    $(targetPane).append($(this).find('article').clone());


                    var thisitem = $(this);
                    $(targetPane).find('.btn-close').click(function(event) {
                        event.preventDefault();
                        $(thisitem).click();
                        setHomepageModH();

                    });

                    swapDeets(targetPane);
                    return false;
                }
            });


            $(kids).mouseover(function(event) {
                event.preventDefault();

                expandboxParent = $(this).parent();

                while ($(expandboxParent).children() < 1) {
                    expandboxParent = $(expandboxParent).parent();
                }
                //Define zoom source
                xPos = 0;
                yPos = 0;
                var pos = $(expandboxParent).position();
                if (pos) {
                    xPos = pos.left;
                    yPos = pos.top;
                }
            });
        };
        //alert($('html').scrollTop()+" "+$('html').scrollTop());

        //homepage specific function. This resizes the section when open. By default the section's height is the browser window height

        setHomepageModH = function(){
            if($('.home-page .companies-using')){
                
                minH =$('.home-page .companies-using .content').height();
               
                $('.home-page .companies-using').css('min-height',minH);
           

             setTimeout(function() {
                minH =$('.home-page .companies-using .content').height();
               
                $('.home-page .companies-using').css('min-height',minH);
            }, 1000);
         }
        }

        var swapDeets = function(targetPane) {

            offset = 0;

            // opening in new or different pane 
            if (!openPane || $(openPane).index() != $(targetPane).index()) {
                $(openPane).removeClass('open');
                oldPane = $(openPane).index();
                oldPaneH = parseInt($(openPane).css('height'));
                $(openPane).css('height', 0);
                $(targetPane).addClass('open');
                $(el).addClass('expanded');
                $('body').addClass('expanded');

                //adjust height of pane for content
                if ($(targetPane).find('article')) {
                    $(targetPane).css('height', $(targetPane).find('article').height());
                }

                openPane = targetPane;
                //compemsate scrolling to open pain if one above is open
                if (oldPane < $(targetPane).index() && oldPaneH) {
                    offset = oldPaneH;
                }
            if(!$('.home-page').length){
                scrollDelay = setTimeout(function() {
                   // console.log(pos.top+"  "+offset +"  "+topPad);
                    $(doc).animate({

                        scrollTop: (pos.top - offset) - topPad
                    }, 1000, function() {
                      
                        updatePaneContent(targetPane);
                    });
                    //$('body, html').animate({scrollTop: 0}, 1000);
                    clearTimeout(scrollDelay);
                }, 500);
            }
            else{
                updatePaneContent(targetPane);
            }

            }
            // Close open pane
            if (oldTargetDiv == targetDiv) {
                $('.expander .old').remove();
                $(openPane).removeClass('open');
                // $(openPane).css('height',0);
                $(openPane).empty();
                $(el).find('li').removeClass('selected');
                oldTargetDiv = false;
                openPane = false;
                offset = $(expandboxParent).height();
                                //homepage specific code
                setHomepageModH();

            }


            // Load new content into existing pane
            else {
                //slight delay to wait for correct sizing
                $(el).addClass('expanded');
                $('body').addClass('expanded');
                var swapItems = setTimeout(function() {
                    $('.expander .old').remove();

                    if ($(targetPane).find('article')) {
                        $(targetPane).css('height', $(targetPane).find('article').height());
                    }

                    $(targetPane).find('article').addClass('on');

                     if(!$('.home-page').length){
                        scrollDelay = setTimeout(function() {

                            $(doc).animate({
                                scrollTop: (pos.top - offset) - topPad
                            }, 1000, function() {
                               //  console.log('load from existing pane');
                                updatePaneContent(targetPane);
                            });
                            //$('body, html').animate({scrollTop: 0}, 1000);
                            clearTimeout(scrollDelay);
                        }, 500);
                    }
                    else{
                        updatePaneContent(targetPane);
                    }

                    if($('.share').length){
                     //   addThisBtn();
                    }
                    clearTimeout(swapItems);
                }, 0);

                oldTargetDiv = targetDiv;
            }

            pos = $(targetPane).offset();

        };

        this.updateExpandBox = function() {
            createElements(targetDiv);
        };

        updatePaneContent = function(targetPane) {
            setHomepageModH();
            var targetImg = $(targetPane).find('img.app');

            var targetShadow = $(targetPane).find('img.shadow');
            $(targetShadow).attr('src', $(targetShadow).attr('data-shadow'));
                 //console.log('set time out');
            setTimeout(function() {

                //set the image src
                $(targetImg).attr('src', $(targetImg).attr('data-img'));

                //fade image in when loaded
               // console.log('load image');
                $(targetImg).on('load', function() {
                    $(targetPane).find('.device').css('background', 'none'); //remove load txt
                    $(targetImg).animate({
                        opacity: 1
                    }, 300); //fade image in
                });

                 //if onload wasn't detected
                 // console.log('set time out');
                    setTimeout(function() {
                         //console.log('set time out 2');
                        if( $(targetImg).css('opacity') != '1'){
                            $(targetPane).find('.device').css('background', 'none'); //remove load txt
                            $(targetImg).animate({
                                opacity: 1
                            }, 3000); //fade image in

                           // console.log('timedout');
                        }

                    }, 1000);

            }, 1000);

            //homepage specific code
        };

        /* ==========================================
        Overriden browser scrolling by mouse scrolling
        ===========================================*/
        if (document.addEventListener) {
            // IE9, Chrome, Safari, Opera
            document.addEventListener("mousewheel", MouseWheelHandler, false);
            // Firefox
            document.addEventListener("DOMMouseScroll", MouseWheelHandler, false);
        }
        // IE 6/7/8
        else document.attachEvent("onmousewheel", MouseWheelHandler);

        function MouseWheelHandler() {
            $('body, html').stop();
            if (scrollDelay) {
                clearTimeout(scrollDelay);
            }
        }
        // Iniitalize 
        init();
        
    };

})(jQuery);