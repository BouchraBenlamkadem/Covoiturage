<!DOCTYPE html>
<html >
  <head>

    <title>Mchina!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/car.png" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/icomoon.css') }}">


    <link rel="stylesheet" href="{{ asset('/css/bootsnav.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick-theme.css') }}">



    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    
	  <nav style="height: 60px;padding-right: 0px;" class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container" style="margin-right: 0px;padding-right: 0px;margin-left: 97px;">
        <div class="col-sm-6">
	      <a class="navbar-brand"style="color: #f9be37 ;text-shadow: 0 0 2px #777777 , 0 0 3px #f9be37; font-size: 300%;" href="/">Mchina!</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
</div><div class="col-sm-6"style="padding-right: 0px;" >
	      <div class="collapse navbar-collapse" id="ftco-nav" >
        
	        <ul class="navbar-nav ml-auto">

	          <li class="nav-item active" ><a href="/" style="color: #f9be37 ;text-shadow: 0 0 1px #777777 , 0 0 2px #ffc33d; font-weight: 900;" class="nav-link">Accueil</a></li>

	<!--          <li class="nav-item"><a href="about.html"style="color: #f9be37 ;text-shadow: 0 0 1px #777777 , 0 0 2px #ffc33d;font-weight: 900;" class="nav-link">A propos</a></li> -->
	          <li class="nav-item"><a href="/trajets"style="color: #f9be37 ;text-shadow: 0 0 1px #777777 , 0 0 2px #ffc33d;font-weight: 900;" class="nav-link">Rechercher</a></li>
	          <li class="nav-item"style="width: 180px;"><a href="hotel.html"style="width: 100%;color: #f9be37 ;text-shadow: 0 0 1px #777777 , 0 0 2px #ffc33d;font-weight: 900;" class="nav-link">Proposer un trajet</a></li>
	          <li class="nav-item"><a href="contact.html"style="color: #f9be37 ;text-shadow: 0 0 1px #777777 , 0 0 2px #ffc33d;font-weight: 900;" class="nav-link">Inscription</a></li>
	          <li class="nav-item"><a href="blog.html"style="color: #f9be37 ;text-shadow: 0 0 1px #777777 , 0 0 2px #ffc33d;font-weight: 900;" class="nav-link">Connexion</a></li>
	        </ul></div>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
@yield('content')



    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script type="text/javascript">
    
    $(document).ready(function(){
  "use strict";
  $(".testimonial-carousel").slick({
          infinite: true,
          centerMode: true,
          autoplay:true,
          slidesToShow: 5,
          slidesToScroll: 3,
          autoplaySpeed:1500,
          // the magic
      responsive: [
        {

          breakpoint:1440,
          settings: {
          slidesToShow:3
          }

        },
        {

          breakpoint: 1024,
          settings: {
          slidesToShow:2,
          
          }

        }, 
        {

          breakpoint:991,
          settings: {
          slidesToShow:2,
          centerMode:false,
          }

        },
        {

          breakpoint:767,
          settings: {
          slidesToShow:1,
          }

        }
      ]
      });

});
  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  
  <script src="js/bootsnav.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/feather.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/waypoints.min.js"></script>

<script src="js/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  
  </body>
</html>