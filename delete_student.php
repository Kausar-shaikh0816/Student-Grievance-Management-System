<?php
$conn = new mysqli("localhost", "root", "", "student_grievance");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Delete the student record
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);

    if ($stmt->execute()) {
        echo "<p class='alert alert-success'>Student deleted successfully!</p>";
    } else {
        echo "<p class='alert alert-danger'>Error deleting student: " . $stmt->error . "</p>";
    }
}

header("Location: admin_home.php"); // Redirect back to the dashboard after deletion
exit;
?>

<?php $conn->close(); ?>
