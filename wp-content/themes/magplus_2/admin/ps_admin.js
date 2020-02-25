jQuery(document).ready(function($){

	
	function hexinverse(input){
		if(input.length < 6 || input.length > 6){
			window.alert('You Must Enter a six digit color code')
			return false;
		}
		hex1 = input.slice(0,2);
		hexb1 = input.slice(2,4);
		hexc1 = input.slice(4,6);
		hex2 = 16 * giveHex(hex1.slice(0,1));
		hex3 = giveHex(hex1.slice(1,2));
		hex1 = hex1 + hex2;
		hexb2 = 16 * giveHex(hexb1.slice(0,1));
		hexb3 = giveHex(hexb1.slice(1,2));
		hexb1 = hexb2 + hexb3;
		hexc2 = 16 * giveHex(hexc1.slice(0,1));
		hexc3 = giveHex(hexc1.slice(1,2));
		hexc1 = hexc2 + hexc3;
		newColor = DecToHex(255-hex1) + "" + DecToHex(255-hexb1) + "" + DecToHex(255-hexc1);
		return newColor;
	}
	var hexbase="0123456789ABCDEF";
	function DecToHex(number) {
		return hexbase.charAt((number>> 4)& 0xf)+ hexbase.charAt(number& 0xf);
	}
	function giveHex(s){
		s=s.toUpperCase();
		return parseInt(s,16);
	}
	
	/**
	 * Colorpicker
	 */
	$('.pickcolor').ColorPicker({
		onChange: function(hsb, hex, rgb){
			$($(this).data('colorpicker').el)
				.css({ background: '#'+ hex, color: '#'+ hexinverse(hex) })
				.val('#'+ hex);
			
		},
		onSubmit: function(hsb, hex, rgb, el) {
			$(el).val('#'+ hex);
			//$(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			$(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
		$(this).ColorPickerSetColor(this.value);
	});
	
	
	$('.ps-landing-img').live('click', function(){
			var $this = $(this),
				src = $this.attr('rel'),
				id = $this.attr('data-id');
				
			//lanken = lanken.replace(root,"");
			
			if(!window.parent.document.getElementById('ps_landing_img_input')) return false;
			
			window.parent.document.getElementById('ps_landing_img_input').value = id;
			window.parent.document.getElementById('ps_landing_img').src = src;
			self.parent.tb_remove();
			return false;
	});
	
	
	// Sidebar order
	var sidebarOrder = [],
		$orderList = $("#ps_landing_sidebars"),
		$orderInput = $('#ps_landing_order');
	
	if($orderList.length > 0){
		
		// make the boxes sortable and save the order to a input field
		$orderList.sortable({
			placeholder: "ui-state-highlight",
			stop: function(event, ui) {
				save_the_order();
			}
		});
		
		// if any of the boxes changes
		$orderList.find('input, select').change(function(){
			save_the_order();
		});
	}
	
	// Get the list and add the items to an input box
	function save_the_order(){
		var i = 0;
		
		// reset the array
		sidebarOrder = [];
		$orderList.find('.ps-landing-show:checked').each(function(){
			var $parent = $(this).closest('.landing-sidebar');
			sidebarOrder[i] = $parent.attr('data-id') +'::'+
				$parent.find('.ps-landing-cols').val();
			i++;
		});
		$orderInput.val(sidebarOrder.join(','));
	}
	

});