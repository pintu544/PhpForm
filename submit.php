<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$carOption = $_POST['carOption'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO Customers (name, phone, email, address, carOption) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $phone, $email, $address, $carOption);

// Execute query
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>
