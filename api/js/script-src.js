/*
 * jQuery v1.9.1 included
 */

// Global variable for checking URL
var thisPage = document.URL.split('support.magplus.com');
thisPage = thisPage[1];



//Used for main nav highlighting who's links don't contain url parameteres
thisPageNoParams = thisPage.split['?'];
if(thisPageNoParams){
    thisPageNoParams = thisPageNoParams[0];
}

$(document).ready(function() {


    if($('.page-nav').length){
      addthis.init();
      addthis.toolbox('.addthis_toolbox');
  }

  
    //add mantle page class to homepage content div
    if($('.mantle').length){
      $('#content').addClass('subpage-mantle');

  }

  
  if ($('#user-name').length) {
    $('.mantle h3').html('Welcome, ' + $('#user-name').html()+'!');
    $('span.user-login').remove();

}

    // social share popups
    $(".share a").click(function(e) {
        e.preventDefault();
        // window.open(this.href, "", "height = 500, width = 500");
    });
    // toggle the share dropdown in communities
    $(".share-label").on("click", function(e) {
        e.stopPropagation();
        var isSelected = this.getAttribute("aria-selected") == "true";
        this.setAttribute("aria-selected", !isSelected);
        $(".share-label").not(this).attr("aria-selected", "false");
    });


    $(document).on("click", function() {
        $(".share-label").attr("aria-selected", "false");
    });

    // show form controls when the textarea receives focus
    $(".answer-body textarea").one("focus", function() {
        $(".answer-form-controls").show();
    });

    $(".comment-container textarea").one("focus", function() {
        $(".comment-form-controls").show();
    });

    announcments = new $.slideShow('.announcements', {
        effect: 'fade'
    });

    $('main').contents().unwrap();
    if( $('.mbox .mantle').length){
      $('#main-search-bar').remove();
  }
  $('#query').attr('placeholder', '\uD83D\uDD0D');
  $('#header_wrap').append($('.notification-lock'));
});



// Sub Nav
jQuery(document).ready(function($) {

    var breadcrumbs = $('.breadcrumbs li').length-2;
    var onSection = $('.breadcrumbs li:eq('+breadcrumbs+') a').text().toLowerCase();
    // set Nav On states

    if($('header.my-activities-header').length){
        $('a.my-activities').addClass('on');
    }
    
    else if(onSection == "announcements" || onSection == "support updates" || thisPage.indexOf('requests/') > -1){
        $('.sub.updates').addClass('on');
    }
    else if(thisPage.indexOf('sections/') > -1 || thisPage.indexOf('categories/') > -1 || thisPage.indexOf('articles/') > -1){
        $('.sub.documentation').addClass('on');
    }

    else if(thisPage.indexOf('communities/') > -1){
        $('.sub.forums').addClass('on');
        $('html').addClass('forum');

        if(thisPage.indexOf('/unanswered') > -1){
          $('.community-nav li:eq(2)').addClass('on');
      }
      else if(thisPage.indexOf('questions/') > -1){
          $('.community-nav li:eq(1)').addClass('on');
      }
      else {
          $('.community-nav li:eq(0)').addClass('on');
      }

  }

  else{
    $('.sub.home').addClass('on');
}

$('#subNav .sub a.nolink').click(function(e){

    e.preventDefault();
})


var theSection;
var theTopic;
if(breadcrumbs){
 if(breadcrumbs > 0){
    theSection = $('.breadcrumbs li:eq(1) a').attr('href');
}
if(breadcrumbs > 1){
    theTopic = $('.breadcrumbs li:eq(2) a').attr('href');
}
}

$.ajax({
    url: "/hc/en-us",
    dataType: 'html',
    success: function(data) {
        var elements = $(data).find('.announcements .category-tree .category h2');
        var catText;
        var catLink;
        var navItems = "";
        var catLable;
        var dest;



        $.each(elements, function() {
                //Get Each Category Title and Link that isn't from the Support Updates Page
                catText = $(this).find('a').html();
                catLink = $(this).find('a').attr('href');
                var catLable = catText.replace(/\s+/g, '-').toLowerCase();
                catLable = catLable.replace('&amp;', 'n').toLowerCase();
                catLable = catLable.replace('---', '-').toLowerCase();

                if (catText !== 'Support Updates') {

                    var dest;
                    switch (catLable) {
                        case 'creating-your-content':
                        dest = 'documentation';
                        break;
                        case 'creating-n-managing-your-app':
                        dest = 'documentation';
                        break;
                        case 'forums':
                        dest = 'forums';
                        break;
                        default:
                        dest = 'nowhere';
                    }


                    // navItems +='<ul class="nav-'+catLable+'" ><li>'+catText+'</li>';
                    var liClass ="";         
                    if(catLink == thisPage || catLink == thisPageNoParams || catLink == theSection){
                        liClass = ' class="on"';
                    }
                    $('#subNav .' + dest + ' .menu').append('<ul class="nav-' + catLable + '"></ul>');
                    $('#subNav ul.nav-' + catLable).append('<li><h2'+liClass+'>' + $(this).html() + '</h2></li>');


                    //Get each topic link from the category links 
                    loaditems = function(obj) {
                        $.ajax({
                            url: catLink,
                            dataType: 'html',
                            success: function(data) {
                                var elements = $(data).find('.section-tree h3');

                                $.each(elements, function() {
                                    var theText = $(this).find('a').text();
                                    var theUrl = $(this).find('a').attr('href');

                                    
                                    //check if link is current page
                                    var liClass ="";

                                    if(theUrl == thisPage || theUrl == thisPageNoParams || theUrl == theTopic){
                                        liClass = ' class="on"';
                                    }
                                    $('#subNav ul.nav-' + obj).append('<li'+liClass+'>' + $(this).html() + '</li>');
                                });
                            }
                        });
};

loaditems(catLable);
}

});

}

});

});



