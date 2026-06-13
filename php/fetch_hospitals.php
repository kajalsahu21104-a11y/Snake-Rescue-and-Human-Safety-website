<?php
$conn = new mysqli("localhost", "root", "", "snake_rescue");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$location = $_POST["location"];
$fees = $_POST["fees"];
$time = $_POST["time"];
$doctor = $_POST["doctor"];
$contact = $_POST["contact"];

$imageName = "";
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    if (in_array($_FILES["image"]["type"], $allowedTypes)) {
        $imageName = uniqid() . "_" . basename($_FILES["image"]["name"]);
        $targetDir = "uploads/";
        $targetFile = $targetDir . $imageName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    } else {
        die("Only JPG, PNG, and WEBP files are allowed.");
    }
}

$stmt = $conn->prepare("INSERT INTO hospitals (name, location, fees, time, doctor, contact, image)
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $location, $fees, $time, $doctor, $contact, $imageName);

if ($stmt->execute()) {
    echo "Hospital added successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
