
/*
 * Mag bubble
 *
 * - Wrapper block with position relative
 * - Child with position absolute and display none
 *   and class .tooltip-text if settings not changed
 */
$.fn.magbubble = function(options){
	//console.log('mag bubble script');

	// options
	var opts = $.extend({}, $.fn.magbubble.defaults, options);

	// iterate and reformat each matched element
	return this.each(function() {
		var $this = $(this),
			$text = $this.find(opts.textSelector),
			width = $this.outerWidth(),
			textWidth = $text.outerWidth(),
			textHeight = $text.outerHeight(),
			textRatio = (textHeight / textWidth);


		// if the height is to high
		if( textRatio > 1.3 ){
			// set a width based on the ratio
			textWidth = (textWidth * ( 0.5 + textRatio / 2 ));
			$text.css({ width: textWidth +'px' });
			// get the new height
			textHeight = $text.outerHeight();
		}

		var center = ( (width/2) - (textWidth/2) ),
			top = (opts.top - textHeight), // top for same position on all
			leftPos;

		// where to position the box
		if(isNaN(opts.left)){
			if(opts.left === 'center'){
				leftPos = center;
			}else if(opts.left === 'mouse'){
				$.fn.magbubble.mousemove($this, $text, textWidth, textHeight, opts);
				leftPos = center;
			}
		}else{
			leftPos = opts.left;
		}


		// set the opacity to 0 and center the box
		$text.css({ opacity: 0, left: leftPos +'px' });

		// hide show on hover
		$this.hover(function(){
			if(!opts.hoverThis){
				$text
					.stop()
					.delay(opts.delay)
					.css({ display: 'block' })
					.animate({ opacity: 1 }, opts.speedIn );
			}else{
				// display the object and set the correct position
				$text
					.stop()
					.delay(opts.delay)
					.css({ display: 'block', top: top +'px' })
					// animate the popup
					.animate({
						top: (top - opts.distance) + 'px',
						opacity: 1
					}, opts.speedIn, 'swing');
			}

		}, function(){
			// Animate it up and fade away
			$text.stop(opts.forceEnd, opts.forceEnd).animate({
				top: ( top - (opts.distance*2) ) + 'px',
				opacity: 0
			}, opts.speedOut, 'swing', function () {
				// hide the popup entirely after the effect (opacity alone doesn't do the job)
				$text.css('display', 'none');
			});
		});

		// Prevent hover on the bubble
		if(!opts.hoverThis){
			$text.hover(function(e){
				$this.trigger('mouseout');
				e.stopPropagation();
				return false;
			});
		}

	});
}
$.fn.magbubble.defaults = {
	top: 90,
	left: 'center',
	distance: 20,
	speedIn: 100,
	speedOut: 300,
	delay: 0,
	forceEnd: false, // stop the show animation directly
	textSelector: '.tooltip-text',
	hoverThis: true
}
$.fn.magbubble.mousemove = function($this, $text, textWidth, textHeight, opts){
	var posX, posY, thisOffset = $this.offset();
	$this.mousemove(function(e){
		posX = (e.pageX - thisOffset.left) - (textWidth/2);
		posY = (e.pageY - thisOffset.top) - textHeight - opts.distance;
		$text.css({ left: posX +'px', top: posY +'px' });
	});
}
