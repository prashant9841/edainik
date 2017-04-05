require('./bootstrap');
require('./pace');
require('./wow.min');
require('./materialize');

// require ("materialize-css/dist/js/materialize");



(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();

  }); // end of document ready
})(jQuery); // end of jQuery name space