$(function jmcScript(){
	$('.tooltips').tooltip({
		animation : false 
	});	
	$('nav a').each(function(){
		var title = $(this).text();
		$(this).attr('title',title);
	});

	$('[type=reset]').attr('tabindex','-1');


});
$(function layout(){
	if (parseInt($(window).width()) > 768){
		reLayout();
	}
	function reLayout(){
		$('.layout').each(function(){	

			var north 	= $(this).children('.layout-north').outerHeight() || 0,
				south	= $(this).children('.layout-south').outerHeight() || 0,
				east	= $(this).children('.layout-east').outerWidth() || 0,
				west	= $(this).children('.layout-west').outerWidth() || 0;

			$(this).children('.layout-center').css({'top':north, 'right':east, 'bottom':south, 'left':west});
			$(this).children('.layout-west').css({'top':north, 'bottom':south});
			$(this).children('.layout-east').css({'top':north, 'bottom':south});
		});
	}
});
$(function checkAll(){
  $('.checkall').click(function () {
		$(this).parents('table').find(':checkbox').attr('checked', this.checked);
	});
});

/* Chosen */
$(function(){
    $('.chosen-select').chosen({disable_search_threshold: 10});
});

/* Sidebar Toggler */
$(function(){
	$('.sidebar-toggler').click(function(){
		if($('body').hasClass('fullpage')){
			$('body').removeClass('fullpage');
			$(this).children('.fa').removeClass('fa-arrow-down').addClass('fa-bars');
		} else {
			$('body').addClass('fullpage in');
			$(this).children('.fa').removeClass('fa-bars').addClass('fa-arrow-down');
		}
	});
});
$(function(){
	$('.nav-sidebar li ul').parent().children('a').click(function(){
		if($(this).next('ul').is(':hidden')){   
			$(this).parent().siblings('li').removeClass('focus').children('ul').hide(200);
			$(this).parent().addClass('focus').children('ul').show(200);
		} else {
			$(this).parent().removeClass('focus').children('ul').hide(200);
		}
	});
});
$(function pathway(){
	var active = $('.breadcrumb li.active').text().replace(/ /g,'');

	$('.nav-sidebar a').filter(function() {
	    var text = $(this).text().replace(/ /g,''); 
	    return text == active;
	}).parent().addClass('active').parents('li').addClass('focus').children('ul').show();

});

$(function sweetAlert(){
	$('.confirm').click(function(){
		var title 		= $(this).data('title') || 'Alert',
			message		= $(this).data('message') || 'Are You Sure?',
			type  		= $(this).data('type') || 'warning',
			cancel  	= $(this).data('cancel') || true,
			cancelText 	= $(this).data('cancelText') || 'Cancel',
			confirmText = $(this).data('confirmText') || 'OK',
			autoClose 	= $(this).data('autoClose') || true,
			href		= $(this).attr('href');

		swal({   
            title: title,   
            text: message,   
            type: type,   
            showCancelButton: cancel,   
            cancelButtonText:cancelText,
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: confirmText,   
            closeOnConfirm: autoClose
        }, function(){   
            location.href=href;
        });
        return false;
	});
});

function noticeSuccess(message){
	var message = message || 'Proses Berhasil';

    sweetAlert({
    	title 	: 'Success',
    	text 	: message,
    	type	: 'success',
    	timer	: 2000,
    	showCancelButton : false,
    	showConfirmButton : false
    });
}
function noticeFailed(message){
	var message = message || 'Proses Gagal';

    sweetAlert({
    	title 	: 'Error',
    	text 	: message,
    	type	: 'error',
    	timer	: 2000,
    	showCancelButton : false,
    	showConfirmButton : false
    });
}


$(function labelClick(){
    $('input').next('label').click(function(){
        $(this).prev().trigger('click');
        return false;
    });
});


