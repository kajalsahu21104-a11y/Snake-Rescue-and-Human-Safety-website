<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "snake_rescue"; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM feedback ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding: 20px;
      background: #f2f2f2;
    }
    .container {
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      margin-bottom: 20px;
    }
    table {
      width: 100%;
    }
    thead {
      background-color: #007bff;
      color: white;
    }
    tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>All User Feedback</h2>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Name</th>
          <th>Comments</th>
          <th>Rating</th>
          <th>Submitted At</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          $sn = 1;
          while($row = $result->fetch_assoc()) {
            echo "<tr>
              <td>{$sn}</td>
              <td>".htmlspecialchars($row['email'])."</td>
              <td>".htmlspecialchars($row['name'])."</td>
              <td>".htmlspecialchars($row['comments'])."</td>
              <td>{$row['rating']} Stars</td>
              <td>{$row['submitted_at']}</td>
            </tr>";
            $sn++;
          }
        } else {
          echo "<tr><td colspan='5'>No feedback yet.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
