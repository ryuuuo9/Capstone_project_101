<?php
$host = "localhost";
$user = "root";  // Default user ng XAMPP
$pass = "";  // Default walang password
$dbname = "capstone_db";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
