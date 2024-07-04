<?php 

  $dbServername = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "bikeshop";

  // Create Connection
  $conn = mysqli_connect( $dbServername, $dbUsername, $dbPassword, $dbName );

  // Check Connection
  if(!$conn)  {
    die("connection failed" . mysqli_connect_error());
  }