//Create Topic Nav and Pagination Nav
jQuery(document).ready(function($) {

    if ($('.article-header').length) {
        $.ajax({
            url: $('.breadcrumbs li:eq(1) a').attr('href'),
            dataType: 'html',
            success: function(data) {
                var elements = $(data).find('.shadow-wrapper .section-tree h3');
                var currHead = $(data).find('.shadow-wrapper .section-tree h3 a').html();

                var catText;
                var catLink;
                var navItems = "";
                var catLable;
                var dest;
                var numOfCats = 1;


                //Get Each Category Title and Link from all pages except for "Updates"
                $.each(elements, function() {

                    var h3 = $(this).html();
                    var catText = $(this).find('a').html();
                    var catLink = $(this).find('a').attr('href');
                    var headTxt = catText;
                    var numOfLinks;

                    var catLable = catText.replace(/\s+/g, '-').toLowerCase();
                    catLable = catLable.replace('&amp;', 'n').toLowerCase();
                    catLable = catLable.replace('+', '').toLowerCase();
                    catLable = catLable.replace(')', '').toLowerCase();
                    catLable = catLable.replace('(', '').toLowerCase();
                        catLable = catLable.replace('---', '-').toLowerCase();
                        console.log('catLable ='+catLable);

                    //Get each topic link from the category links 
                    loaditems = function(obj, head) {


                        $.ajax({
                            url: catLink,
                            dataType: 'html',
                            success: function(data) {

                                $('aside .topic-nav').append('<div class="' + catLable + '"/>');
                                $('aside .topic-nav .' + catLable).append('<h2>' + head + '</h2>');
                                $('aside .topic-nav .' + catLable).append($(data).find('.section-tree .article-list'));
                                var elCount = elements.length;

                                //Set the the click fcuntionality on the Topic Nav
                                var nextLink = $(data).find('.pagination-next');
                                if ($(nextLink).length) {

                                    $.ajax({
                                        url: $(nextLink).find('a').attr('href'),
                                        dataType: 'html',
                                        success: function(data) {

                                            $('aside .topic-nav .' + catLable+'  .article-list').append($(data).find('.section-tree .article-list').children());
                                            setTopicNavFunc(numOfCats, elCount);
                                            numOfCats++;
                                        }

                                    });

                                } else {
                                    setTopicNavFunc(numOfCats, elCount);
                                    numOfCats++;
                                }

                            }
                        });
};
loaditems(catLable, h3);
});

}

});
}


    //Sets the the click functionality on the Topic Nav after all the number categories and ajax sections loaded match
    function setTopicNavFunc(numOfCats, numofEls) {

        //Clear if clicks have allready applied
        $('aside .topic-nav h2').unbind();
        var turnoff;

        $('aside .topic-nav h2').click(function(e) {
            e.preventDefault();

            if (!$(this).parent().hasClass('expand')) {
                turnoff = 1;
            }
            $('aside .topic-nav >div').removeClass('expand');

            if (turnoff) {
                $(this).parent().addClass('expand');
                console.log('click');
            }
            turnoff = 0;
        });


        if (numOfCats == numofEls) {

            setTimeout(function() {
                var thisPageTopic = $('.breadcrumbs li:last-child a').html();

                // find element with same header and link with same URL as current page
                $('.topic-nav h2').each(function() {
                    var headTxt = $(this).find('a').html();
                    if (headTxt == thisPageTopic) {
                        $(this).parent().addClass('active').addClass('expand');

                        $(this).parent().find('ul li a').each(function() {

                            if ($(this).attr('href') == thisPage) {
                                $(this).parent().addClass('on');

                                //Set Pagination Links
                                setPagePagination($(this).parent());
                            }
                        });

                    }
                });

                //scroll to pos
                setTimeout(function() {
                    var posTop = $('.on').position();

                    $(".active ul").scrollTop(posTop.top / 3);
                }, 1500);


            }, 1000);
}


}



function setPagePagination(el) {

    var prev = $(el).prev().find('a');
    var next = $(el).next().find('a');

    if (prev.length) {
        $('.btn.prev a').attr('href', $(prev).attr('href'));
        $('.btn.prev a').html($(prev).html());
    } else {
        $('.btn.prev').addClass('mute');
    }

    if (next.length) {
        $('.btn.next a').attr('href', $(next).attr('href'));
        $('.btn.next a').html($(next).html());
    } else {
        $('.btn.next').addClass('mute');
    }
    
      $('.page-nav li.btn').click(function(){
        console.log("clicked");
        console.log($(this).find('a').attr('href'));
        window.location.href = $(this).find('a').attr('href');
    })

}


if ($('.category-page').length) {

    $('.section-tree .section .see-all-articles').each(function() {

        $(this).parent().find('ul').append('<li class="see-all" />');
        $(this).parent().find('ul li:last-child').append($(this));
    });

    $.each($('.section-tree .section h3'), function() {

        $(this).prepend('<span />');
    });


    $('.section-tree .section h3 span').click(function(e) {

        if (!$(this).parent().parent().hasClass('expand')) {
            turnoff = 1;
        }

        $('.section-tree .section').removeClass('expand');

        if (turnoff) {
            $(this).parent().parent().addClass('expand');
        }

        turnoff = 0;


    });
}

});



