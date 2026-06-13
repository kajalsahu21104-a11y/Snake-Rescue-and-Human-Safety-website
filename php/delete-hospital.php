<?php
$conn = new mysqli("localhost", "root", "", "snake_rescue");
$id = $_GET['id'];
$conn->query("DELETE FROM hospitals WHERE id=$id");
?>
