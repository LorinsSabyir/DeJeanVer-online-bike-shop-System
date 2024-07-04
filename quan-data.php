<?php
// Database connection using PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bikeshop";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch product data from the database
    $stmt = $pdo->prepare("SELECT prodName, prodQuant FROM product");
    $stmt->execute();
    $productData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($productData)) {
        // If no data, return a message or an empty array
        $productData = array("message" => "No product data found");
    }

    // Return product data as JSON
    echo json_encode($productData);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
