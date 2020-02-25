var expandboxParent;
var openPane;
var oldPane;
var oldPaneH;
var oldTargetDiv;



$(function() {
	//console.log('load magClients script');
	$=jQuery;
	var pgnum=1;
	var expandbox = {};
	var expandingClients;

	
	function loadMoreClients(){

		if( typeof sort == "undefined" && !sort){
			sort = '';
		}
		// Define the format for Software uses or Clients
		if(typeof customer_uses !== "undefined" && customer_uses ){
			dirPath = 'software-uses-results';
			if(sort){
				usecase ="&";
			}
			else{
				usecase ="?";
			}
			usecase += 'usecases='+customer_uses;
		}
		else{
			dirPath = 'clients';
			usecase = '';

			// Fix for main nav item not highlighting when filter was in url
			if(!$('#main-menu li:eq(0)').hasClass('current-menu-item')){
				$('#main-menu li:eq(0)').addClass('current-menu-item');
			}
		}


		//Datalink is defined if the link needs to open in a new window not the sliding pane
		if( typeof datalink  !== "undefined" && datalink ){
			if(sort || usecase){
				datalink ="&";
			}
			else{
				datalink  ="?";
			}
			datalink += 'datalink=1';
		}
		else{
			datalink='';
		}


		// Clear cached items
		if( typeof uncache  !== "undefined" && uncache ){
			if(sort || usecase || datalink){
				uncache ="&";
			}
			else{
				uncache="?";
			}
			uncache += 'uncache=1';
		}
		else{
			uncache='';
		}
		 
		$.get( '/client/page/'+pgnum+sort+usecase+datalink+uncache, function( data ) {addPage(data);});
		//console.log('/client/page/'+pgnum+sort+usecase+datalink+uncache);
alert(1122);

		function addPage(results){

alert(1122);
			el = 'expandBox'+pgnum;
			results = results;
			$('#clients-list').append(results);

			if(typeof clmns == "undefined"){
				clmns ='4';
				//console.log('set columns');
			}
						
			
			//Initial load
			if(!expandingClients){
				expandingClients = true;
				//console.log('expand Clients');
				expandingClients= new $.expandbox('.'+el,{adjustable:true,colmns:clmns,topPad:60});
			}
			//Loading additional pages
			else{
				//console.log('update Clients');
			 	expandingClients.updateExpandBox();
			}


			if(pgnum >= numOfPosts){
		
					$('.load-more').remove();
			}

			else{
				$('.load-more').removeClass('loading');
			}

			var pos=$('.'+el).position();
			/*if(pos.top>($('.'+el).height()/2)){
				 $('body, html').animate({scrollTop: pos.top-60}, 1000);
			}*/


			//$('.expandBox'+pgnum+' .holder ul:last-of-type li:last-child a img ').load(function() {
			$('.expandBox-holder .holder  .client-item:last-child .client-img img ').load(function() {
				console.log('loaded');
			 	
				$('.'+el).removeClass('fade');
				$(window).resize();
			  
			});
			pgnum++;

		}

		$('.load-more').html('<span>Load page '+(pgnum+1)+' of '+numOfPosts+'</span>');


	}

	if($('#clients-list').length){
		$('#subNav li a').click(function(event) {
			event.preventDefault();
			var link;
			if($(this).attr('data-taxname')){
				link = '/clients/?filter='+$(this).attr('data-taxname');
			}
			else{
				link = '/clients/';
			}
			window.location.href= link;
			loadMoreClients();
		});

		$('.load-more').click(function(event) {

			event.preventDefault();
			$(this).addClass('loading');
			loadMoreClients();

		});
		
		$.each($('#subNav li a'), function() {
		  if('?filter='+$(this).attr('data-taxname')==sort){
		 	sort='?filter='+$(this).attr('data-taxid');
//		  	$(this).parent().addClass('current-menu-item');
		  	$('.clients >h1').after('<h2>'+$(this).html()+'</h2>')

		  }
		});

		if((typeof sort == "undefined" && sort) || sort ==''){
			//console.log('sort not set');

			$('#subNav .wrapper li:eq(0)').addClass('current-menu-item');
		}

		


		//trigger first 
		
			$('.load-more').click();


			function updateClients(){
				pgnum=1;
				$('#clients-list').empty();
				expandingClients = false;
				loadMoreClients();
			}
			 window.addEventListener("orientationchange", updateClients);

		}

		if((typeof dirPath !== "undefined" && dirPath)){
			addThisBtn = function(target){
				var shareTitle= $('.client-item.selected h2').text();
				var shareURL= $('.client-item.selected .btn-more').attr('href');
				 $('.expander.open .on .share').append('<div class="addthis_toolbox addthis_default_style" addthis:url="'+shareURL+'" addthis:title="'+shareTitle+'"><div class="custom_images"><a class="addthis_button_more"></a></div></div>')
					addthis.init();	
					addthis.toolbox('.addthis_toolbox');
				}
		}

});
