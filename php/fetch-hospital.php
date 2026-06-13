<?php
$conn = new mysqli("localhost", "root", "", "snake_rescue");
$result = $conn->query("SELECT * FROM hospitals ORDER BY id DESC");
if (!$result) {
  die("Query failed: " . $conn->error);
}
$output = "";
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $output .= "<tr>
      <td>{$row['name']}</td>
    </tr>";
  }
}
echo $output;
?>
<!-- // <td>

//   <button class='editBtn' data-id='{$row['id']}'>Edit</button>
//   <button class='deleteBtn' data-id='{$row['id']}'>Delete</button>
// </td> -->
