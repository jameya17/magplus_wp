<?php
/*
Template name: Salesforce Contact Forms
*/
require_once(TEMPLATEPATH .'/head.php');
$tp= $_GET["tp"];
?>
<script type='text/javascript' src='/wp-content/themes/magplus_2/js/jquery.min.js?ver=1.7.1'></script>
<div class="mbox <?= $tp ?>">
    <ul class="salesforce-form mform">

          <li class="form-title">
                <div class="gform_heading">

 <?php  
    /* -------------------------------------------------------
    --------------- Mag+ For Business form -------------------
    ---------------------------------------------------------*/
    if($tp=='fb'){
?>
                        <h3 class="gform_title">Please contact me about Mag+ for Business</h3>
                        <span class="gform_description">Our sales team will contact you within 24 hours (weekdays).</span>
                        </div>
                  </li>
                  <li class="clml"></li>
                  <li class="clmr"></li>
                  <li class="form-message"></li>
                </ul>
                <?php echo do_shortcode('[salesforce form="4"]' ) ?>
         
        </div>
                  <script>
                  $( document ).ready(function() {
                      $(".w2llead").prepend($(".salesforce-form"));

                      var even=0;
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

                      //Remove colon
                      messagetext= $('.sf_field_description .w2llabel').text();
                      $('.sf_field_description .w2llabel').text(messagetext.replace(':',''));

                      $('#sf_Website_Form__c').val("Website Form:For Business");
                  });

                </script>

<?php }

    /* -------------------------------------------------------
    --------------- SDK Form -------------------
    ---------------------------------------------------------*/
    if($tp=='sdk'){
?>
                                    <h3 class="gform_title">Please contact me about Software Development Kit</h3>
                                    <span class="gform_description">Our sales team will contact you within 24 hours (weekdays).</span>
                                    </div>
                                  </li>
                                  <li class="clml"></li>
                                  <li class="clmr"></li>
                                  <li class="form-message"></li>
                                </ul>
                                <?php echo do_shortcode('[salesforce form="3"]' ) ?>
                            
                            </div>
                              <script>
                              $( document ).ready(function() {
                                  $(".w2llead").prepend($(".salesforce-form"));

                                    if(!$.browser.device){

                                      var even=0;
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

                                  $('#sf_Website_Form__c').val("Website Form: SDK");
                              });

                            </script>

<?php }

    /* -------------------------------------------------------
    --------------- Support Services form -------------------
    ---------------------------------------------------------*/
    if($tp=='ss'){
?>


                                <h3 class="gform_title">Please contact me about Support Services</h3>
                                <span class="gform_description">Our sales team will contact you within 24 hours (weekdays).</span>
                              </div>
                          </li>
                          <li class="clml"><div class="checkboxes"></div></li>
                          <li class="clmr"></li>
                          <li class="form-message"></li>
                        </ul>
                      <?php echo do_shortcode('[salesforce form="4"]' ) ?>

                      <script>

                      $( document ).ready(function() {
                          $(".w2llead").prepend($(".salesforce-form"));

                          if(!$.browser.device){
                            $('.w2llead .sf_field').each(function(index) {
                              $(this).find('.w2linput').attr('tabindex',index+1);

                              if($(this).hasClass('sf_type_checkbox') || $(this).hasClass('sf_field_checkboxes')){
                                  var colnTxt = $(this).find('label').html().replace(":", "");
                                  $(this).find('label').html(colnTxt);
                                  $('.checkboxes').append($(this));
                                }
                                else{
                                  $('.clmr').append($(this));
                                }
                            });
                              
                            $('.clml').append($('.sf_field_alt_description'));
                            $('.clml').append($('.sf_required_fields_msg'));
                            $('.clmr').append($('.w2lsubmit'));
                          }
                          else{
                             if($('.sf_type_checkbox').length || $('.sf_field_checkboxes').length){
                  
                                  $('.sf_type_checkbox').insertAfter($('.salesforce-form'));
                                }
                          }

                          //Merge checkbox data and message data field
                          $('.w2llead input[type=submit]').click(function() {
                                $('#sf_checkboxes').val("");

                                //combine selected checkbox values
                                $('.w2llead  input[type=checkbox]').each(function() {
                                    if($(this).is(':checked')){
                                        var message;
                                        if($('#sf_checkboxes').val()){
                                            message = $('#sf_checkboxes').val()+", "+($(this).val());
                                        }
                                        else{
                                            message = ($(this).val());
                                        }

                                        //Add checkbox values to checkbox "required" field
                                        $('#sf_checkboxes').val(message);
                                    }
                                });

                              var message ="I'm interested in: "+$('#sf_checkboxes').val() + "\n\nMessage:\n "+$('#sf_alt_description').val();
                              $('#sf_description').val(message);

                              //alert($('#sf_description').val());
                               // $("#salesforce_w2l_lead_4").submit();
                          });

                          $('#sf_Website_Form__c').val("Website Form: Support Services");
                      });

                    </script>
 <?php }

    /* -------------------------------------------------------
    --------------- Creative services form -------------------
    ---------------------------------------------------------*/
    if($tp=='cs'){
?>


                        <h3 class="gform_title">Please contact me about Creative Services</h3>
                        <span class="gform_description">Our sales team will contact you within 24 hours (weekdays).</span>
                      </div>
                  </li>
                  <li class="clml"><div class="checkboxes"></div></li>
                  <li class="clmr"></li>
                  <li class="form-message"></li>
                </ul>
              <?php echo do_shortcode('[salesforce form="5"]' ) ?>
            
        </div>

              <script>
              $( document ).ready(function() {
                  $(".w2llead").prepend($(".salesforce-form"));

                    if(!$.browser.device){
                      $('.w2llead .sf_field').each(function(index) {
                        $(this).find('.w2linput').attr('tabindex',index+1);

                        if($(this).hasClass('sf_type_checkbox') || $(this).hasClass('sf_field_checkboxes')){
           
                            $('.checkboxes').append($(this));
                          }
                          else{
                            $('.clmr').append($(this));
                          }
                      });
                        
                      $('.clml').append($('.sf_field_alt_description'));
                      $('.clml').append($('.sf_required_fields_msg'));
                      $('.clmr').append($('.w2lsubmit'));
                    }

                    else{
                       if($('.sf_type_checkbox').length || $('.sf_field_checkboxes').length){
            
                            $('.sf_type_checkbox').insertAfter($('.salesforce-form'));
                          }
                    }

                  //Merge checkbox data and message data field
                  $('.w2llead input[type=submit]').click(function() {
                        $('#sf_checkboxes').val("");

                        //combine selected checkbox values
                        $('.w2llead  input[type=checkbox]').each(function() {
                            if($(this).is(':checked')){
                                var message;
                                if($('#sf_checkboxes').val()){
                                    message = $('#sf_checkboxes').val()+", "+($(this).val());
                                }
                                else{
                                    message = ($(this).val());
                                }

                                //Add checkbox values to checkbox "required" field
                                $('#sf_checkboxes').val(message);
                            }
                        });

                      var message ="I'm interested in "+$('#sf_checkboxes').val() + "\n\nMessage:\n "+$('#sf_alt_description').val();
                      $('#sf_description').val(message);

                      //alert($('#sf_description').val());
                       // $("#salesforce_w2l_lead_4").submit();
                  });

                  $('#sf_Website_Form__c').val("Website Form: Creative Services");
              });

            </script>

<?php }

    /* -------------------------------------------------------
    --------------- Sales Contact Form -------------------
    ---------------------------------------------------------*/
    if($tp=='scf'){
?>
                                     <h3 class="gform_title">We’re here for you!</h3>
                                      <span class="gform_description">Please get in touch for any sales or partner related matters.<br /> Our sales team will contact you within 24 hours (weekdays).</span>
                                    </div>
                            </li>
                            <li class="clml"></li>
                            <li class="clmr"></li>
                            <li class="form-message"></li>
                          </ul>
                          <?php echo do_shortcode('[salesforce form="6"]' ) ?>

                            <script>
                            $( document ).ready(function() {
                                $(".w2llead").prepend($(".salesforce-form"));

                                if(!$.browser.device){
                                  var even=0;
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

                                $('#sf_Website_Form__c').val("Website Form: Sales Inquiry");
                            });

                          </script>



<?php }



    /* -------------------------------------------------------
    --------------- Consulting Services Form -------------------
    ---------------------------------------------------------*/
    if($tp=='consf'){
?>
                                     <h3 class="gform_title">We’re here for you!</h3>
                                      <span class="gform_description">Please get in touch for any sales or partner related matters.<br /> Our sales team will contact you within 24 hours (weekdays).</span>
                                    </div>
                            </li>
                            <li class="clml"></li>
                            <li class="clmr"></li>
                            <li class="form-message"></li>
                          </ul>
                          <?php echo do_shortcode('[salesforce form="9"]' ) ?>

                            <script>
                            $( document ).ready(function() {
                                $(".w2llead").prepend($(".salesforce-form"));
             
                                 if(!$.browser.device){
                                    var even=0;
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

                                $('#sf_Website_Form__c').val("Website Form: Consulting");
                            });

                          </script>

<?php }

    /* -------------------------------------------------------
    --------------- Become a Partner Form -------------------
    ---------------------------------------------------------*/
    if($tp=='bpf'){
?>
                               <h3 class="gform_title">Please complete this form and a Mag+ sales representative will contact you</h3>
                               </div>
                    </li>
                    <li class="clml"></li>
                    <li class="clmr"></li>
                  </ul>
                  <?php echo do_shortcode('[salesforce form="7"]' ) ?>

                    <script>
                    $( document ).ready(function() {
                        $(".w2llead").prepend($(".salesforce-form"));

                        var even=0;
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

                        $('.clmr').append($('.w2lsubmit'));
                        $('.w2llead').append($('.sf_required_fields_msg'));

                        $('#sf_Website_Form__c').val("Website Form: Become a Partner");
                    });

                  </script>

<?php }

 /* -------------------------------------------------------
    --------------- Gated Downloads -------------------
    ---------------------------------------------------------*/

if($tp=='gt'){
  if($_GET[gtfiletype] == 'submit'){
     
      $actionType = 'Submit';
  }
  else{
      $actionType ='Download Now';
  }
?>
                        <h3 class="gform_title"><?= stripslashes($_GET['formtitle']) ?></h3>
                         <?php if($_GET[formdescr]){?> 
                                      <span class="gform_description"><?= $_GET[formdescr] ?></span>
                                        <?php }?>
                        </div>
                  </li>
                  <li class="clml"></li>
                  <li class="clmr"></li>
                  <li class="form-message"><p>By clicking the “<?= $actionType ?>” button I agree to the Mag+ <a href="/legal/conditions-of-use/" target="_blank">Terms</a> and <a href="/legal/privacy-policy/" target="_blank">Privacy</a>.</p></li>
                </ul>
                <?php echo do_shortcode('[salesforce form="10"]' ) ?>
         
        </div>
                  <script>
                  $( document ).ready(function() {
                      $(".w2llead").prepend($(".salesforce-form"));

                      var even=0;
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
                     // $('.form-message').append($('.sf_field_description'));
                     $('.salesforce-form').addClass('gated');
                      $('.form-message').append($('.w2lsubmit'));
                     $('.form-message').append($('.sf_required_fields_msg'));
                     $('.checkbox').prop('checked', true);
                     
                     if('<?=$actionType?>' == 'Submit'){
                      $('.sf_field_Send_Me_More_Whitepapers__c').html(" ");
                     }

                      //Remove colon
                      messagetext= $('.sf_field_description .w2llabel').text();
                      $('input.w2linput.submit').attr('value','<?= $actionType ?>');
                      $('.sf_field_description .w2llabel').text(messagetext.replace(':',''));

                      $('#sf_Website_Form__c').val("Website Form: <?= $_GET[gttype].' - '.$_GET[gttitle] ?>");
                  });

                </script>

<?php }

    /* -------------------------------------------------------
    --------------- Custom Gated Downloads -------------------
    ---------------------------------------------------------*/
    if($tp=='dps' || $tp=='print-replacement'){
      
      if($tp=='dps'){
        $formTitle = 'Adobe DPS Alternative';

      }

      if($tp=='print-replacement'){
        $formTitle = 'Print Replacement';
      }
?>
                                     <h3 class="gform_title"><?= stripslashes($_GET['formtitle']) ?></h3>
                                    <?php if($_GET[formdescr]){?> 
                                      <span class="gform_description"><?= $_GET[formdescr] ?></span>
                                        <?php }?>
                                   </div>
                            </li>
                            <li class="clml"></li>
                            <li class="clmr"></li>
                            <li class="form-message"></li>
                          </ul>
                          <?php echo do_shortcode('[salesforce form="11"]' ) ?>

                            <script>
                            $( document ).ready(function() {
                                $(".w2llead").prepend($(".salesforce-form"));

                                var even=0;
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

                                //Remove colon
                                messagetext= $('.sf_field_description .w2llabel').text();
                                $('.sf_field_description .w2llabel').text(messagetext.replace(':',''));

                                $('#sf_Website_Form__c').val("Website Form: Campaign - <?=$formTitle?>");
                            });

                          </script>



<?php } ?>

</body>

<script type="text/javascript">

  
<script>
$.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));

  $( document ).ready(function() {

        if($.browser.device){
          $('html').addClass('isMobile');
         }

      $('html').addClass('salesforce-iframe-form');
  });
</script>
<html>