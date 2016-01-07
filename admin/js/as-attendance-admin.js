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
	});

})( jQuery );
