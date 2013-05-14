
(function($){
	
	var Like = {
	init: function(config){
		this.config=config;
		this.bindEvents();
	},

	bindEvents: function(){
			this.config.beforeLike.on('click',this.LikePost);
	},
	LikePost: function(e){
		var $liked=$(this);
		$.ajax({
			url:'',
			type:'GET',
			data:{user_id: $(this).data('user_id'),post_id:$(this).data('post_id'),status:'liked'}
		}).done(function(resault){
			
			$liked.empty().append(resault);
		});
		e.preventDefault();
	}
};
Like.init({
	beforeLike:$('a.Ilikeit')
});
})(jQuery);

