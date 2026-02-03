<?php
session_start();
include 'db_connection.php';

// Check if student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Fetch student details from the database
$query = "SELECT name, email FROM students WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($student_name, $student_email);
    $stmt->fetch();
} else {
    $student_name = "Unknown";
    $student_email = "Unknown";
}

$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile & Grievance Submission</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            transition: background 0.3s ease, color 0.3s ease;
            background-image: url('assets/status.jpg'); /* Change to your image path */
    background-size: cover; /* Make image fit the screen */
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh; /* Full height */
        
        }
        .dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        .card:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
        
.btn-home {
    position: fixed;
    top: 10px;   /* Adjust for better spacing */
    right: 10px; /* Moves it to the right */
    background-color: #007bff;
    color: white;
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease;
    z-index: 9999; /* Keeps it on top */
}

.btn-home i {
    font-size: 16px;
}

.btn-home:hover {
    background-color: #0056b3;
}
/* Navbar Styling */
navbar {

    padding: 15px 20px;
    display: flex;
    justify-content: center;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

/* Style for Navigation List */
navbar ul {
    
    list-style: none;
    display: flex;
    gap: 20px;
    padding: 0;
    margin: 0;
}

/* Style for Navbar Items */
navbar ul li {
    display: inline;
}

/* Style for Navbar Links */
navbar ul li a {
    background-color: white;
    text-decoration: none;
    color: black;
    font-size: 16px;
    padding: 10px 15px;
    transition: 0.3s;
    border-radius: 5px;
}


/* Logout Button Styling */
.logout-btn {
    background-color: red;
    font-weight: bold;
}

.logout-btn:hover {
    background-color:#007bff;
}

</style>
</head>

<body>
<navbar>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="grievance_form.php">Submit Grievance</a></li>
        <li><a href="grievance_status.php">View Grievances</a></li>
        <li><a href="logout.php" class="logout-btn">Logout</a></li>
    </ul>
</navbar>

<style>
    .logout-btn {
        background-color: red;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
    }
    .logout-btn:hover {
        background-color: darkred;
    }
</style>

<a href="home.php" class="btn btn-primary btn-home"><i class="fas fa-home"></i> Back to Home</a>




   
 <!-- User Profile Card -->
<div class="card mt-4 p-4">
    <div class="d-flex align-items-center">
        <img src="assets/userp.png" alt="Profile Picture" class="profile-img me-4">
        <div>
            <h4 id="userName"><?php echo htmlspecialchars($student_name); ?></h4>
            <p id="userEmail"><?php echo htmlspecialchars($student_email); ?></p>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                <i class="fas fa-edit"></i> Edit Profile
            </button>
            <button class="btn btn-outline-primary">
                <a href="confirm_pass.php" class="text-decoration-none text-danger">
                    <i class="fas fa-key"></i> Change Password
                </a>
            </button>
        </div>
    </div>
</div>

  
<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProfileForm" action="update_profile1.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $_SESSION['student_id']; ?>">

                    <div class="mb-3">
                        <label for="editName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="userName" value="<?php echo htmlspecialchars($student_name); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="userEmail" value="<?php echo htmlspecialchars($student_email); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>




    <!-- Grievance Submission Section -->
    <div class="mt-5">
        <h2 class="text-primary"><i class="fas fa-file-alt"></i> Submit a Grievance</h2>
        <p>If you are facing any issues, please submit your grievance. Our team will review and resolve it as soon as possible.</p>

        <!-- Grievance Categories -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                    <h5 class="mt-3">Academic Issues</h5>
                    <p>Issues related to courses, syllabus, or faculty.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <i class="fas fa-bed fa-2x text-danger"></i>
                    <h5 class="mt-3">Hostel Complaints</h5>
                    <p>Problems regarding hostel facilities and accommodations.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <i class="fas fa-clipboard-check fa-2x text-success"></i>
                    <h5 class="mt-3">Exam & Results</h5>
                    <p>Complaints about examination or results.</p>
                </div>
            </div>
        </div>

        <!-- Additional Categories -->
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <i class="fas fa-university fa-2x text-warning"></i>
                    <h5 class="mt-3">Administration Issues</h5>
                    <p>Concerns regarding administration and policies.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <i class="fas fa-bullhorn fa-2x text-info"></i>
                    <h5 class="mt-3">Harassment Complaints</h5>
                    <p>Report any harassment or misconduct.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <i class="fas fa-cogs fa-2x text-secondary"></i>
                    <h5 class="mt-3">Technical Issues</h5>
                    <p>Issues related to campus WiFi, ID cards, etc.</p>
                </div>
            </div>
        </div>

        <!-- Grievance Tracking -->
        <div class="mt-4 text-center">
            <h5><i class="fas fa-search"></i> Already Submitted?</h5>
            <p>Track your grievance status.</p>
            <a href="grievance_status.php" class="btn btn-outline-primary">Check Grievance Status</a>
        </div>

        <!-- Submit Grievance -->
        <div class="text-center mt-4">
            <a href="grievance_form.php" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane"></i> Submit a New Grievance</a>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProfileForm">
                    <div class="mb-3">
                        <label for="editUserName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editUserName" value="John Doe">
                    </div>
                    <div class="mb-3">
                        <label for="editUserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editUserEmail" value="johndoe@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="
::contentReference[oaicite:0]{index=0}
 

