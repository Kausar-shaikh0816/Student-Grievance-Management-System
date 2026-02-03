<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    echo "Session not set. Debug info:";
    print_r($_SESSION); // Debug session values
    exit;
}


include 'db_connection.php';
// Fetch total students
$studentQuery = "SELECT COUNT(*) AS total_students FROM students";
$studentResult = mysqli_query($conn, $studentQuery);
$studentRow = mysqli_fetch_assoc($studentResult);
$totalStudents = $studentRow['total_students'];

// Fetch pending grievances
$pendingQuery = "SELECT COUNT(*) AS pending_grievances FROM grievances WHERE status = 'pending'";
$pendingResult = mysqli_query($conn, $pendingQuery);
$pendingRow = mysqli_fetch_assoc($pendingResult);
$pendingGrievances = $pendingRow['pending_grievances'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }
        .card {
            margin: 10px;
        }
        .card-header {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575d63;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Navbar */
        .navbar {
            padding: 10px 20px;
            background: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        /* Notification Bell */
        .btn-light.position-relative {
            transition: 0.3s ease-in-out;
        }
        .btn-light.position-relative:hover {
            background-color: #e9ecef;
        }
        .badge {
            font-size: 12px;
            font-weight: bold;
        }

        /* Profile Dropdown */
        .dropdown-menu {
            min-width: 200px;
        }
        .dropdown-menu a {
            padding: 10px 15px;
            font-size: 14px;
        }
        .dropdown-menu a:hover {
            background: #f1f1f1;
        }
        .shadow-sm {
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center text-white">Admin Dashboard</h4>
        <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="view_stud.php"><i class="fas fa-users"></i> Manage Students</a>
        <a href="view_grievance.php"><i class="fas fa-exclamation-circle"></i> Manage Grievances</a>
        <a href="manage_setting.php"><i class="fas fa-cogs"></i> Settings</a>
        <a href="home.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow-sm">
            <div class="container-fluid">
                <!-- Logo -->
                <img src="assets/adminlogo.jpg" alt="Admin Logo" class="img-fluid my-3" style="width: 60px;">
                <a class="navbar-brand fw-bold" href="#">Welcome, Admin</a>

                <div class="d-flex align-items-center">
                    <!-- Notifications Dropdown -->
                    <div class="dropdown me-3">
                        <button class="btn btn-light position-relative rounded-circle p-2 shadow-sm" id="notificationDropdown" data-bs-toggle="dropdown">
                            <i class="fas fa-bell fa-lg text-primary"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notifCount">0</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="notificationDropdown" id="notifList">
                            <li><a class="dropdown-item text-center" href="#">No new notifications</a></li>
                        </ul>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-light shadow-sm dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle fa-lg text-secondary"></i> Admin
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="admin_profile.php"><i class="fas fa-user"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="add_admin.php"><i class="fas fa-cogs"></i> Add admin</a></li>
                            <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dashboard Overview -->
         <!-- Dashboard Overview -->
         <div class="row">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-header">
                        <i class="fas fa-users"></i> Total Students
                    </div>
                    <div class="card-body">
                        <h3><?php echo $totalStudents; ?></h3>
                        <a href="view_stud.php" class="btn btn-light"><i class="fas fa-eye"></i>View Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white">
                    <div class="card-header">
                        <i class="fas fa-exclamation-circle"></i> Pending Grievances
                    </div>
                         <div class="card-body">
                        <h3><?php echo $pendingGrievances; ?></h3>
                        <a href="grievance_status.php" class="btn btn-light"><i class="fas fa-comments"></i> Resolve Grievances</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-header">
                        <i class="fas fa-cogs"></i> System Settings
                    </div>
                    <div class="card-body">
                        <a href="manage_setting.php" class="btn btn-light"><i class="fas fa-cogs"></i> Manage Settings</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Students Section -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <i class="fas fa-users"></i> Manage Students
                    </div>
                    <div class="card-body">
                        <p>View, edit, or add new student records.</p>
                        <a href="add_stud.php" class="btn btn-info"><i class="fas fa-user-plus"></i> Add New Student</a>
                        <a href="view_stud.php" class="btn btn-info"><i class="fas fa-eye"></i> View Students</a>
                    </div>
                </div>
            </div>

            <!-- Manage Grievances Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <i class="fas fa-exclamation-circle"></i> Manage Grievances
                    </div>
                    <div class="card-body">
                        <p>View, assign, or resolve grievances raised by students.</p>
                        <a href="view_grievance.php" class="btn btn-warning"><i class="fas fa-comments"></i> View Grievances</a>
                        <a href="grievance_form.php" class="btn btn-warning"><i class="fas fa-plus"></i> Add New Grievance</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Notifications -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <i class="fas fa-bell"></i> Recent Notifications
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>New grievance received from John Doe regarding the library system.</li>
                            <li>New student registration completed: Emma Watson.</li>
                            <li>Upcoming meeting with faculty on student engagement.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Notifications JavaScript -->
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            function fetchNotifications() {
                fetch("fetch_notifications.php")
                    .then(response => response.json())
                    .then(data => {
                        const notifCount = document.getElementById("notifCount");
                        const notifList = document.getElementById("notifList");

                        // Update count
                        notifCount.textContent = data.count;
                        notifCount.style.display = data.count > 0 ? "inline-block" : "none";

                        // Update dropdown list
                        notifList.innerHTML = data.notifications.length > 0 
                            ? data.notifications.map(n => `<li><a class="dropdown-item" href="#">${n.message}</a></li>`).join("")
                            : `<li><a class="dropdown-item text-center" href="#">No new notifications</a></li>`;
                    });
            }

            fetchNotifications();
            setInterval(fetchNotifications, 10000);
        });
        </script>
    </div>

    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

