// Normal Clicks
$(function() {
  $('.toggle-nav').click(function() {
    $('body').toggleClass('show-nav');
     return false;
  });

});


// Toggle with hitting of ESC
$(document).keyup(function(e) {
	if (e.keyCode == 27) {
   $('body').toggleClass('show-nav');
  }
});
