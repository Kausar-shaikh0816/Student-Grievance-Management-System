<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grievance Support System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: url('assets/group.jpg') no-repeat center center fixed;
            background-size: cover;
            color:rgb(0, 0, 0);
            backdrop-filter: blur(1px);
            backdrop-filter: brightness(50%); /* Darkens the image */;
        }
        .about{
          text-align: center;
        }
        .navbar {
            font-weight: bold;
            padding: 15px 20px;
        }
        .icon-box {
            background-color:rgb(0, 0, 0);
            color: white;
            padding: 30px;
            margin: 20px;
            border-radius: 10px;
        }

        .icon-box i {
            font-size: 50px;
        }

        .features-section {
            background-color: transparent white;
            padding: 60px 0;
        }
        .how-it-work{
          
          color: aliceblue;
        }
        .navbar-brand,
        .navbar-nav .nav-link {
            color: white !important;
            font-size: 1.2rem;
        }

        .navbar-nav .nav-link:hover {
            color:rgb(197, 197, 197) !important;
        }

        .hero-section {
            
            color: white;
            padding: 130px 0;
            text-align: center;
        }

        .content {
            background-color: rgba(176, 167, 167, 0.85);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .footer{
          background-color: aliceblue;
        }
        
        
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg "><!--sticky-top ,for fixing navbar-->
        <div class="container">
            <a class="navbar-brand" href="aboutus.php"><i class="bi bi-megaphone"></i> Grievance Support</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="aboutus.php"><i class="bi bi-info-circle"></i> About</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php"><i class="bi bi-tools"></i> Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactus.php"><i class="bi bi-envelope"></i> Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="registerDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-plus"></i> Register
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="stud_register.php">As Student</a></li>
                            <li><a class="dropdown-item" href="admin_register.php">As Admin</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Welcome to the Student Grievance Support System</h1>
            <p class="lead">A platform for students to voice their concerns and get resolutions promptly.</p>
            <a href="#about" class="btn btn-light btn-lg">Learn More</a>
        </div>
    </section>
   <!-- About Section -->
   <section id="about" class="py-5" style="background: rgba(0, 0, 0, 0.8);">
        <div class="container  text-white text-center"  >
            <h2 class="mb-4">About the Grievance Support System</h2>
            <p>The Student Grievance Support System aims to provide a streamlined process for students to file grievances
                and have them addressed by the concerned departments in a timely and efficient manner.</p>
        </div>
    </section>
     <!-- How It Works Section -->
     <section id="how-it-works" class="features-section" >
        <div class="container text-white text-center" >
            <h2 class="mb-4">How It Works</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="icon-box">
                        <i class="fas fa-file-alt"></i>
                        <h4>File a Grievance</h4>
                        <p>Students can easily file a grievance via the online portal, providing all necessary details about
                            the issue they are facing.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <i class="fas fa-cogs"></i>
                        <h4>Grievance Handling</h4>
                        <p>The grievance is forwarded to the relevant department (such as administration, faculty, or
                            facilities) for resolution. The department reviews the issue, investigates, and takes action.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <i class="fas fa-users-cog"></i>
                        <h4>Grievance Escalation</h4>
                        <p>If the grievance is not resolved within the stipulated time, it can be escalated to higher
                            authorities such as the student welfare officer or dean for further action.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="icon-box">
                        <i class="fas fa-check-circle"></i>
                        <h4>Resolution & Feedback</h4>
                        <p>Once the grievance is resolved, the student receives a resolution notification, and the system
                            requests feedback for further improvement of services.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <i class="fas fa-users"></i>
                        <h4>Anonymous Submissions</h4>
                        <p>For sensitive issues, students can submit grievances anonymously, ensuring their privacy is
                            protected while still receiving attention to their concerns.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <i class="fas fa-bullhorn"></i>
                        <h4>Public Updates</h4>
                        <p>Once grievances are resolved, key outcomes are made available to the general student body,
                            promoting transparency in handling grievances.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5" style="background: rgba(0, 0, 0, 0.8);">
        <div class="container text-center text-white">
            <h2 class="mb-4">Features of the System</h2>
            <div class="row">
                <div class="col-md-4">
                    <i class="fas fa-shield-alt fa-3x"></i>
                    <h4>Secure & Confidential</h4>
                    <p>Your grievances are handled with utmost confidentiality and security. Personal information is only
                        accessible to authorized personnel.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-sync fa-3x"></i>
                    <h4>Real-Time Updates</h4>
                    <p>Stay updated on the status of your grievance throughout the process. Notifications are sent when
                        your grievance progresses or is resolved.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-thumbs-up fa-3x"></i>
                    <h4>Efficient Resolution</h4>
                    <p>Get your issues resolved promptly by the concerned authorities, ensuring your time is respected
                        and your concerns are addressed.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <i class="fas fa-question-circle fa-3x"></i>
                    <h4>Guidance & Support</h4>
                    <p>If students are unsure about how to file a grievance, support staff is available to provide
                        guidance and ensure the process is smooth.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-comment-dots fa-3x"></i>
                    <h4>Student Interaction</h4>
                    <p>The platform allows students to interact with the grievance handling team, offering them an
                        opportunity to clarify details or provide additional information.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-chart-line fa-3x"></i>
                    <h4>Data-Driven Insights</h4>
                    <p>The system provides valuable insights on common grievance types and resolution times, helping
                        the institution improve services based on data analysis.</p>
                </div>
            </div>
        </div>
    </section>

   

    <!-- Contact Section -->
    <section id="contact" class="text-center text-white p-5" style="background: rgba(0, 0, 0, 0.8);">
        <h2>Contact Us</h2>
        <p>Email us at <a href="mailto:support@grievance.com" class="text-white">support@grievance.com</a></p>
    </section>

    <!-- Footer -->
    <footer class="text-center text-white p-3" style="background: #212529;">
        &copy; 2025 Student Grievance Support System | All Rights Reserved
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
