<!--
// Database connection
$db = new mysqli("localhost", "root", "", "snake_rescue");

// Check connection
if ($db->connect_error) {
    die("Database not connected: " . $db->connect_error);
}

// Ensure UTF-8 encoding
$db->set_charset("utf8");

// Get user query from GET method
$user_query = isset($_GET['query']) ? $_GET['query'] : '';

// Check if the user_query is empty
if (empty($user_query)) {
    echo "Please enter a query to search.";
    exit;
}

// Prepare the SQL query with LIKE for partial matching
$stmt = $db->prepare("SELECT question, answer FROM snakeawareness WHERE question LIKE ?");
$searchTerm = "%" . $user_query . "%";  // Add wildcards for partial match
$stmt->bind_param("s", $searchTerm);  // "s" stands for string

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='mb-3'>";
        echo "<h5 class='text-primary'>🟢 सवाल:</h5><p>" . htmlspecialchars($row['question']) . "</p>";
        echo "<h6 class='text-success'>📘 उत्तर:</h6><p>" . nl2br(htmlspecialchars($row['answer'])) . "</p>";
        echo "</div><hr>";
    }
} else {
    echo "<div class='alert alert-warning'>❗ कोई उत्तर नहीं मिला।</div>";
}
// Close the statement and connection
$stmt->close();
$db->close();
?> -->

<?php
$db = new mysqli("localhost", "root", "", "snake_rescue");

if ($db->connect_error) {
    die("Database not connected: " . $db->connect_error);
}

$db->set_charset("utf8mb4");

$user_query = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($user_query)) {
    echo "❗ कृपया एक सवाल टाइप करें।";
    exit;
}

$stmt = $db->prepare("SELECT question, answer FROM snakeawareness WHERE keyword LIKE ? OR question LIKE ?");
$searchTerm = "%" . $user_query . "%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='mb-3'>";
        echo "<h5 class='text-primary'>🟢 सवाल:</h5><p>" . htmlspecialchars($row['question']) . "</p>";
        echo "<h6 class='text-success'>📘 उत्तर:</h6><p>" . nl2br(htmlspecialchars($row['answer'])) . "</p>";
        echo "</div><hr>";
    }
} else {
    echo "<div class='alert alert-warning'>❗ कोई उत्तर नहीं मिला।</div>";
}

$stmt->close();
$db->close();
?>
