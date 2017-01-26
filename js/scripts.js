(function($){

	$(document).ready(function(){

		wp.customize('copyright_text',function(value){

			value.bind(function(to){
				$('#copy').text(to);
			});
		});

	})

})(jQuery)