$(document).ready(function() {


  $('.community-nav li:last-child a').html('New Post');
  
  if(thisPage.indexOf('/questions/new') > -1){

    $('.shadow-wrapper').wrapInner('<section class="question-new"></section>');
    $('.shadow-wrapper').prepend($('nav.community-nav'));
    if($('section.question-new').length){
        $('section.question-new h1').html("New Post");

    }
    
}


//remove submit a ticket if not logged in

if(window.role && (window.role == 'admin' || window.role == 'brand_admin')){
}
else{
  $('#subNav .contact a').remove();
}

//display page contents
$('body').addClass('loaded');
});




$(document).ready(function() {
   if($('.question-author').length){
        var org_names = '"Mike Rettew", "Sara C Glaser", "Anders Odevik", "Amie Barder", "Victor Cardoso", "Mike Haney", "Matt Cokeley", "Griffin Plonchak", "Jenny Moberg", "Brett Sandusky"';

        org_names = org_names.split(',');

        function searchStringInArray (str) {
            for (var j=0; j<org_names.length; j++) {
                if (org_names[j].match(str)) return true;
            }
            return false;
        }

        $('.answer-author').each(function(){
          var author = $('.answer-author').find('a').html();
          if(searchStringInArray(author)){
                $(this).addClass('magplus');
            }

        });
        
         $('.question-author').each(function(){
          var author = $('.question-author').find('a').html();
          if(searchStringInArray(author)){
                $(this).addClass('magplus');
            }

        });
   }

});
