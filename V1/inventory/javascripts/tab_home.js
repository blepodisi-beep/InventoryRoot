$(document).ready(function(){

	$('ul.tabshome li').click(function(){
		var tab_id = $(this).attr('data-tabhome');

		$('ul.tabshome li').removeClass('currenthome');
		$('.tab-contenthome').removeClass('currenthome');

		$(this).addClass('currenthome');
		$("#"+tab_id).addClass('currenthome');
	});

});
