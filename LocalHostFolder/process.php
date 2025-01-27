<?php
// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'cafe_serenity';

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully.";
}
?>
