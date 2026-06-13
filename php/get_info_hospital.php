<?php
$conn = new mysqli("localhost", "root", "", "snake_rescue");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM hospitals ORDER BY id DESC";
$result = $conn->query($sql);

$hospitals = [];

while ($row = $result->fetch_assoc()) {
    $row['image'] = 'uploads/' . $row['image']; // image path set
    $hospitals[] = $row;
}

header('Content-Type: application/json');
echo json_encode($hospitals);
?>
