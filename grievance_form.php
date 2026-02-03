<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grievance_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $grievance_category = $_POST['grievance_category'];
    $grievance_description = $_POST['grievance_description'];

    $sql = "INSERT INTO grievances (student_name, student_email, grievance_category, grievance_description) 
            VALUES ('$student_name', '$student_email', '$grievance_category', '$grievance_description')";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grievance Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
</head>
<style>
/* General Page Styling */
body {
    background-color:rgb(235, 238, 241); /* Light gray background */
    font-family: Arial, sans-serif;
    background-image: url('assets/card3.jpg'); /* Change to your image path */
    background-size: cover; /* Make image fit the screen */
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh; /* Full height */
        }


/* Container Styling */
.container {
    max-width: 600px; 
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

/* Form Heading */
h2 {
    text-align: center;
    font-size: 26px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

/* Labels */
.form-label {
    font-weight: 600;
    color: #555;
}

/* Input Fields */
.form-control, .form-select {
    border-radius: 8px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ced4da;
}

/* Input Fields Focus Effect */
.form-control:focus, .form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Submit Button */
.btn-primary {
    width: 100%;
    padding: 12px;
    font-size: 18px;
    border-radius: 8px;
    background-color: #007bff;
    border: none;
    transition: 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Icons with Labels */
.form-label i {
    color: #007bff;
    margin-right: 5px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 90%;
        padding: 20px;
    }
}


    </style>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Submit Your Grievance</h2>
        <form action="" method="POST">
            <!-- Roll Number -->
            <div class="mb-3">
                <label for="roll_no" class="form-label"><i class="fas fa-id-badge"></i> Roll Number:</label>
                <input type="text" name="roll_no" class="form-control" required>
            </div>
            
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label"><i class="fas fa-user"></i> Name:</label>
                <input type="text" name="student_name" class="form-control" required>
            </div>
            
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" name="student_email" class="form-control" required>
            </div>
            
            <!-- Category -->
            <div class="mb-3">
                <label for="category" class="form-label"><i class="fas fa-list-alt"></i> Grievance Category:</label>
                <select name="grievance_category" class="form-select" required>
                    <option value="Academic">Academic</option>
                    <option value="Administration">Administration</option>
                    <option value="Facilities">Facilities</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            
            <!-- Grievance Description -->
            <div class="mb-3">
                <label for="description" class="form-label"><i class="fas fa-pen"></i> Grievance Description:</label>
                <textarea name="grievance_description" class="form-control" rows="4" required></textarea>
            </div>
            
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" onclick="showpop()" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
            </div>
        </form>
    </div>
    <script>
        function showpop(){
            alert('your complaint submit successsfully')
        }
    </script>
    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

