$(document).ready(function() {
	$('.entry-id').click(function(e) {
		var entryId = $(this).attr('data-id');
		var posting = $.post('inc/vote.php', {id: entryId});

		posting.done(function( data ) {
		    // Need to output new vote count/show errors if any
		});
		e.preventDefault();
	});
});