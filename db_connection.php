<?php
$servername = "localhost";
$username = "root"; // Change if different
$password = ""; // Change if needed
$dbname = "grievance_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
