<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Grievance Support</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    body{ background-image: url('assets/card3.jpg'); /* Change to your image path */
    background-size: cover; /* Make image fit the screen */
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh; /* Full height */
    }   
</style>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <!-- Contact Form Section -->
        <div class="col-md-7">
            <div class="card shadow-lg p-4">
                <h3 class="text-center mb-3"><i class="fas fa-envelope"></i> Contact Us</h3>
                <p class="text-center">If you have any grievances or queries, feel free to reach out to us.</p>
                
                <form action="contact_process.php" method="POST">
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-user"></i> Your Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    
                    <!-- Email Field -->
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-envelope"></i> Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    
                    <!-- Subject Field -->
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-info-circle"></i> Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
                    </div>
                    
                    <!-- Message Field -->
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-comments"></i> Message</label>
                        <textarea name="message" rows="4" class="form-control" placeholder="Type your message here..." required></textarea>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Message</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contact Details Section -->
        <div class="col-md-5">
            <div class="card shadow-lg p-4">
                <h4 class="text-center mb-3"><i class="fas fa-address-book"></i> Contact Information</h4>
                <p><i class="fas fa-map-marker-alt"></i> Address: XYZ University, City, State, Zip Code</p>
                <p><i class="fas fa-phone"></i> Phone: +91 12345 67890</p>
                <p><i class="fas fa-envelope"></i> Email: support@grievancesystem.com</p>
                <p><i class="fas fa-clock"></i> Working Hours: Mon-Fri, 9:00 AM - 5:00 PM</p>

                <!-- Social Media Links -->
                <div class="text-center">
                    <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="btn btn-outline-info me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-outline-danger me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-dark"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
