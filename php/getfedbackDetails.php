<?php
$conn = new mysqli("localhost", "root", "", "snake_rescue");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sqlcode = "SELECT * FROM feedback";
$res = $conn->query($sqlcode);
if ($res->num_rows>0) {
  
      $alldata = [];
    while ($data = $res->fetch_assoc()) {
      array_push($alldata,$data);
    }
    http_response_code(200);
    $msg=["isDatafound"=>true,"data"=>$alldata];
echo json_encode($msg);
}else {
  http_response_code(404);
  echo json_encode(["isDatafound" => false, "msg" => "Data Not Found"]);
}


 ?>
