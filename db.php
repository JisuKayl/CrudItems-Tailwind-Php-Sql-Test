<?php
$mysqli = new mysqli("localhost", "root", "mysql", "items_db");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
