jQuery(document).ready(function($){
$("#client_slide").carouFredSel({
        align: 'left',
        items: {
                width: "variable",
                visible: 7
        },
        scroll: 1,
        prev: {
                button: "#prev",
                key: "left"
        },
        next: {
                button: "#next",
                key: "right"
        }, 
        auto: false
}, {debug: true});


$('.fade-gallery').carouFredSel({
        items: 1,
        scroll: {
                fx: 'fade'
        },
        height: 'variable',
        auto: {
                pauseDuration: 7000
        }
});

});