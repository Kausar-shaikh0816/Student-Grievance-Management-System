<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['student_id'])) {
    die("Unauthorized access!");
}

$student_id = $_SESSION['student_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST['student_name'];
    $new_email = $_POST['student_email'];

    // Update student details in the database
    $query = "UPDATE students SET name = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $new_name, $new_email, $student_id);

    if ($stmt->execute()) {
        header("Location: dashboard.php?msg=Profile updated successfully!");
    } else {
        header("Location: dashboard.php?msg=Error updating profile!");
    }
}
?>
