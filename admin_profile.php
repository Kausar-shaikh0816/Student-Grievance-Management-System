<?php
session_start();
include('db_connection.php'); // Ensure this file correctly connects to MySQL

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$admin_id = $_SESSION['admin_id']; // Get logged-in admin ID

// Fetch admin details from the database
$sql = "SELECT admin_name, admin_email, admin_full_name FROM admins WHERE id='$admin_id'";
$result = $conn->query($sql);

if (!$result) {
    die("Database query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc(); // Fetch admin details
} else {
    // If no record found, initialize $admin to prevent errors
    $admin = [
        'admin_name' => '',
        'admin_email' => '',
        'admin_full_name' => ''
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('assets/add.jpg'); /* Change to your image path */
    background-size: cover; /* Make image fit the screen */
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh; /* Full height */
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            font-weight: bold;
        }
        button a{ 
            text-decoration: none;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-black {
            background: #000;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn-black:hover {
            background:white;
            color: #000;
        }
        .logout {
            display: block;
            margin-top: 15px;
            color: #dc3545;
            text-decoration: none;
            font-size: 16px;
        }
        .logout:hover {
            text-decoration: underline;
        }
        .icon {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fa-solid fa-user-circle icon"></i> Admin Profile</h2>
        <form method="POST">
            <div class="form-group">
                <label for="admin_name"><i class="fa-solid fa-user icon"></i> Username:</label>
                <input type="text" id="admin_name" name="admin_name" class="form-control"  value="<?php echo htmlspecialchars($admin['admin_name']); ?>"required>
            </div>
            <div class="form-group">
                <label for="admin_email"><i class="fa-solid fa-envelope icon"></i> Email:</label>
                <input type="email" id="admin_email" name="admin_email" class="form-control" value="<?php echo htmlspecialchars($admin['admin_email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="admin_full_name"><i class="fa-solid fa-id-card icon"></i> Full Name:</label>
                <input type="text" id="admin_full_name" name="admin_full_name" class="form-control"  value="<?php echo htmlspecialchars($admin['admin_full_name']); ?>" required>
            </div>
            <button type="submit" class="btn btn-black"><i class="fa-solid fa-save icon"></i><a href="admin_home.php"> Update Profile</a></button>
        </form>
        <a href="logout.php" class="logout"><i class="fa-solid fa-sign-out-alt icon"></i> Logout</a>
    </div>
</body>
</html>




