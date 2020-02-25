
jQuery(document).ready(function($){

    wp.customize( 'homepage_theme_title', function( value ) {
    value.bind( function( newval ) {
        $( '#latest_theme_section h1' ).html( newval );
    } );
});
    
        wp.customize( 'homepage_theme_description', function( value ) {
    value.bind( function( newval ) {
        $( '#latest_theme_section p' ).html( newval );
    } );
});
    
    wp.customize( 'features_list_title', function( value ) {
    value.bind( function( newval ) {
        $( '#features_section h1' ).html( newval );
    } );
});
    
        wp.customize( 'features_list_description', function( value ) {
    value.bind( function( newval ) {
        $( '#features_section p' ).html( newval );
    } );
});
    
    wp.customize( 'testimonial_list_title', function( value ) {
    value.bind( function( newval ) {
        $( '#testimonial_section h1' ).html( newval );
    } );
});
    
        wp.customize( 'testimonial_list_description', function( value ) {
    value.bind( function( newval ) {
        $( '#testimonial_section p' ).html( newval );
    } );
});
    
    wp.customize( 'blog_list_title', function( value ) {
    value.bind( function( newval ) {
        $( '#blog_section h1' ).html( newval );
    } );
});
    
        wp.customize( 'blog_list_description', function( value ) {
    value.bind( function( newval ) {
        $( '#blog_section p' ).html( newval );
    } );
});
    
    
});