<?php
// Enable error reporting
session_start();
$_SESSION['admin_email'] = $admin['admin_email']; // Store admin ID after login
$_SESSION['admin_name'] = $admin['admin_name']; // Optional

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "grievance_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = trim($_POST['admin_name']);
    $admin_email = trim($_POST['admin_email']);
    $admin_password = password_hash(trim($_POST['admin_password']), PASSWORD_BCRYPT); // Hash password
    $admin_full_name = trim($_POST['admin_full_name']);

    // Debug: Print received values
    if (empty($admin_name) || empty($admin_email) || empty($admin_password) || empty($admin_full_name)) {
        die("Error: One or more form fields are empty.");
    }

    // Prepare SQL statement
    $sql = "INSERT INTO admins (admin_name, admin_email, admin_password, admin_full_name) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if statement prepared correctly
    if (!$stmt) {
        die("SQL preparation error: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssss", $admin_name, $admin_email, $admin_password, $admin_full_name);

    // Execute statement and check result
    if ($stmt->execute()) {
        echo "<script>alert('Admin registered successfully!'); window.location.href='admin_home.php';</script>";
    } else {
        die("Error inserting data: " . $stmt->error);
    }
    $stmt->close();
}

$conn->close();
?>

