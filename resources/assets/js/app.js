require('./bootstrap');
require('./pace');
// require('./wow');
require('./materialize');

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


        
    // $('.loader').fadeOut(400); 



    // $('.nav-open').on('click', function() {
    //     $('.page-header').addClass('show-it');
    //     $('#banner').addClass('show-it');
    //     console.log('0.21320');
    // });
    // $('.nav-close').on('click', function() {
    //     $('.page-header').removeClass('show-it');
    //     $('#banner').removeClass('show-it');
    //     console.log('1.21320');
    // });


   





    // $('.page-head h1 span').textillate(
    //     { in: {
    //         effect: 'flipInX',
    //         delay: 100
    //     } }
    // );

    // $('#contact-form').on('submit', function(event){
    //     event.preventDefault();
    //     var $this = $(this),
    //         formName = $this.find('#first_name').val(),
    //         formHoney = $this.find('#honey').val(),
    //         formEmail = $this.find('#email').val(),
    //         formMessage = $this.find('textarea').val();
       
    //     $.ajax({
    //         url: 'message.php',
    //         type: 'POST',
    //         data: {name: formName,honey:formHoney,email: formEmail,message: formMessage },
    //     })
    //     .done(function(data) {
    //         if(data==1)
    //         {
    //             alert('sent');
    //         } else {
    //             alert('Error');
    //         }
    //     })
    //     .fail(function() {
    //         console.log("error");
    //     });
        
    // });
}));

