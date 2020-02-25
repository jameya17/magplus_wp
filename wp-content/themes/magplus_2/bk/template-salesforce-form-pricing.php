<?php
/*
Template name: Salesforce - Buy Forms
*/
require_once(TEMPLATEPATH .'/head.php');
$buytype = $_COOKIE['buytype'];
?>
<script type='text/javascript' src='/wp-content/themes/magplus_2/js/jquery.min.js?ver=1.7.1'></script>
	<div class="mbox">
	    <ul class="salesforce-form mform">
			<li class="form-title">
			    <div class="gform_heading">
			    	<?php 
			    	switch ($buytype) {
					    case 'pro':
					    	$message='Pro';
					        break;
					    case 'plus':
					    	$message='Plus';
					        break;
					    case 'single':
					    	$message='Single';
					        break;
					     case 'custom':
					    	$message='Custom';
					        break;
					}
			    	?>

					<h3 class="gform_title">Contact Me About a <?php echo $message ?> License</h3>
				  </div>
			</li>
			<li class="clml"></li>
			<li class="clmr"></li>
			<li class="form-message"></li>
	    </ul>
        <?php echo do_shortcode('[salesforce form="8"]' ) ?>
    </div>

    <script>
		$( document ).ready(function() {
		  $(".w2llead").prepend($(".salesforce-form"));

		  var even=0;
		  //Check if mobile
		  if(!$.browser.device){
			  $('.w2llead .sf_field').each(function(index) {
			  	$(this).find('.w2linput').attr('tabindex',index+1);
			      if(!even){
			        $('.clml').append($(this));
			        even=1;
			      }

			      else{
			        $('.clmr').append($(this));
			        even=0;
			      }
			  });
			

		  $('.form-message').append($('.sf_field_description'));
		  $('.form-message').append($('.w2lsubmit'));
		  $('.w2llead').append($('.sf_required_fields_msg'));
		  }

		  //Remove colon
		  messagetext= $('.sf_field_description .w2llabel').text();
		  $('.sf_field_description .w2llabel').text(messagetext.replace(':',''));

		  $('#sf_Website_Form__c').val("Website Form: Buy <?php echo $buytype ?>");
		});
	</script>
         
</body>

<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/jquery.colorbox-min.js'?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/min/scripts.min.js'?>"></script>

<html>







