
<?php
session_start();
$db = new mysqli ("localhost","root","","snake_rescue");
if($db->connect_error){
 echo "database not connected";
 exit();
}

// Get hospital data by ID passed through URL
$hospitalId = $_GET['id'];
$sql = "SELECT * FROM hospital_admin WHERE id = $hospitalId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $data = $result->fetch_assoc();
} else {
  echo "No data found!";
  exit;
}

$conn->close();
?>

<?'<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Details</title>
  <style>
    body { font-family: Arial; background: #f5f5f5; padding: 20px; }
    .details { background: white; padding: 20px; max-width: 600px; margin: auto; border-radius: 10px; }
    img { max-width: 100%; height: auto; margin-top: 15px; border-radius: 5px; }
  </style>
</head>
<body>
  <div class="details">
    <h2>Hospital Info</h2>
    <p><strong>Hospital Name:</strong> <?= htmlspecialchars($data['hospital_name']) ?></p>
    <p><strong>Doctor Name:</strong> <?= htmlspecialchars($data['doctor_name']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></p>
    <p><strong>Fees:</strong> ₹<?= htmlspecialchars($data['fees']) ?></p>
    <p><strong>Timing:</strong> <?= htmlspecialchars($data['timing']) ?></p>
    <p><strong>Location:</strong> <?= htmlspecialchars($data['location']) ?></p>
    <p><strong>Mobile:</strong> <?= htmlspecialchars($data['mobile']) ?></p>
    <p><strong>Photo:</strong></p>
    <img src="<?= htmlspecialchars($data['photo']) ?>" alt="Doctor Photo">
  </div>
</body>
</html>
'?>
