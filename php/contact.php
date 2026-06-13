<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Directory</title>
  <link rel="stylesheet" href="../css/contactphonic.css">
</head>
<body>

  <h2>Hospital Directory</h2>

  <div class="container">
    <?php
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "snake_rescue");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Fetch all hospitals
    $sql = "SELECT * FROM hospitals ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>
                <img src='{$row["image"]}' alt='Hospital Image'>
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
    } else {
      echo "<p>No hospitals available.</p>";
    }

    $conn->close();
    ?>
  </div>

</body>
</html>
