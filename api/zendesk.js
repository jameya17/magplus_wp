
jQuery(window).load(function(){
	new Ajax.Request('/home.json', {
		method:'get',
		asynchronous: true,
		onSuccess: function(transport){
			var obj = transport.responseText.evalJSON(),
				num = obj.length,
				i,
				items = [];
			for( i = 0; i < num; i++ ){
				items[i] = '<li class="mag-pinned">'+
					'<a href="http://support.magplus.com/entries/'+ obj[i].id +'">'+ obj[i].title +'</a>'+
					'</li>';
			}
			jQuery('#mag_pinned').html( '<ul class="options">'+ items.join('') +'</ul>' );
		}
	});
	
	
});