<?php
include('db_connection.php');
session_start();

// Check if the user is logged in (replace this with actual session validation)
$admin_id = 1; // For demonstration, we assume the admin ID is 1.

// Fetch current admin details from the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission to update the profile
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "UPDATE admin SET name = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $name, $email, $admin_id);

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Fetch the current profile details
    $query = "SELECT name, email FROM admin WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $admin_id);

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($name, $email);

    if ($stmt->fetch()) {
        // Profile data fetched successfully
    } else {
        echo "Admin not found!";
        exit;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-container h2 {
            text-align: center;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Edit Profile</h2>
        <form method="POST" action="">
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Full Name" required>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Email" required>
            <button type="submit">Update Profile</button>
        </form>
    </div>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>
