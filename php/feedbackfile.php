<?php
// Database connection
$db = new mysqli("localhost", "root", "", "snake_rescue");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get data from form
$email = $_POST['email'];
$name = $_POST['name'];
$comments = $_POST['comments'];
$rating = $_POST['rating'];

// Step 1: Check if email exists in registration table
$checkQuery = "SELECT * FROM registration WHERE email = ?";
$stmt = $db->prepare($checkQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Not registered, redirect to registration page
    http_response_code(403);
    echo "not_registered";
    exit();
}

// Step 2: Insert feedback
$insertQuery = "INSERT INTO feedback (name, email, comments, rating) VALUES (?, ?, ?, ?)";
$stmt = $db->prepare($insertQuery);
$stmt->bind_param("sssi", $name, $email, $comments, $rating);

if ($stmt->execute()) {
    http_response_code(200);
    echo "feedback_submitted";
} else {
    http_response_code(500);
    echo "feedback_error";
}
?>
