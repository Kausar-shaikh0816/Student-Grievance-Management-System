<?php
session_start(); // Start session at the beginning

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $roll_no = trim($_POST['roll_no']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $department = trim($_POST['department']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT); // Hashing password for security

    // Prepare and bind SQL statement
    $sql = "INSERT INTO students (name, roll_no, email, phone, department, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $roll_no, $email, $phone, $department, $password);

    if ($stmt->execute()) {
        // ✅ Get the new student ID
        $student_id = $conn->insert_id;

        // ✅ Set session for the new user
        $_SESSION['student_id'] = $student_id;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        echo "<script>alert('Registration successful!'); window.location.href='stud_home.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
}

$conn->close();
?>
