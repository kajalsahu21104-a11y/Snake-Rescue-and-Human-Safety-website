<?php

$db = new mysqli("localhost", "root", "", "snake_rescue");

$name = $_POST['name'];
$location = $_POST['location'];
$time = $_POST['time'];
$contact = $_POST['contact'];
$link = $_POST['link'];
$hospital_image = $_FILES['image'];

$tmpLoc = $hospital_image['tmp_name'];
$binary = "";

if ($tmpLoc == "") {
  $binary = "";
} else {
  $binary = addslashes(file_get_contents($tmpLoc));
}

$INSERTsQL = "INSERT INTO rescueteam
(name, location, hostipal_time, contact, link, image)
VALUES ('$name', '$location', '$time', '$contact', '$link', '$binary')";

$insertRES = $db->query($INSERTsQL);

if ($insertRES) {
  http_response_code(200);
  $res = ["isCreated" => true, "msg" => "Success"];
  echo json_encode($res);
} else {
  http_response_code(501);
  $res = ["isCreated" => false, "msg" => "Internal Server Error: " . $db->error];
  echo json_encode($res);
}

?>
