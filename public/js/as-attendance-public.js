(function( $ ) {
	'use strict';

	$(function() {
		$('.datepicker').datepicker({
			firstDay: 1,
			dateFormat: "dd/mm/yy",
			buttonImage: "/wp-admin/images/date-button.gif",
			buttonImageOnly: true,
			showOn: "both"
		});
		$('.attendees-table').find('.add_annotation').on('click', function(e){
			e.preventDefault();
			var _target = $(this).data('target');
			$(_target).removeClass('closed');
			$(this).hide();
		});
	});

})( jQuery );
