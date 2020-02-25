<?php
/*
Template name: Salesforce Buy Forms - Thanks
*/
require_once(TEMPLATEPATH .'/head.php');
$buytype = $_COOKIE['buytype'];
?>
<script type='text/javascript' src='/wp-content/themes/magplus_2/js/jquery.min.js?ver=1.7.1'></script>
<div class="mbox">
    <ul class="salesforce-form thanks mform">

          <li class="form-title">
                <div class="gform_heading">
                  <h3 class="gform_title">Thank you for your order.</h3>
                        <span class="gform_description">Our sales team will contact you within 24 hours (weekdays).</span>
                    </div>
            </li>
      </ul>
              
</div> 

</div>
</body>

<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/jquery.colorbox-min.js'?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/min/scripts.min.js'?>"></script>

<?php 
  echo get_post_meta($post->ID, 'page_footer_scripts', true);

?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<div id="fb-root"></div>


<?php 
if($buytype && $buytype!==0){ 
// add the coorisponding AdWords code the proper type of purchase made 
  switch ($buytype) {
    case 'pro':
      $label='10wACNrDtFgQw_mCzwM';
        break;
    case 'plus':
      $label='0PTtCLiMslgQw_mCzwM';
        break;
    case 'single':
      $label='p_4ACNKOslgQw_mCzwM';
        break;
     case 'custom':
      $label='CeVqCNrn01YQw_mCzwM';
        break;
}
?>
 
  <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<script>
  $( document ).ready(function() {
    //Google Analytics
    _gaq.push(['_trackEvent', 'Forms', 'Submitted', '<?= $_COOKIE[buytype];?>'] );
    _gaq.push(['_trackPageview', '/buy/success/<?= ucfirst($_COOKIE[buytype]);?>']);

    //Call Bing Tracking function 
    parent.pingBing('license-<?= $_COOKIE[buytype];?>');


    $('html').addClass('salesforce-iframe-form');
    document.cookie ='buytype=0; ;path=/salesforce-buy-form-thanks';
    document.cookie ='buytype=0; ;path=/salesforce-buy-form';
  });
  

</script>
  <noscript>
    <div style="display:inline;">
      <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/971029699/?value=1.000000&amp;label=<?php echo $label ?>&amp;guid=ON&amp;script=0"/>
    </div>
  </noscript>



<? }?>




