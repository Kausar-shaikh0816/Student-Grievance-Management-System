<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grievance_system";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch unread notifications
$sql = "SELECT id, message, is_read FROM notifications ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);

$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

// Count unread notifications
$unreadCount = count(array_filter($notifications, fn($n) => $n['is_read'] == 0));

// Send JSON response
echo json_encode(["count" => $unreadCount, "notifications" => $notifications]);
$conn->close();
?>
