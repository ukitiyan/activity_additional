$(document).ready(function(){
	$('#activity_notifications').each(function(){
		var html = $(this).html();
		var hide_txt = $("#hide_activity_message").html();
		$(this).html(
			html.replace(hide_txt,"")
		);
	});


	$('#activity_notifications input[type=checkbox]').change(function(){
		OC.msg.startSaving('#activity_notifications_msg');
		var post = $( '#activity_notifications' ).serialize();
		$.post(OC.filePath('activity_additional', 'ajax', 'settings.php'), post, function(data){
			OC.msg.finishedSaving('#activity_notifications_msg', data);
		});
	});

	$('#activity_additional select').change(function(){
		OC.msg.startSaving('#activity_additional_msg');
		var post = $( '#activity_additional' ).serialize();
		$.post(OC.filePath('activity_additional', 'ajax', 'settingstime.php'), post, function(data){
			OC.msg.finishedSaving('#activity_additional_msg', data);
		});
	});

	$('#activity_notifications .activity_select_group').click(function(){
		var selectGroup = '#activity_notifications .' + $(this).attr('data-select-group');
		var checkedBoxes = $(selectGroup + ':checked').length;
		$(selectGroup).attr('checked', true);
		if (checkedBoxes === $(selectGroup + ':checked').length) {
			// All values were already selected, so invert it
			$(selectGroup).attr('checked', false);
		}

		OC.msg.startSaving('#activity_notifications_msg');
		var post = $( '#activity_notifications' ).serialize();
		$.post(OC.filePath('activity_additional', 'ajax', 'settings.php'), post, function(data){
			OC.msg.finishedSaving('#activity_notifications_msg', data);
		});
	});
 });
