
 <?php
 $db = new mysqli("localhost", "root", "", "snake_rescue");
 if ($db->connect_error) {
   die("Database not connected");
 }

 $fname = $_POST['fname'] ?? '';
 $email = $_POST['email'] ?? '';
 $address = $_POST['address'] ?? '';
 $gender = $_POST['gender'] ?? '';
 $mobile = $_POST['mobile'] ?? '';
 $password = $_POST['password'] ?? '';

 // Basic validation (avoid undefined indexes / empty inserts)
 if ($fname === '' || $email === '' || $password === '') {
   http_response_code(400);
   echo "missing_fields";
   exit;
 }

 $password = md5($password);

 // Check if email exists
 $checkQuery = "SELECT * FROM registration WHERE email = '$email'";
 $result = $db->query($checkQuery);

 if ($result->num_rows>0) {
   // Show modal if email exists
   http_response_code(409);
   echo "userExits";
   exit;
 } else {
   // Insert if email is new
   $sqlCode = "INSERT INTO registration(fname, email, address, gender, mobile, password)
                VALUES('$fname', '$email', '$address', '$gender', '$mobile', '$password')";

    $res = $db->query($sqlCode);

    if ($res) {
    http_response_code(200);
      echo "registration success";
    } else {
      http_response_code(500);
        echo "Internal Server Error";
    }
  }
  ?>
