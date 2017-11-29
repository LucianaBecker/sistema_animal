 $(document).ready(function() {
     $("#menu").mmenu({
       "extensions": [
          "fx-menu-zoom",
          "pagedim-black",
          "theme-dark"
       ]
    });
     $(".owl-carousel").owlCarousel({
     	loop:true,
  		margin:10,
  		nav:true,
  		items:1
     });

     $(".novoUsuario").click(function() {
      $(".cadastro").fadeIn();
      $("#login").hide();
     });

     $('#fisica').click(function() {
      $("#pessoa-fisica").fadeIn();
      $("#pessoa-juridica").hide();
     });

     $('#juridica').click(function() {
      $("#pessoa-juridica").fadeIn();
      $("#pessoa-fisica").hide();
     });
 });