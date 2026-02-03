<?php
session_start();
include 'db_connection.php'; // Database connection

$admin_id = $_SESSION['admin_id']; // Ensure admin is logged in
$message = "";

// Fetch current admin details
$result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id='$admin_id'");


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    
    // Check if password is entered
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE admin SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE admin_id='$admin_id'";
    } else {
        $sql = "UPDATE admin SET name='$name', email='$email', mobile='$mobile' WHERE admin_id='$admin_id'";
    }

    if (mysqli_query($conn, $sql)) {
        $message = "<div class='alert alert-success'>Profile updated successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('assets/setting.jpg'); /* Change to your image path */
    background-size: cover; /* Make image fit the screen */
    background-position: center;
    background-repeat: no-repeat;
    height: 80vh; /* Full height */
        }
        .container {
            max-width: 500px;
            margin-top: 40px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Admin Settings</h2>
        <?php echo $message; ?>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $admin['name'] ?? ''; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $admin['email'] ?? ''; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile:</label>
                <input type="text" name="mobile" class="form-control" value="<?php echo $admin['mobile'] ?? ''; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">New Password (leave blank if not changing):</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-custom w-100">Update Profile</button>
        </form>
        <div class="text-center mt-3">
            <a href="admin_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
