<?php
$conn = new mysqli("localhost", "root", "", "grievance_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$status_result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $conn->real_escape_string($_POST['student_name']);
    $sql = "SELECT * FROM grievances WHERE student_name LIKE '%$student_name%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Grievance Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            transition: background 0.3s ease, color 0.3s ease;
            background-image: url('assets/gstatus.jpg'); /* Change to your image path */
    background-size: cover; /* Make image fit the screen */
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh; /* Full height */
        }
        
        .dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        .status-badge {
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-primary"><i class="fas fa-search"></i> Check Grievance Status</h2>
        <button class="btn btn-dark" id="darkModeToggle"><i class="fas fa-moon"></i> Dark Mode</button>
    </div>
    <p>Enter your name to check your grievance status.</p>

    <form action="" method="POST" class="mt-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="student_name" placeholder="Enter Your Name" required>
            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Check Status</button>
        </div>
    </form>

    <!-- Display Grievance Status -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div id="statusResult" class="mt-4 text-center">
            <?php if ($result->num_rows > 0): ?>
                <h5>Grievance Status</h5>
                <table class="table table-bordered mt-3">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Grievance ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['student_name'] ?></td>
                                <td><?= $row['grievance_category'] ?></td>
                                <td><?= $row['grievance_description'] ?></td>
                                <td>
                                    <span class="status-badge <?= $row['status'] == 'Resolved' ? 'bg-success' : ($row['status'] == 'In Progress' ? 'bg-warning text-dark' : 'bg-danger') ?>">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>
                                <td><?= $row['created_at'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-danger">No grievances found for this name.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('darkModeToggle').addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
</script>
</body>
</html>

<?php $conn->close(); ?>
