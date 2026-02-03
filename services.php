<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .service-card {
            background: linear-gradient(135deg, #007bff, #6610f2);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin: 10px 0;
            text-align: center;
            font-size: 16px;
            transition: 0.3s;
        }
        .service-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Our Services</h2>
    <?php
    $services = [
        ["title" => "Online Grievance Submission", "desc" => "Submit grievances online and track them in real-time."],
        ["title" => "Real-Time Status Updates", "desc" => "Stay updated with instant grievance status updates."],
        ["title" => "Secure & Confidential", "desc" => "Your information is safe with advanced security."],
        ["title" => "Admin Review System", "desc" => "Grievances reviewed and resolved efficiently."],
        ["title" => "Multi-Department Support", "desc" => "Route grievances to the correct department."],
        ["title" => "User Support", "desc" => "Get assistance whenever you need help."]
    ];
    foreach ($services as $service) {
        echo "<div class='service-card'><h3>{$service['title']}</h3><p>{$service['desc']}</p></div>";
    }
    ?>
</div>

</body>
</html>
