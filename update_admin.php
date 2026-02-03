<?php
session_start();
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST['admin_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Check if password is provided
    if (!empty($password)) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "UPDATE admin SET name=?, email=?, phone=?, password=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssi", $name, $email, $phone, $password_hash, $admin_id);
    } else {
        $query = "UPDATE admin SET name=?, email=?, phone=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $name, $email, $phone, $admin_id);
    }

    if ($stmt->execute()) {
        $_SESSION['success'] = "Profile updated successfully!";
    } else {
        $_SESSION['error'] = "Error updating profile.";
    }

    header("Location: admin_profile.php");
    exit();
}
?>
