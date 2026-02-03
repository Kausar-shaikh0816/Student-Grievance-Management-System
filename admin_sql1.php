<?php
// Enable error reporting
session_start();
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
    $admin_password = password_hash(trim($_POST['admin_password']), PASSWORD_BCRYPT);
    $admin_full_name = trim($_POST['admin_full_name']);

    // Debug: Print received values
    if (empty($admin_name) || empty($admin_email) || empty($admin_password) || empty($admin_full_name)) {
        die("Error: One or more form fields are empty.");
    }

    // Insert into database
    $sql = "INSERT INTO admins (admin_name, admin_email, admin_password, admin_full_name) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("SQL preparation error: " . $conn->error);
    }

    $stmt->bind_param("ssss", $admin_name, $admin_email, $admin_password, $admin_full_name);

    if ($stmt->execute()) {
        // Get the last inserted admin ID
        $admin_id = $conn->insert_id;
        
        // Set session variables correctly
        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['admin_name'] = $admin_name;
        $_SESSION['admin_email'] = $admin_email;

        // Debug session values
        echo "<pre>Session Debug Info: ";
        print_r($_SESSION);
        echo "</pre>";

        // Redirect to admin home
        header("Location: admin_home.php");
        exit();
    } else {
        die("Error inserting data: " . $stmt->error);
    }
    $stmt->close();
}

$conn->close();
?>

