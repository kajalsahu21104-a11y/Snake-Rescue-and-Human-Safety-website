<?php
session_start();
$db = new mysqli ("localhost","root","","snake_rescue");
if($db->connect_error){
 echo "database not connected";
 exit();
}

$email = $_POST['Email'];
$password = md5($_POST['Password']);


$sqlCode = "SELECT email FROM admin WHERE email='$email'";
$res = $db->query($sqlCode);
if($res->num_rows>0){

 $checkpassword = "SELECT email FROM admin WHERE
 email='$email' AND password='$password'";
 $passres = $db->query($checkpassword);
 if($passres->num_rows>0){
   $_SESSION['auth']=$email;
   // echo "success";
   header("Location:../html/admin.html");
 }else {
   echo "wrong password";
 }
}else {
 echo "User not found!!";
}
?>
