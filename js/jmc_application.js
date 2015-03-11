$(function jmcScript(){
	$('.table-action').tooltip({
		animation : false, placement : 'bottom'
	});
	$('.tooltips').tooltip({
		animation : true, placement : 'bottom'
	});
	
	$('nav a').each(function(){
		var title = $(this).text();
		$(this).attr('title',title);
	});
});
/* Sidebar Toggler */
$(function(){
	$('.sidebar-toggle').click(function(){
		if($('#jmc_body').hasClass('full')){
			$('#jmc_body').removeClass('full');
		} else {
			$('#jmc_body').addClass('full');
		}
	});
});
$(function(){
	$('.nav-sidebar li ul').parent().children('a').click(function(){
		if($(this).next('ul').is(':hidden')){
			//$('.nav-sidebar > li').removeClass('focus').children('ul').slideUp(100);
			$(this).parent().siblings('li').removeClass('focus').children('ul').slideUp(100);
			$(this).parent().addClass('focus').children('ul').slideDown(100);
		} else {
			$(this).parent().removeClass('focus').children('ul').slideUp(100);
		}
	});
});
$(function pathway(){
	if($('.breadcrumb li').length > 1){
		var primary 	= $('.breadcrumb li').eq(1).text().replace(/ /g,''),
			secondary	= $('.breadcrumb li').eq(2).text().replace(/ /g,''),
			third		= $('.breadcrumb li').eq(3).text().replace(/ /g,'');

		$('.nav-sidebar > li > a').filter(function() {
	        var text = $(this).text().replace(/ /g,''); 
	        return text == primary;
	    }).parent().addClass('active');

	    $('.nav-sidebar > li > ul > li > a').filter(function() {
	        var text = $(this).text().replace(/ /g,''); 
	        var parentText = $(this).parents('li.active').children('a').text().replace(/ /g,''); 

	        return (text == secondary) && (parentText == primary);
	    }).parent().addClass('active').parents('li').addClass('focus').children('ul').show();

	    $('.nav-sidebar > li > ul > li > ul > li > a').filter(function() {
	        var text = $(this).text().replace(/ /g,''); 
	        return (text == third);
	    }).parent().addClass('active').parents('li').addClass('active').children('ul').show();

	} else {
		$('.nav-sidebar > li').eq(0).addClass('active');
	}
});

$(function checkAll(){
  $('.checkall').click(function () {
		$(this).parents('table').find(':checkbox').attr('checked', this.checked);
	});
});