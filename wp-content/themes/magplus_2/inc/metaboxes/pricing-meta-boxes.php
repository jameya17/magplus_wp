<?php
/**
 * Custom meta boxes for pricing page
 *
 */

//First remove the tag-styled version that is default when adding a non-hierarchical taxonomy
add_action( 'add_meta_boxes', 'add_meta_boxes_pricing');

//Add listings of features
function add_meta_boxes_pricing() {
    add_meta_box(
        'product_features',
        'Features',
        'product_features_box_content',
        'page',
        'normal',
        'low'
    );


    global $post;
    if($post->post_type == 'featured-client'){

    }
}


function product_features_box_content(){
    global $post;
    $features = get_post_meta( $post->ID, 'magplus_features', true );
    if(!isset($features[0]) || trim($features[0]) == ''){
        $features[0] = '<strong>Flexible and secure hosting</strong> You can host your content and documents securely on your own server or with the provider of your choice and pay nothing to us, or take advantage of robust Mag+ hosting for just a few cents per download.';
    }
    if(!isset($features[1]) || trim($features[1]) == ''){
        $features[1] = '<strong>User Access Control</strong> Sell content via in-app purchase, including subscriptions, give it away for free, or use our simple API and permissioning systems to present a login window for authenticating users and controlling who sees what content.';
    }
    if(!isset($features[2]) || trim($features[2]) == ''){
        $features[2] = '<strong>Public and Enterprise apps</strong> Distribute your B2B and B2C apps through all three major app markets - Google, iTunes and Amazon - or create secure Enterprise apps for internal distribution using any MDM.';
    }

    echo '
        <textarea id="first-feature" class="featuresInput" name="magplus_features[]">',$features[0],'</textarea>
        <textarea id="second-feature" class="featuresInput" name="magplus_features[]">',$features[1],'</textarea>
        <textarea id="third-feature" class="featuresInput" name="magplus_features[]">',$features[2],'</textarea>


        <div id="features_preview">
        <h4>Preview</h4>
            <p>',nl2br($features[0]),'</p>
            <p>',nl2br($features[1]),'</p>
            <p>',nl2br($features[2]),'</p>
            <h4>HTML key</h4>
            <p>&lt;strong&gt;<b>bold text</b>&lt;/strong&gt;</p>
        </div>

    ';

    echo '';


}


//Saving our custom uploaded images
function product_features_settings_save( $post_id ) {
    if ( wp_is_post_revision( $post_id ))
    return;

    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
        return;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
        return;
    }


    $features = $_POST['magplus_features'];
    if($features && $features != null){
        update_post_meta( $post_id, 'magplus_features', $features );
    }   //delete_post_meta($post_id, $meta_key);
}
add_action( 'save_post', 'product_features_settings_save' );

 ?>