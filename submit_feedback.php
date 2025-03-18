<?php
// filepath: c:\xampp\htdocs\123\submit_feedback.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $feedback);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$stmt->execute();

echo "New feedback recorded successfully";

$stmt->close();
$conn->close();
?>