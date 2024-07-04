<?php
include 'product_cont.php';

// Usage example
$productController = new ProductController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate name
  if (empty(trim($_POST["prodName"]))) {
    $prodName_err = "Please enter a product name.";
  } else {
    $prodName = trim($_POST["prodName"]);
  }

  // Validate price
  if (empty(trim($_POST["prodPrice"]))) {
    $prodPrice_err = "Please enter a product Price.";
  } else {
    $prodPrice = trim($_POST["prodPrice"]);
  }

  // Validate quantity
  if (empty(trim($_POST["prodQuant"]))) {
    $prodQuant_err = "Please enter a product quantity.";
  } else {
    $prodQuant = trim($_POST["prodQuant"]);
  }

  // Validate type
  if (empty(trim($_POST["prodType"]))) {
    $prodType_err = "Please enter a product type.";
  } else {
    $prodType = trim($_POST["prodType"]);
  }

  // Validate image
  if (empty($_FILES["prodImg"])) {
    $prodImg_err = "Please enter a product image.";
  } else {
    $prodImg = $_FILES["prodImg"];
  }
}

// Create a new product
if (isset($_POST['create'])) {
  $name = $_POST['prodName'];
  $price = $_POST['prodPrice'];
  $quantity = $_POST['prodQuant'];
  $type = $_POST['prodType'];
  $description = $_POST['prodDesc'];
  $photo_tmp_name = $_FILES['prodImg']['tmp_name'];
  $photo_name = $_FILES['prodImg']['name'];
  echo $productController->create($name, $price, $quantity, $type, $photo_tmp_name, $photo_name);
}

// Update a product (example)
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['prodName'];
  $price = $_POST['prodPrice'];
  $quantity = $_POST['prodQuant'];
  $description = $_POST['prodDesc'];
  $photo_tmp_name = $_FILES['prodImg']['tmp_name'];
  $photo_name = $_FILES['prodImg']['name'];
  echo $productController->update($id, $name, $price, $quantity, $photo_tmp_name, $photo_name, $description);
}

// Delete a product (example for id = 1)
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  echo $productController->delete($id);
}

// Read products by type
$type = isset($_GET['type']) ? (int)$_GET['type'] : null;
// Fetch products based on the selected type
$prodType =  $productController->readByType($type);

// Fetch and display all products
$products = $productController->readAll();
