(function($){
	$.waypoints.settings.scrollThrottle = 130;
	var nav=$('nav');
	var sticky=$('.sticky')
	var none = $('.none');
	var navctr=$('#navctr');
	nav.waypoint({
		 handler: function(event, direction) {
	       none.removeClass('none').addClass('stickynav', direction=='down');
        if (direction=="up") {
        	navctr.toggleClass('none');
        }
    }
        
	});

	
	
})(jQuery);

