<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "snake_rescue";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM hospitals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-lg-4 col-md-6 col-sm-12 mb-4">';
        echo '<div class="card h-100 shadow">';
        echo '<img src="uploads/' . htmlspecialchars($row['image']) . '" class="card-img-top" style="height:200px; object-fit:cover;" alt="Hospital Image">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>';
        echo '<p><b>Location:</b> ' . htmlspecialchars($row['location']) . '</p>';
        echo '<p><b>Fees:</b> ' . htmlspecialchars($row['fees']) . '</p>';
        echo '<p><b>Time:</b> ' . htmlspecialchars($row['time']) . '</p>';
        echo '<p><b>Doctor:</b> ' . htmlspecialchars($row['doctor']) . '</p>';
        echo '<p><b>Contact:</b> ' . htmlspecialchars($row['contact']) . '</p>';
        echo '</div></div></div>';
    }
} else {
    echo "<p>No hospitals found.</p>";
}

$conn->close();
?>
