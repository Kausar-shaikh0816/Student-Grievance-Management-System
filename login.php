<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grievance_system";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "<pre>Debugging Start:</pre>"; // Debugging

    // Check if user is an admin
    $sql_admin = "SELECT * FROM admins WHERE admin_email = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("s", $email);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows == 1) {
        $admin = $result_admin->fetch_assoc();
        echo "<pre>Admin Found: "; print_r($admin); echo "</pre>"; // Debugging
        if (password_verify($password, $admin['admin_password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['admin_name'];

            echo "<script>window.location.href='admin_dashboard.php';</script>";
            exit();
        }
    }

    // Check if user is a student
    $sql_student = "SELECT * FROM students WHERE email = ?";
    $stmt_student = $conn->prepare($sql_student);
    $stmt_student->bind_param("s", $email);
    $stmt_student->execute();
    $result_student = $stmt_student->get_result();

    if ($result_student->num_rows == 1) {
        $student = $result_student->fetch_assoc();
        echo "<pre>Student Found: "; print_r($student); echo "</pre>"; // Debugging
        if (password_verify($password, $student['password'])) {
            $_SESSION['student_id'] = $student['id'];
            $_SESSION['student_name'] = $student['name'];

            echo "<script>window.location.href='stud_home.php';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect password!'); window.history.back();</script>";
            exit();
        }
    }

    // If no match found
    echo "<script>alert('Invalid email or password'); window.history.back();</script>";
    exit();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    body {
        background: url('assets/login.jpg') no-repeat center center fixed; 
        background-size: cover;
    }
    .container {
    display: flex;
    justify-content: flex-end; /* Pushes the form to the right */
    align-items: center;
    height: 100vh; /* Full height */
    padding-right: 50px; /* Adjust spacing from the right edge */
}

</style>

<body class="bg-light">

<div class="container ">
    <div class="card shadow-lg p-4" style="width: 350px;">
        
        <!-- Heading with Icon -->
        <div class="text-center mb-4">
            <i class="fas fa-user-circle fa-3x text-primary"></i>
            <h4 class="mt-2">Login</h4>
        </div>
        
        <form action="authanticate.php" method="POST">
            <!-- Username Field -->
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-user"></i> Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
            
            <!-- Password Field -->
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>
            
            <!-- Login Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </div>
        </form>

        <!-- Signup & Forgot Password Links -->
        <div class="text-center mt-3">
            <a href="register.php">Sign Up</a> | <a href="forgot_password.php">Forgot Password?</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
