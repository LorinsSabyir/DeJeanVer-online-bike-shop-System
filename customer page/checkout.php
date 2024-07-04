<?php

include '../backend/db.php';

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login_index.php");
    exit;
}

// Get user_id from session
$user_id = $_SESSION["id"];

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];
  
   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   
   
   if (mysqli_num_rows($cart_query) > 0) {
      while ($product_item = mysqli_fetch_assoc($cart_query)) {
          $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ') ';
          $product_price = $product_item['price'] * $product_item['quantity'];
          $price_total += $product_price;
      }
  }

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `checkout`(user_id, name, number, email, method, flat, street, city, state, country, pin_code, total_amount) VALUES('$user_id','$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$price_total')") or die('query failed');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
   <meta name="generator" content="Hugo 0.122.0">
   <!-- boostrap link -->
   <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link href="../bootstrap/assets/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Custom styles for this template -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
   <link href="../bootstrap/assets/css/dashboard.css" rel="stylesheet">

   <title>Checkout</title>

</head>

<body>

   <div class="container w-50">

      <section class="checkout-form">

         <h1 class="heading">Complete Your Order</h1>

         <form action="" method="post">

            <div class="display-order">
               <?php
               $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
               $total = 0;
               $grand_total = 0;
               $grand_total = 0;

               if (mysqli_num_rows($select_cart) > 0) {
                  while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                     // Calculate the total price for the current item
                     $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];

                     // Add the total price of the current item to the grand total
                     $grand_total += $total_price;
                  }

                  // Optionally format the grand total to 2 decimal places after accumulation
                  $formatted_grand_total = number_format($grand_total, 2);
               } else {
                  echo "Your cart is empty.";
               }
               ?>
               <div class="input-group mb-3">
                  <span class="input-group-text">Grand total : $</span>
                  <input type="number" class="form-control" name="total_amount" disabled aria-label="Amount (to the nearest dollar)" value="<?= $grand_total; ?>">
               </div>
            </div>

            <div class="flex">
               <div class="form-floating mb-3 inputBox">
                  <input type="name" name="name" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Enter Your Name</label>
               </div>
               <div class="form-floating mb-3 inputBox">
                  <input type="number" name="number" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Enter Your Contact Number</label>
               </div>
               <div class="form-floating mb-3 inputBox">
                  <input type="email" name="email" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Enter Your Email</label>
               </div>
               <div class="form-floating mb-3 inputBox">
                  <select name="method" class="form-select" id="floatingSelectGrid">
                     <option selected></option>
                     <option value="cash on delivery">Cash On Delivery</option>
                     <option value="credit card">Credit Card</option>
                     <option value="paypal">Paypal</option>
                  </select>
                  <label for="floatingSelectGrid">Enter Payment Method</label>
               </div>
               <div class="form-floating mb-3 inputBox">
                  <input type="text" name="flat" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Enter Your Flat</label>
               </div>
               <div class="form-floating mb-3 inputBox">
                  <input type="text" name="street" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Enter Your Street</label>
               </div>
               <div class="form-floating mb-3 inputBox">
                  <input type="text" name="city" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Enter Your City</label>
               </div>
               <div class="form-floating mb-3 inputBox">
                  <input type="text" name="state" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Enter Your State</label>
               </div>
               <div class="form-floating mb-3 inputBox">
                  <input type="text" name="country" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Enter Your Country</label>
               </div>
               <div class="form-floating mb-3 inputBox">
                  <input type="number" name="pin_code" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Enter Your Pin Code</label>
               </div>
            </div>
            <a href="cart_index.php" role="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
            <input type="submit" value="order now" name="order_btn" class="btn btn-primary">
         </form>

      </section>

   </div>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>