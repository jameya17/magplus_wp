;(function($) {

    $.slideShow = function(el, options) {

        var time;
        var effect;
        var slideAmnt;
        var slideNum=0;
        var slideH=0;

        var clearForHover;
        var animateShow;

        //Defaut Settings
        var defaults = {
    
        };
       
        var plugin = this;
            plugin.settings = {}

        var init = function() {
            plugin.settings = $.extend({}, defaults, options);
            plugin.el = el;

            target = plugin.el;
            slideAmnt= $(el+' .article-list:eq(0) >li').length;


            $(el+' a.back').click(function(event) {
                event.preventDefault();
                $(plugin.el).addClass('anim');
                slideNum--;
                slideTheShow('b');
            });
            

            $(el+' a.next').click(function(event) {
                event.preventDefault();
                $(plugin.el).addClass('anim');
                slideNum++;
                slideTheShow('n');
            });

           
            $(el).click(function(event) {
                 $(this).removeClass('hover');
            });

             $(el).hover(function(event) {
                $(this).addClass('hover');
            });

            $(el).mouseleave(function(event) {
                 $(el).removeClass('hover');
            });

        
            var navItem =0;
            $(el +' li:not(.article-promoted)').remove();
            navCnt = $(el +'li').length;
            itemWidth =(($(el+' ul').width()/navCnt));

            
             $.each($(el+' li'), function() {
                var liH= $(this).height();
                if(liH>slideH){
                    slideH=liH;
                }

               $('.carcl-nav li:eq('+navItem+')').css('width', itemWidth);
                navItem++;
            });
             
            $(el+' >ul').css('height',slideH);


             //Show menue for a second on load
              $(el+' li:eq(0)').addClass('show');
                animateShow=setInterval(function(){
                if(!$(el).hasClass('hover')){
                    slideNum++;
                    slideTheShow('n');
                }
                    
            },5000);
        }

       
        var slideTheShow = function(direction){
            if(direction){
              
                if((direction=='b' && slideNum<=0) || (direction=='n' && slideNum>=slideAmnt)){
                        slideNum=0;
                }

            }
             $(el+' ul li').removeClass('show');
             $(el+' ul li:eq('+slideNum+')').addClass('show');
            
            updateNav(slideNum);
            
        }


        var updateNav = function(slideOn){
            var navOn = slideOn-1;
            $('.carcl-nav li').removeClass('on');
            $('.carcl-nav ul>li:nth-child('+(navOn)+')').addClass('on');

            $('.carcl-slides li').removeClass('on');
            $('.carcl-slides > li:nth-child('+(slideOn)+')').addClass('on');


            if(navOn<1){
                $(el+' a.next').removeClass('mute');
                $(el+' a.back').addClass('mute');
            }
            else if(navOn>(slideAmnt-2)){
                $(el+' a.back').removeClass('mute');
                $(el+' a.next').addClass('mute');
            }
            else{
                $('.carcl-nav a').removeClass('mute');
            }
        
        }


        

        init();
    }

})(jQuery);



