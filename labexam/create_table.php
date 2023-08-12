<?php
require 'config.php';


$conn= connect_db();
$sql="CREATE TABLE user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(200) NOT NULL,
    role VARCHAR(50) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table user created successfully";
       header("Location: login.html"); 
      } else {
        echo "Error creating table: " . $conn->error;
      }
      $conn->close();
?>