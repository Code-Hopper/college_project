<?php
$host = 'localhost';
$dbname = 'college_website';
$username = 'root';
$password = '';

// Create a database connection
$connection = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>