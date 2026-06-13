
<?php

$db = new mysqli("localhost", "root", "", "snake_rescue");

$name = $_POST['name'];
$location = $_POST['location'];
$time = $_POST['time'];
$contact = $_POST['contact'];
$hospital_image= $_FILES['image'];
$tmpLoc = $hospital_image['tmp_name'];
$binary="";
if ($tmpLoc=="") {
  $binary="";
}else {
  $binary = addslashes(file_get_contents($tmpLoc));
}
 $INSERTsQL = "INSERT INTO doctors (name,location,hostipal_time,contact,image)VALUES('$name','$location','$time'
            ,'$contact','$binary')";
            $insertRES =  $db->query($INSERTsQL);
            if ($insertRES) {
              http_response_code(200);
              $res=[ "isCreated" =>true, "msg"=>"Successs"];
              echo json_encode($res);
            }else {
              http_response_code(501);
              $res=["isCreted" =>false,"msg"=>"Internal Server Error "];
              echo json_encode($res);
            };




?>
