<?php
session_start();
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "grievance_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get logged-in student ID
$student_id = $_SESSION['student_id']; // Ensure session contains student ID

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['student_name'];
    $userEmail = $_POST['student_email'];

    // Update the student record
    $sql = "UPDATE students SET name=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $userName, $userEmail, $student_id);

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

