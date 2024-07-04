<?php
// Database connection
include 'database.php';

class ProductController {
  private $conn;

  // Constructor to initialize database connection
  public function __construct() {
    $this->conn = getDatabaseConnection();
  }

  // Create a new product
  public function create($name, $price, $quantity, $type, $photo_tmp_name, $photo_name, $description) {
    // Move product image into folder
    $photo_folder = '../product_images/' . basename($photo_name);

    if (move_uploaded_file($photo_tmp_name, $photo_folder)) {

      $query = "CALL CreateProduct(?, ?, ?, ?, ?, ?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("sdiiss", $name, $price, $quantity, $type, $photo_name, $description);

      if ($stmt->execute()) {
        return "<script>alert('Successfully added!');</script>";
      } else {
        return "<script>alert('Failed adding!');</script>";
      }

    } else {
      return "<script>alert('Failed to upload image!');</script>";
    }
  }

  // Read all products
  public function readAll() {
    $query = "CALL ReadAllProducts()";
    $result = $this->conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  // Read products by type
  public function readByType($type) {
    $query = "CALL ReadProductType(?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $type);
    $stmt->execute();
    
    // Fetch all results
    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);

    // Free the result set
    $result->free();

    // Ensure the statement is fully processed
    while ($this->conn->more_results()) {
      $this->conn->next_result();
      $this->conn->store_result();
    }

    return $products;
  }

  // admin notification
  public function notif() {
    $query = "SELECT checkout.user_id, checkout.name, checkout.method, checkout.total_amount, checkout.created_at FROM checkout LEFT JOIN admin_notif on checkout.id = admin_notif.id";
    $result = $this->conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  // Update a product
  public function update($id, $name, $price, $quantity, $photo_tmp_name, $photo_name, $description) {
    $photo_folder = 'product_images/' . basename($photo_name);
    if (move_uploaded_file($photo_tmp_name, $photo_folder)) {

      $query = "CALL UpdateProduct(?, ?, ?, ?, ?, ?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("isdiss", $id, $name, $price, $quantity, $photo_name, $description);
      if ($stmt->execute()) {
        return "<script>alert('Successfully updated!');</script>";
      } else {
        return "<script>alert('Failed updating!');</script>";
      }

    } else {
      return "<script>alert('Failed to upload image!');</script>";
    }
  }

  // Delete a product
  public function delete($id) {
    $query = "CALL DeleteProduct(?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
      return "Successfully deleted";
    } else {
      return "Failed deleting: " . $this->conn->error;
    }
  }
}