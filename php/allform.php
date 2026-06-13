<?php
$connect = new mysqli("localhost", "root", "", "snake_rescue");
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT * FROM hospitals";
$result = $connect->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode($data);
?>
