<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: ../login_index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ropa+Sans:ital@0;1&display=swap" rel="stylesheet">
  <!-- bootstrap 5.3.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/footers/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="../bootstrap/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- external CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/homepage.css">

  <title>Homepage</title>
</head>
<body style="font-family: 'Ropa Sans', sans-serif !important;">
  <!-- header section start -->
  <header class="header_section fixed-top ">
    <!-- TODO link -->
    <div class="container-fluid bg-black justify-content-end d-flex justify-content-end p-0 align-items-center">
      <a class="px-5 rounded-0" href="cart_index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708"/>
        </svg>
      </a>
      <a class="btn btn-secondary rounded-0 text-white-50 px-5 mx-2" href="../login_index.php" role="button">SIGN IN</a>
      <a class="btn btn-danger rounded-0 text-white-50 px-5" href="../backend/logout.php" role="button">LOG OUT</a>
    </div>
    <!-- navbar section start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom p-0 nav-underline">
      <div class="container-fluid">
        <a class="navbar-brand mx-5" href="index.php">
          <img src="../website images\logof.png" alt="Bootstrap" width="70" height="60">
        </a>
        <button class="navbar-toggler mx-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
            <li class="nav-item">
              <a class="nav-link mx-4" aria-current="page" href="bikes_index.php">Bikes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-4" href="parts_index.php">Parts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-4" href="accessories_index.php">Accessories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-4" href="tools_index.php">Tools</a>
            </li>
          </ul>
          <form class="d-flex mx-5" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </button>
          </form>
        </div>
      </div>
    </nav>
    <!-- navbar section end -->
  </header>
  <!-- navbar section end -->

  <!-- carousel section start -->
  <div class="container-fluid p-0">
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../website images\home-bg-1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="../website images\home-bg-2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="../website images\home-bg.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- carousel section end -->

  <!-- main section start -->
  <main>
    <div class="container py-5">
      <div class="row">
        <div class="d-flex justify-content-center">
          <h1><b>PRODUCTS</b></h1>
        </div>
        <div class="col-lg-3 text-center">
          <img src="../website images/img-5.png" class="d-block w-100 car" alt="...">
          <h2 class="fw-normal" >Bikes</h2>
          <p><a class="btn btn-secondary" href="bikes_index.php">See more &raquo;</a></p>
        </div>
        <div class="col-lg-3 text-center">
        <img src="../website images/Part-1.png" class="d-block w-100 car" alt="...">
          <h2 class="fw-normal">Parts</h2>
          <p><a class="btn btn-secondary" href="parts_index.php">See more &raquo;</a></p>
        </div>
        <div class="col-lg-3 text-center">
          <img src="../website images/acce-1.png" class="d-block w-100 car" alt="...">
          <h2 class="fw-normal" >Accessories</h2>
          <p><a class="btn btn-secondary" href="accessories_index.php">See more &raquo;</a></p>
        </div>
        <div class="col-lg-3 text-center">
          <img src="../website images/tool-1.png" class="d-block w-100 car" alt="...">
          <h2 class="fw-normal" >Tools</h2>
          <p><a class="btn btn-secondary" id="add-to-cart-btn" href="tools_index.php">See more &raquo;</a></p>
        </div>
      </div>
    </div>
      
      <div class="container-fluid marketing w-100">
        <hr class="featurette-divider">
        <div class="container-fluid text-center bg-warning m-0">
          <h1><b>WHAT'S HOT?</b></h1>
        </div>
        <hr class="featurette-divider">
      </div>

    <div class="container py-5">
      <div class="row featurette p-5 d-flex flex-wrap align-items-center">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-body-secondary">It’ll blow your mind.</span></h2>
          <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
          <button type="button" class="button btn btn-primary" id="add-to-cart-btn">
            <span class="button__text">Shop now</span>
            <span class="button__icon"><svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24"><circle r="1" cy="21" cx="9"></circle><circle r="1" cy="21" cx="20"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg></span>
          </button>
        </div>
        <div class="col-md-5">
          <img src="../website images/bike-2.png" height="auto" width="400px">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette p-5 d-flex flex-wrap align-items-center">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-body-secondary">See for yourself.</span></h2>
          <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
          <button type="button" class="button btn btn-primary" id="add-to-cart-btn">
            <span class="button__text">Shop now</span>
            <span class="button__icon"><svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24"><circle r="1" cy="21" cx="9"></circle><circle r="1" cy="21" cx="20"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg></span>
          </button>
        </div>
        <div class="col-md-5 order-md-1">
          <img src="../website images/bike-3.png" height="auto" width="400px">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette p-5 d-flex flex-wrap align-items-center">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1 ">And lastly, this one. <span class="text-body-secondary">Checkmate.</span></h2>
          <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
          <button type="button" class="button btn btn-primary" id="add-to-cart-btn">
            <span class="button__text">Shop now</span>
            <span class="button__icon"><svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24"><circle r="1" cy="21" cx="9"></circle><circle r="1" cy="21" cx="20"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg></span>
          </button>
        </div>
        <div class="col-md-5">
          <img src="../website images/bike-4.png" height="auto" width="400px">
        </div>
      </div>
    </div>
  </main>
  <!-- main section end -->

  <!-- footer section start -->
  <div class="footer">
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024 Company, Inc</p>

        <a href="#" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="index.php" class="nav-link px-2 text-body-secondary">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
        </ul>
      </footer>
    </div>
  </div>
  <!-- footer section end -->

  <!-- bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- template bootstrap JS -->
  <script src="../bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>