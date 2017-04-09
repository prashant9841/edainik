require('./bootstrap');
require('./pace');
// require('./wow');
require('./materialize');
require('./social');

// require ("materialize-css/dist/js/materialize");



  $(window).on('load', (function() {
    
    $('.button-collapse').sideNav();
    $('.parallax').parallax();



 	//const wow = new WOW({
	//   boxClass: 'wow',
	//   animateClass: 'animated',
	//   offset: 0,
	//   live: true
	// });

   $('ul.navigation li').append('<span></span>');

}));

