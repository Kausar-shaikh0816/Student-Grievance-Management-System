<?php
$conn = new mysqli("localhost", "root", "", "student_grievance");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data and sanitize input
    $name = trim($_POST['name']);
    $roll_no = trim($_POST['roll_no']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $department = trim($_POST['department']);
    $password = $_POST['password'];

    // Check if any field is empty
    if (empty($name) || empty($roll_no) || empty($email) || empty($phone) || empty($department) || empty($password)) {
        echo "<p class='alert alert-danger'>All fields are required!</p>";
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the students table
    $sql = "INSERT INTO students (name, roll_no, email, phone, department, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ssssss", $name, $roll_no, $email, $phone, $department, $hashed_password);
        
        if ($stmt->execute()) {
            echo "<script>alert('Student added successfully!'); window.location.href='view_student.php';</script>";
        } else {
            echo "<p class='alert alert-danger'>Error adding student: " . $stmt->error . "</p>";
        }
        
        $stmt->close();
    } else {
        echo "<p class='alert alert-danger'>Query preparation failed: " . $conn->error . "</p>";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add New Student</h2>
        <form action="add_student.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="roll_no" class="form-label">Roll Number</label>
                <input type="text" name="roll_no" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" name="department" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
        <a href="admin_home.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>
</body>
</html>

