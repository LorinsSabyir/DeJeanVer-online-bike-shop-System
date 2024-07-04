<?php
include 'backend/product_cont.php';

// Usage example
$productController = new ProductController();

// Fetch products based on the selected type
$prodType = $productController->readByType(1);

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
  <link href="/bootstrap/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- external CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/homepage.css">
  <link rel="stylesheet" href="css/bikes.css">

  <style>
    .bg-cover {
      background-image: url('website\ images/mtb-bg-1.jpg');
      /* Replace with your image URL */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 60vh;
      /* Full height */
      width: 100%;

      /* Full width */
    }
  </style>

  <title>Bikes</title>
</head>

<body style="font-family: 'Ropa Sans', sans-serif !important;">
  <!-- header section start -->
  <header class="header_section fixed-top ">
    <!-- TODO link -->
    <div class="container-fluid bg-black justify-content-end d-flex justify-content-end p-0 align-items-center">
      <a class="px-5 rounded-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708" />
        </svg>
      </a>
      <a class="btn btn-secondary rounded-0 text-white-50 px-5" href="login_index.php" role="button">SIGN IN</a>
    </div>
    <!-- navbar section start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom p-0 nav-underline">
      <div class="container-fluid">
        <a class="navbar-brand mx-5" href="index.php">
          <img src="website images\logof.png" alt="Bootstrap" width="70" height="60">
        </a>
        <button class="navbar-toggler mx-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
            <li class="nav-item">
              <a class="nav-link mx-4 active" aria-current="page" href="bikes_index.php">Bikes</a>
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
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
              </svg>
            </button>
          </form>
        </div>
      </div>
    </nav>
    <!-- navbar section end -->
  </header>
  <!-- navbar section end -->

  <!-- START BACKGROUND IMAGE COVER -->


  <div class="bg-cover d-flex align-items-center justify-content-start p-5">
    <div class="text-center  text-white">
      <h1>BIKES</h1>
    </div>
  </div>
  <!-- END BACKGROUND IMAGE COVER -->

  <!-- main section start -->
  <main>
    <!-- Starts of Cards  -->

    <div class="container-fluid mt-5 p-5">

      <div class="row">

        <?php if ($prodType) : ?>
          <?php foreach ($prodType as $product) : ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
              <div class="card shadow h-100">
                <div class="img-product p-3">
                  <img src="product_images/<?php echo htmlspecialchars($product['prodImg']); ?>" alt="<?php echo htmlspecialchars($product['prodImg']); ?>" style="width:240px; height:auto; margin:10px;">
                </div>
                <div class="card-body p-3 d-flex flex-column">
                  <h5 class="card-title text-center fw-bolder"><?php echo htmlspecialchars($product['prodName']); ?></h5>
                  <p class="card-text"><?php echo htmlspecialchars($product['prodDesc']); ?></p>
                  <div class="d-flex justify-content-between mt-auto">
                    <div class="flex-grow-1 p-1">
                      <button type="button" class="btn btn-outline-secondary w-100 price-btn">₱ <?php echo htmlspecialchars($product['prodPrice']); ?></button>
                    </div>
                    <div class="cart p-2">
                      <a href="login_index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#5BAEB7" class="bi bi-cart3" viewBox="0 0 16 16">
                          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="6">No products found for the selected type.</td>
          </tr>
        <?php endif; ?>

      </div>

    </div>


    <!-- End of Cards  -->
  </main>
  <!-- main section end -->

  <!-- footer section start -->
  <div class="footer">
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024 Company, Inc</p>

        <a href="#" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
          </svg>
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
  <script src="/bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>