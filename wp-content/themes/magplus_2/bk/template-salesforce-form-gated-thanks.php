<?php
/*
Template name: Salesforce Gated Downloads - Thanks
*/
require_once(TEMPLATEPATH .'/head.php');

$postID = $_COOKIE['gatedID'];
$post = get_post($postID);
$gateName = $post->post_name;
$gateFileType = get_field('type_of_download', $postID);
$linkWindow='_blank';

if($gateFileType == 'file'){
    $linkWindow='_self';
    $gatedFile = get_field('download_file', $postID);
}
else{
    $gatedFile = get_field('download_url', $postID);
}
$adwordsCode = get_field('adwords', $postID);

?>
<script type='text/javascript' src='/wp-content/themes/magplus_2/js/jquery.min.js?ver=1.7.1'></script>
<div class="mbox">
    <ul class="salesforce-form mform gated thanks">

          <li class="form-title">
                <div class="gform_heading">
                  <? if($gatedFile) : ?>
                  <h3 class="gform_title">Thanks. Your file will now download.</h3>
                        <span class="gform_description">Did your download not start? <a href="<?= $gatedFile ?>", target="<?= $linkWindow ?>">Click here</a>.</span>
                    </div>
                  <? else: ?>
                  <h3 class="gform_title">Thanks. You will be contacted by Mag+ soon.</h3>
                  <? endif;?>
            </li>
      </ul>
              
</div> 

</div>
</body>

<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/jquery.colorbox-min.js'?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/scripts.js'?>"></script>

<?php 
  echo get_post_meta($post->ID, 'page_footer_scripts', true);

?>


<? /* 
Google Code for Buy Monthly - Form Submission Conversion Page 
Differnt versions of the tracking code are echoed out depending on the purchase type
*/?>


<script>
  $( document ).ready(function() {
    //Google Analytics
    
    _gaq.push(['_trackEvent', 'Forms', 'Submitted', '<?= "Gated Download - ".$gateName;?>'] );
    _gaq.push(['_trackPageview', '/resources/download-center/gated-form-thanks/<?= $gateName; ?>']);

    //Call Bing tracking function in footer
    parent.pingBing('<?= $gateName; ?>');


    $('html').addClass('salesforce-iframe-form');
    document.cookie ='gatedID=0; ;path=/resources/download-center/gated-form-thanks';
    
    <? if($gatedFile) : ?>
    window.parent.open('<?= $gatedFile ?>', '<?= $linkWindow ?>');
    <? endIf; ?>

  });

   
</script>
  <noscript>
    <div style="display:inline;">
      <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/971029699/?value=1.000000&amp;label=<?php echo $adwordsCode ?>&amp;guid=ON&amp;script=0"/>
    </div>
  </noscript>



<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/jquery.colorbox-min.js'?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/min/scripts.min.js'?>"></script>

<html>










<html>

