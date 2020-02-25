/**
 * The Mag+ when editing a post/page inside wp scripts
 *
 * -
 * -
 * -
 */


jQuery(document).ready(function($){
  if( $('#page_template option:selected').text() === 'Features & price'){
      pricingUI();
  }else{
    $('#product_features').hide();
  }

  $('#page_template').on('change', function(){
    if( $('#page_template option:selected').text() === 'Features & price'){
      pricingUI();
    }else{
      $('#product_features').hide();
    }
  });

  function pricingUI(){
    $('#postexcerpt, #page_puffar, #postimagediv, #tagsdiv-post_tag, #post_custom_meta, #commentsdiv').hide();
    $('#menu_order').parent().hide().prev().hide();
    $('#product_features').show();
  }

  $('.featuresInput').on('keyup mouseup',function(){
      var me = $(this);
      var nthchild = me.index() + 1;
      var content = me.val();
      console.log(content);
      $('#features_preview p:nth-of-type('+nthchild+')').html(content);
      //Detect which nth-of-type textfield..
      //add content from this to p in featuresInput p of same nth-of-type.
  });

});
