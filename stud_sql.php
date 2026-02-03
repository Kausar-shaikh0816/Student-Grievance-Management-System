<?php
$servername = "localhost";
$username = "root"; // Change this if your MySQL has a different username
$password = ""; // Change if your MySQL has a password
$dbname = "grievance_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing password for security

    // Prepare and bind SQL statement
    $sql = "INSERT INTO students (name, roll_no, email, phone, department, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $roll_no, $email, $phone, $department, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='stud_home.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }
        // Set session for the new user
        $_SESSION['student_id'] = $student_id;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $stmt->close();
    
}

$conn->close();
?>

