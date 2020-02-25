<?php
/*
Template name: Salesforce Contact Forms - Thanks
*/
require_once(TEMPLATEPATH .'/head.php');
$drtry = get_permalink( $id );
$drtry=split('/',$drtry);
$drtry= $drtry[(count($drtry)-2)];
?>
<script type='text/javascript' src='/wp-content/themes/magplus_2/js/jquery.min.js?ver=1.7.1'></script>
<div class="mbox">
    <ul class="salesforce-form mform thanks">

          <li class="form-title">
                <div class="gform_heading">
                  <h3 class="gform_title">Your inquiry has been recieved.</h3>
                        <span class="gform_description">Our sales team will contact you within 24 hours (weekdays).</span>
                    </div>
            </li>
      </ul>
              
</div> 

</body>
<?php echo get_post_meta($post->ID, 'page_footer_scripts', true); ?>




<script>
  $( document ).ready(function() {
      //Google Analytics tracking
  

    $('html').addClass('salesforce-iframe-form');
  });
</script>

<html>