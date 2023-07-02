<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Library Management Systen</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('user/assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('user/assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('user/assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user/assets/img/favicons/favicon.png')}}">
    <link rel="manifest" href="{{asset('assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{asset('assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{asset('user/assets/css/theme.css')}}" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="/"><img src="user/assets/img/logo-ct.png" height="31" alt="logo" /> Library Management System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#search">Search Book</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#BookList">Book lists</a></li> 
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#features">Features</a></li>
            </ul>
            <div class="d-flex ms-lg-4">
            @if (Route::has('login'))
                    @auth
                        <a  href="{{ url('/dashboard') }}" class="btn btn-secondary-outline" href="#!">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-secondary-outline" href="#!">Sign In</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-warning ms-3" href="#!">Sign Up</a>
                        @endif
                    @endauth
                
            @endif</div>
          </div>
        </div>
      </nav>
      <section class="pt-7">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
              <h1 class="mb-4 fs-9 fw-bold">Unlock the World of Knowledge</h1>
              <p class="mb-6 lead text-secondary">Whether you're a student, an avid reader, or a knowledge seeker, our Library Management System is here to cater to your needs.<br class="d-none d-xl-block" />rom classic novels to contemporary bestsellers, from academic references to research materials, we've got it all.<br class="d-none d-xl-block" />in one place! The most intuitive way to imagine</p>
              <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="#search" role="button">Get started</a></div>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="user/assets/img/hero/hero-img.png" alt="" /></div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5 pt-md-9 mb-6" id="search">

        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(user/assets/img/category/shape.png);opacity:.5;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <h1 class="fs-9 fw-bold mb-4 text-center"> Search Any book <br class="d-none d-xl-block" />and check if it available</h1>
        
                <form action="{{ route('search') }}" method="GET">
            <div class="row">
              <div class="col-md-4"></div>
                <div class="col-md-4 col-sm-12">
                    <input type="text" class="form-control" name="search" id="search-input">
                </div>
                <div class="col-md-4 col-sm-12">
                    
                    <input class="btn btn-warning align-items-baseline" type="submit" value="Search">
                </div>
            </div>
        </form>
       
          
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5" id="BookList">
      <h1 class="fs-9 fw-bold mb-4 text-center">Some of Our Books</h1>
     

        <div class="container">
             <div class="row">
                
                @foreach ($books as $book)
                <div class="col-md-2">
                    <div class="card">
                    <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top img-fluid" alt="{{$book->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">{{$book->genre}}</p>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5" id="features">

        <div class="container">
          <div class="row">
            <div class="col-lg-6"><img class="img-fluid" src="user/assets/img/manager/manager.png" alt="" /></div>
            <div class="col-lg-6">
              <h5 class="text-secondary">Library Management System</h5>
              <p class="fs-7 fw-bold mb-2">Features</p>
              <p class="mb-4 fw-medium text-secondary">
              Library Management System typically offers a range of features to efficiently manage library operations and enhance the user experience.
              </p>
              <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="user/assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary">User Management and Profilesenergy again.</p>
              </div>
              <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="user/assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary">Search Functionality</p>
              </div>
              <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="user/assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary">Reporting and Analytics</p>
              </div>
              <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="user/assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary"> Borrowing and Returning</p>
              </div>
              <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="user/assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary">Catalog Management. Include metadata such as titles, authors, ISBN/ISSN, descriptions, and cover images. and Also storck</p>
                
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->








      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-md-11 py-8" id="superhero">

        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top" style="background-image:url(user/assets/img/superhero/oval.png);opacity:.5; background-position: top !important ;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <h1 class="fw-bold mb-4 fs-7">Need your own School Library Management System?</h1>
              <p class="mb-5 text-info fw-medium">Do you require some help for your project: Conception workshop,<br />prototyping, development, landing page?</p>
              <a class="btn btn-warning btn-md" href="http://wa.me/919915806899">Contact our expert</a>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->






      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pb-2 pb-lg-5">

        <div class="container">
          <div class="row border-top border-top-secondary pt-7">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img class="mb-4" src="{{asset('user/assets/img/logo-ct.png')}}" width="50" alt="" /></div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2">
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Search Book</a></li>
                
              
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-4 order-md-4 order-lg-3">
            <ul class="list-unstyled mb-0">
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Features</a></li>
</ul>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0 order-2 order-md-2 order-lg-4">
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">book Lists</a></li>
              <ul>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="text-center py-0">

        <div class="container">
          <div class="container border-top py-3">
            <div class="row justify-content-between">
              <div class="col-12 col-md-auto mb-1 mb-md-0">
                <p class="mb-0">&copy; 2023 PNA Web Tech </p>
              </div>
              <div class="col-12 col-md-auto">
                <p class="mb-0">
                  Made with<span class="fas fa-heart mx-1 text-danger"> </span>by <a class="text-decoration-none ms-1" href="https://themewagon.com/" target="_blank">PNA WEB TECH</a></p>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


   


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script>
    function updateSearchHref() {
        var searchInput = document.getElementById('search-input');
        var searchButton = document.querySelector('.btn-search');

        var searchValue = encodeURIComponent(searchInput.value);
        var href = searchButton.getAttribute('href');

        href = href.split('?')[0] + '?search=' + searchValue;
        searchButton.setAttribute('href', href);
    }
</script>
    <script src="user/vendors/@popperjs/popper.min.js"></script>
    <script src="user/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="user/vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="user/vendors/fontawesome/all.min.js"></script>
    <script src="user/assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
  </body>

</html>