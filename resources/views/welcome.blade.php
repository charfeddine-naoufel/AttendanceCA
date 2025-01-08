<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Classy Academy</title>



  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/cssl/bootstrap.css')}}" />
  <!-- progress barstle -->
  <link rel="stylesheet" href="{{asset('assets/cssl/css-circular-prog-bar.css')}}">
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="{{asset('assets/cssl/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('assets/cssl/responsive.css')}}" rel="stylesheet" />




  <link rel="stylesheet" href="{{asset('assets/cssl/css-circular-prog-bar.css')}}">


</head>

<body>
  <div class="top_container">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="#">
            <img src="{{asset('assets/images/logo1.png')}}" alt="">
            <span>
              Classy Academy
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              {{-- <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html"> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="about.html"> About </a>
                </li>

                <li class="nav-item ">
                  <a class="nav-link" href="teacher.html"> Teacher </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="vehicle.html"> vehicle </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact Us</a>
                </li>

              </ul> --}}
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
        </nav>
      </div>
    </header>
    <section class="hero_section ">
      <div class="hero-container container">
        <div class="hero_detail-box">
          <h3>
            Bienvenu à  <br>
            l'application Presence-ca
          </h3>
          <h1>
            Classy Academy
          </h1>
          <p>
            Application web pour la gestion de présence des élèves de Classy Academy.
          </p>
          <div class="hero_btn-continer">
            @auth
            @else
            <a href="{{ route('login') }}" class="call_to-btn btn_white-border">
                <span>
                  Entrer
                </span>
                <img src="{{ asset('assets/images/right-arrow.png')}}" alt="">
              </a>
                

            
        @endauth
            
          </div>
        </div>
        <div class="hero_img-container">
          <div>
            <img src="{{ asset('assets/images/hero.png')}}" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end header section -->

  <!-- about section -->
  


  <!-- about section -->

  <!-- teacher section -->
 

  <!-- teacher section -->

  <!-- vehicle section -->
  


  <!-- vehicle section -->
  <!-- client section -->
  




  <!-- client section -->

  <!-- contact section -->

  


  <!-- end contact section -->

  <!-- admission section -->
 






  <!-- admission section -->


  <!-- landing section -->
  

  <!-- end landing section -->




  <!-- footer section -->
  
  <!-- footer section -->

  <script type="text/javascript" src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}"></script>

  
  <!-- google map js -->
  
  <!-- end google map js -->
</body>

</html>