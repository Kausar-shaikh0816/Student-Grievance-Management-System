<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grievance_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure student is logged in
if (!isset($_SESSION['student_id'])) {
    die("Error: No student session found!");
}

$student_id = $_SESSION['student_id'];
$student_name = trim($_POST['student_name']);
$student_email = trim($_POST['student_email']);

// Update student data
$sql = "UPDATE students SET student_name = ?, student_email = ? WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $student_name, $student_email, $student_id);

if ($stmt->execute()) {
    // Update session
    $_SESSION['student_name'] = $student_name;
    $_SESSION['student_email'] = $student_email;
    echo "<script>alert('Profile updated successfully!'); window.location.href='student_dashboard.php';</script>";
} else {
    echo "<script>alert('Error updating profile: " . $stmt->error . "');</script>";
}

$stmt->close();
$conn->close();
?>
