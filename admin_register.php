


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - Grievance Support</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background:rgb(17, 17, 17);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 900px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }
        .info-section {
            background: url('assets/adminh.jpg') no-repeat center center;
    background-size: cover;  /* Ensures the image covers the section properly */
    backdrop-filter: brightness(20px);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .info-section h2 {
            color: white;
            font-weight: bolder;
        }
        .form-section {
            padding: 30px;
        }
        .btn-primary {
            background:rgb(9, 190, 240);
            border: none;
        }
        .btn-primary:hover {
            background:rgb(0, 0, 0);
        }
        .btn a{
            text-decoration: none;
            color:rgb(255, 255, 255);
        }
    </style>
</head>
<body>
    <div class="container row mx-auto">
        <!-- Left Section -->
        <div class="col-md-5 info-section d-flex flex-column justify-content-center">
            <h2>Admin Registration</h2>
            <p>Manage the grievance system, address student concerns, and ensure smooth functioning.</p>
        </div>

        <!-- Right Section -->
        <div class="col-md-7 form-section">
            <h2 class="text-center text-warning text-black">Admin Registration Form</h2>
            <form action="admin_sql1.php" method="POST">
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="admin_name" placeholder="Username" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" name="admin_email" placeholder="Email" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="admin_password" placeholder="Password" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                    <input type="text" class="form-control" name="admin_full_name" placeholder="Full Name" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button></a>
                <div class="text-center mt-2">
                    Already registered? <a href="login.html" class="text-warning">Login here</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
