

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - Grievance Support</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background:rgb(0, 0, 0);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 900px;
            background:white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(10, 10, 10, 0.5);
            overflow: hidden;
        }
        .info-section {
    background: url('assets/studf.jpg') no-repeat center center;
    background-size: cover;  /* Ensures the image covers the section properly */

    color: white;
    padding: 100px;
    text-align:center;
    height: 100%; /* Make sure it takes full height */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.text-container h1,p{
backdrop-filter: brighness(1px);
}



        .info-section h2,p {
            color: black;
        }
        .form-section {
            padding: 30px;
        }
        .btn-primary {
            background:rgb(7, 154, 239);;
            border: none;
        }
        .btn-primary:hover {
            background:rgb(12, 12, 12);
        }
        .btn a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container row mx-auto">
        <!-- Left Section -->
        <div class="col-md-5 info-section">
            <div class="text-container">
            <h2>Welcome to Grievance Support</h2>
            <p >Raise your concerns efficiently. We are here to help.</p>
            </div>
        </div>

        <!-- Right Section -->
        <div class="col-md-7 form-section">
            <h2 class="text-center text-black text-warning" >Student Registration</h2>
            <form action="stud_sql1.php" method="POST">
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                    <input type="text" class="form-control" name="roll_no" placeholder="Roll Number" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    <input type="tel" class="form-control" name="phone" placeholder="Phone Number" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-building"></i></span>
                    <select class="form-select" name="department" required>
                        <option value="">Select Department</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Mechanical">Mechanical</option>
                        <option value="Civil">Civil</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
                <div class="text-center mt-2">
                    Already registered? <a href="login.php" class="text-warning">Login here</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>