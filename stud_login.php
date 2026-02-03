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

    // Check if student exists
    $sql = "SELECT * FROM students WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $student = $result->fetch_assoc();
        
        // Debugging: Show fetched password
        echo "Stored Password: " . $student['password'] . "<br>";

        // Check password
        if (password_verify($password, $student['password'])) {
            $_SESSION['student_id'] = $student['id']; // Store student ID
            $_SESSION['name'] = $student['name']; // Store name
            header("Location: stud_home.php");
            exit();
        } else {
            echo "<script>alert('Invalid password'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No student found with this email'); window.history.back();</script>";
    }
    $stmt->close();
}
$conn->close();
?>

