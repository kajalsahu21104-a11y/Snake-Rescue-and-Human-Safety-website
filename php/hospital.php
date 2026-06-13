<?php
$conn = new mysqli("localhost", "root", "", "snake_rescue");

if ($conn->connect_error) {
  die("Connection failed");
}

$name = $_POST['name'];
$location = $_POST['location'];
$fees = $_POST['fees'];
$time = $_POST['time'];
$doctor = $_POST['doctor'];
$contact = $_POST['contact'];

// Image Upload
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$folder = "uploads/" . uniqid() . "_" . basename($image);

if (move_uploaded_file($tmp_name, $folder)) {
  // Insert into database
  $sql = "INSERT INTO hospitals (name, location, fees, time, doctor, contact, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssss", $name, $location, $fees, $time, $doctor, $contact, $folder);

  if ($stmt->execute()) {
    echo $folder; // return image path
  } else {
    echo "error";
  }
} else {
  echo "error";
}
?>
