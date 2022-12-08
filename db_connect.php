
<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "123";
$dbName     = "pcs";

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>