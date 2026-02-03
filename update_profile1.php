<?php
session_start();
include 'db_connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['student_id'])) {
    echo "<script>alert('Session expired. Please log in again.'); window.location.href='login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['student_id'];
    $userName = trim($_POST['userName'] ?? '');
    $userEmail = trim($_POST['userEmail'] ?? '');

    if (empty($userName) || empty($userEmail)) {
        echo "<script>alert('Name and Email cannot be empty!'); window.history.back();</script>";
        exit();
    }

    // Check if the email already exists for another user
    $checkEmailQuery = "SELECT id FROM students WHERE email = ? AND id != ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("si", $userEmail, $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('This email is already in use by another account.'); window.history.back();</script>";
        exit();
    }

    // Proceed with updating the profile
    $sql = "UPDATE students SET name = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $userName, $userEmail, $id);

    if ($stmt->execute()) {
        // Update session variables
        $_SESSION['student_name'] = $userName;
        $_SESSION['student_email'] = $userEmail;

        echo "<script>alert('Profile updated successfully!'); window.location.href='stud_home.php';</script>";
    } else {
        echo "<script>alert('Profile update failed! Try again.'); window.history.back();</script>";
    }
}
?>
