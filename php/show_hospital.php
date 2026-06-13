<!-- show_hospitals.php -->
<!-- <?php
$conn = new mysqli("localhost", "root", "", "snake_rescue");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM hospitals";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Hospital List</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    td, th {
      border: 1px solid #ccc;
      padding: 8px;
    }
    img {
      max-width: 100px;
      height: auto;
    }
  </style>
</head>
<body>
  <h2>All Hospital Details</h2>
  <table>
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Location</th>
        <th>Fees</th>
        <th>Time</th>
        <th>Doctor</th>
        <th>Contact</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // if ($result->num_rows > 0) {
      //   while($row = $result->fetch_assoc()) {
      //     echo "<tr>";
      //     echo "<td><img src='uploads/" . $row['image'] . "'></td>";
      //     echo "<td>" . $row['name'] . "</td>";
      //     echo "<td>" . $row['location'] . "</td>";
      //     echo "<td>" . $row['fees'] . "</td>";
      //     echo "<td>" . $row['time'] . "</td>";
      //     echo "<td>" . $row['doctor'] . "</td>";
      //     echo "<td>" . $row['contact'] . "</td>";
      //     echo "</tr>";
      //   }
      // } else {
      //   echo "<tr><td colspan='7'>No records found.</td></tr>";
      // }
      // ?>
    </tbody>
  </table>
</body>
</html> -->
