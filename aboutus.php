<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Grievance Support System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: url('assets/aboutus1.jpg') center/cover no-repeat fixed;
            background-size: cover;
            color:rgb(239, 235, 235);
            backdrop-filter: blur(5px);
            backdrop-filter: brightness(70%); /* Darkens the image */;
            color: white;
            padding: 210px 0;
            text-align: center;
            font-weight: bolder;
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .icon {
            font-size: 50px;
            color: #007bff;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-black" >
            <h1><bold>About Us</bold></h1>
            <p>Your Voice Matters – We Ensure a Transparent & Fair Grievance Handling System</p>
        </div>
    </section>

    <!-- Information Cards -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <img src="assets/card1.jpg" class="card-img-top" alt="Our Mission">
                    <div class="card-body">
                        <h5 class="card-title">Our Mission</h5>
                        <p class="card-text">To provide students with a seamless grievance redressal platform ensuring quick resolutions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <img src="assets/card22.jpg" class="card-img-top" alt="Our Vision">
                    <div class="card-body">
                        <h5 class="card-title">Our Vision</h5>
                        <p class="card-text">To create a transparent and accessible grievance handling system for every student.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <img src="assets/card3.jpg" class="card-img-top" alt="Our Support">
                    <div class="card-body">
                        <h5 class="card-title">24/7 Support</h5>
                        <p class="card-text">Our dedicated team ensures that all student concerns are addressed promptly.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">How It Works</h2>
        <div class="row text-center">
            <div class="col-md-3">
                <i class="icon bi bi-pencil-square"></i>
                <h5>Step 1</h5>
                <p>Students submit grievances online through our secure portal.</p>
            </div>
            <div class="col-md-3">
                <i class="icon bi bi-search"></i>
                <h5>Step 2</h5>
                <p>The grievance is reviewed by the concerned department.</p>
            </div>
            <div class="col-md-3">
                <i class="icon bi bi-check-circle"></i>
                <h5>Step 3</h5>
                <p>The administration takes action and updates the student.</p>
            </div>
            <div class="col-md-3">
                <i class="icon bi bi-chat-dots"></i>
                <h5>Step 4</h5>
                <p>Students receive timely feedback and resolution status.</p>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Why Choose Us?</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow text-center p-3">
                    <i class="icon bi bi-speedometer2"></i>
                    <h5>Fast Resolution</h5>
                    <p>We ensure grievances are resolved within the shortest possible time.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow text-center p-3">
                    <i class="icon bi bi-lock"></i>
                    <h5>Secure & Confidential</h5>
                    <p>All grievances are handled with utmost security and privacy.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow text-center p-3">
                    <i class="icon bi bi-person-check"></i>
                    <h5>Student-Centric</h5>
                    <p>Our system is designed to prioritize student welfare and concerns.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS & Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</body>
</html>
