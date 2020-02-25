$('document').ready(function(){
   $('h1.mini-title').after($('#callToActionArea'));
   $('.landingpage-wrapper').prepend($('#tag-widget-areas'));
  
   var ref = document.referrer;
   var refDomain = ref.split(/\/+/g)[1];
   if ((typeof refDomain != 'undefined') && ((refDomain.indexOf("magplus.dev") > -1) || (refDomain.indexOf("magplus.com") > -1))){
        var target = $('#articles');
        $('html, body').scrollTop(target.offset().top-24);
   }
});

