/*!
 * Visual Visitor v3.3.6 (http://visualvisitor.com/)
 * Copyright 2011-201.
 * Licensed under the MIT license

 */

jQuery(document).ready(function($) {

	
	var submit_button = $('.bng-wrap');
	//$('input[type=submit]').remove('.button-primary');
	$('<p id="space-1" style="margin:0">&nbsp;</p>').insertAfter('#bng_email');


	
	//add button
	$('<div id="bng-spinner" style="display:inline-block"><img src="images/spinner.gif"></div>').insertAfter(submit_button);
	$("#bng-spinner").hide();
	//$('<button id="upload" class="button-primary"></button>').insertAfter(submit_button);
	//$('<i id="space-3">&nbsp;</i>').insertAfter('#upload');
	//$('<button id="remove" class="button-secondary">Remove</button>').insertAfter('#space-3');	
	

	$('#bng_password').attr('type', 'password');
	$('<p id="bng-msg" style="display:none;margin-bottom:0;"></p>').insertAfter('#bng_password');

	jQuery("#bng_email").val("");
	jQuery("#bng_password").val("");
	
	$.ajax({
			type:'post',
			url : 'admin-ajax.php',
			data : 'action=bng_get_button_name'			
		}).done(function(response){
			jQuery("#upload").html(response);
			if(response.trim() == "Install")
			{
				$("#view_congratulations").hide();
				$("#view_update").hide();
				$("#view_remove").hide();
			}
			if(response.trim() == "Update")
			{
				$("#view_install").hide();
				$("#view_congratulations").show();
				$("#view_update").show();
				$("#view_remove").show();
			}

		}).fail(function(error){
			console.log(error, "----");
		});

	$(document).on('click', '#upload', function(e){		
		$("#bng-spinner").show();
		e.preventDefault();
		$.ajax({
			type:'post',
			url : 'admin-ajax.php',
			data : 'bng_email='+$('#bng_email').val()+'&bng_password='+$('#bng_password').val() + '&action=bng_response_post',
			dataType: 'json'
		}).done(function(response){
// Hide it after 3 seconds
			var json_text = JSON.parse(response.body);	
			//alert(response.message);
			if (json_text.status=='failed'){
				
				//alert("Server Error try later");
				//return false;
				setTimeout(function() {
					console.log(json_text.status);
					$('#bng-msg').css({"color":"#FE1A00","font-size":"16px","font-weight":"bold"});
					$('#bng-msg').text("Authentication Failed or Server Error try Later");
			        $("#bng-msg").fadeIn();			        
			        $("#bng-spinner").hide();
			    });
				//
				//$('#bng-msg').show(2000);
				//$('#bng-msg').hide(2500);
				
			}else{
				setTimeout(function() {	
			        $("#upload").html("Update");	        	
					$("#remove").show();						        
			        $("#bng-spinner").hide();
			    });
				$("#view_congratulations").show();
				$("#view_install").hide();
				$("#view_update").show();
				$("#view_remove").show();
				$("#bng-msg").hide();
			}
			jQuery("#bng_email").val("");
			jQuery("#bng_password").val("");
			
			

		}).fail(function(error){
			//reset();			
			$("#bng-spinner").hide();
			console.log(error.responseText);
			//alert('OppsSSSSSS! '+error);
			$('#bng-msg').text("Server Error. Try again.");
			$("#bng_email").val("");
			$("#bng_password").val("");

		});


	});
	$(document).on('click', '#remove', function(e){		
		$("#bng-spinner").show();
		e.preventDefault();
		$.ajax({
			type:'post',
			url : 'admin-ajax.php',
			data : 'action=remove_this_script_footer'
		}).done(function(response){
				setTimeout(function() {			        
			        $("#bng-spinner").hide();
			        $("#upload").html("Install");
			        
						$("#remove").hide();
					
			    });
			console.log(response)
			//alert(response.message);
			jQuery("#bng_email").val("");
			jQuery("#bng_password").val("");

			$("#view_congratulations").hide();
				$("#view_update").hide();
				$("#view_remove").hide();
				$("#view_install").show();
				$("#bng-msg").hide();
			
		}).fail(function(error){			
			$("#bng-spinner").hide();
			$('#bng-msg').text("Server Error. Try again.");
			console.log(error);
			jQuery("#bng_email").val("");
			jQuery("#bng_password").val("");			
		});

	});	

});


