

$('.btn--primary').click(function(event) {
    // Preventing default action of the event
    event.preventDefault();
    // Getting the height of the document
    var n = $(document).height();
	$('html, body').animate({
		scrollTop: $("#page-2").offset().top
	}, 2000);                                 
});