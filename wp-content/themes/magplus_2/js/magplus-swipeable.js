if ($.browser.device) {
	var swipeable = [];

	if ($('.swipeable').length) {
		$('.swipeable').click(function() {
			$(this).removeClass('on');
			setTimeout(function() {
				$(obj).removeClass('swipeable');
			}, 2000);
		})

		$.fn.isOnScreen = function() {

			if ($(this).hasClass('swipeable')) {

				var win = $(window);

				var viewport = {
					top: win.scrollTop(),
					left: win.scrollLeft()
				};
				viewport.right = viewport.left + win.width();
				viewport.bottom = viewport.top + win.height();

				var bounds = this.offset();
				bounds.right = bounds.left + this.outerWidth();
				bounds.bottom = bounds.top + this.outerHeight();

				var threshold = this.outerHeight() / 3;

				return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < (bounds.top + threshold) || viewport.top > (bounds.bottom - threshold)));

			} else {
				return false;
			}
		};

		$('.swipeable').each(function() {
			obj = $(this);
			$(this).addClass('on');

			$(window).scroll(function() {
				if ($(obj).isOnScreen()) {

					var objname = $(obj).attr('class') + $(obj).html().length;

					if (!swipeable[objname]) {
						swipeable.push(objname);
						setTimeout(function() {
							$(obj).removeClass('on');
						}, 2000);
						setTimeout(function() {
							$(obj).removeClass('swipeable');

						}, 2500);
					}

				}
			});
		})
	}
}