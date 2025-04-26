<?php
// Define the database host 
$host = "localhost";

// Define the database username 
$user = "root";

// Define the database password
$pass = "";

// Define the name of the database to connect to
$db = "db_pms";

// Create a new MySQLi connection object using the provided credentials
$conn = new mysqli($host, $user, $pass, $db);

// Check if the connection to the database failed
if ($conn->connect_error) {
    // Terminate the script and display an error message if the connection fails
    die("Connection failed: " . $conn->connect_error);
}
?>
