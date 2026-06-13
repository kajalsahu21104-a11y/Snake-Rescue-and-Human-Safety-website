<?php
$conn = new mysqli("localhost", "root", "", "snake_rescue");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM hospitals");

while ($row = $result->fetch_assoc()) {
  echo "<div class='card'>
          <img src='../uploads/{$row['image']}' alt='Hospital Image'>
          <div class='card-content'>
            <h3>{$row['name']}</h3>
            <p><strong>Location:</strong> {$row['location']}</p>
            <p><strong>Fees:</strong> {$row['fees']}</p>
            <p><strong>Time:</strong> {$row['time']}</p>
            <p><strong>Doctor:</strong> {$row['doctor']}</p>
            <p><strong>Contact:</strong> {$row['contact']}</p>
          </div>
        </div>";
}

$conn->close();
?>
<?'<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Directory</title>
  <link rel="stylesheet" href="../css/contactphonic.css">
</head>
<body>

  <h2>Hospital Directory</h2>

  <div class="container">
    <!-- PHP content loaded dynamically -->
    <?php include("load_hospitals.php"); ?>
  </div>

</body>
</html>
'?>
