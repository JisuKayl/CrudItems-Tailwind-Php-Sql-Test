<?php
require 'db.php';

function addItem($name, $description) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO items (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $description);
    $stmt->execute();
    $stmt->close();
}

function updateItem($id, $name, $description) {
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE items SET name = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $description, $id);
    $stmt->execute();
    $stmt->close();
}

function deleteItem($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM items WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

function getItem($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();
    return $item;
}

function getAllItems() {
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM items");
    return $result;
}
?>
