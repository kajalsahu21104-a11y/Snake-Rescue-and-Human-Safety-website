
<?php
$conn = new mysqli("localhost", "root", "", "snake_rescue");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM feedback ORDER BY id DESC");

if ($result->num_rows > 0) {
  echo "<table><tr>
  
  <th>Name</th>
  <th>Comments</th>
  <th>Rating</th>
  </tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" .
        // htmlspecialchars($row['email']) . "</td><td>" .
         htmlspecialchars($row['name']) . "</td><td>" .
         htmlspecialchars($row['comments']) . "</td><td>" .
         htmlspecialchars($row['rating']) . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No feedback yet.";
}

$conn->close();
?>
