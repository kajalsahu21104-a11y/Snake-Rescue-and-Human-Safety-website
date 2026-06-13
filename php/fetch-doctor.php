<?php
$conn = new mysqli("localhost", "root", "", "snake_rescue");
$result = $conn->query("SELECT * FROM doctors ORDER BY id DESC");
$output = "";
while ($row = $result->fetch_assoc()) {
  $output .= "<tr>
    <td>{$row['name']}</td>

  </tr>";
}
echo $output;
?>
