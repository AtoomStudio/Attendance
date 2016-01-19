(function( $ ) {
	'use strict';

	$(function() {
		$('.attendees-table').find('.add_annotation').on('click', function(e){
			e.preventDefault();
			var _target = $(this).data('target');
			$(_target).removeClass('closed');
			$(this).hide();
		});
		$('.datepicker').datepicker({
      firstDay: 1,
      dateFormat: "dd/mm/yy",
      buttonImage: "images/date-button.gif",
      buttonImageOnly: true,
      showOn: "both"
    });
		$('.abbr-alert').on("click", function(){
			var msg = $(this).attr('title');
			alert(msg);
		})

		var frame,
			metaBox = $('.set-person-file-wrapper'),
			delFileLinks = metaBox.find( '.delete-person-file'),
			addFileLinks = metaBox.find('.add-person-file');

		addFileLinks.on( 'click', function( e ) {
			e.preventDefault();

			//if ( frame ) {
			//	frame.open();
			//	return;
			//}

			var addFileLink = $(this),
				fileFieldWrapper = addFileLink.parents('.set-person-file-wrapper'),
				delFileLink = fileFieldWrapper.find( '.delete-person-file'),
				fileContainer = fileFieldWrapper.find( '.person-file-container'),
				fileIdInput = fileFieldWrapper.find( '.person-file-id' );
			// If the media frame already exists, reopen it.
			frame = wp.media.frames.frame = wp.media({
				multiple: false
			});

			console.log(frame);

			frame.on( 'select', function() {

				// Get media attachment details from the frame state
				var attachment = frame.state().get('selection').first().toJSON();

				// Send the attachment URL to our custom image input field.
				fileContainer.html( '<a href="'+attachment.url+'" title="'+attachment.title+'" target="_blank">'+attachment.title+'</a>' );

				// Send the attachment id to our hidden input
				fileIdInput.val( attachment.id );
				// Hide the add image link
				addFileLink.addClass( 'hidden' );

				// Unhide the remove image link
				delFileLink.removeClass( 'hidden' );
			});

			// Now display the actual frame
			frame.open();

		});

		delFileLinks.on( 'click', function( e ) {
			e.preventDefault();

			var delFileLink = $(this),
				fileFieldWrapper = delFileLink.parents('.set-person-file-wrapper'),
				addFileLink = fileFieldWrapper.find('.add-person-file'),
				fileContainer = fileFieldWrapper.find('.person-file-container'),
				fileIdInput = fileFieldWrapper.find('.person-file-id');

			fileContainer.html('');
			fileIdInput.val('');
			delFileLink.addClass('hidden');
			addFileLink.removeClass('hidden');
		});

	});

})( jQuery );
