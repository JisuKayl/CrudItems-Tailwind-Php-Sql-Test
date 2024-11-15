<?php
require 'itemService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        addItem($_POST['name'], $_POST['description']);
        header("Location: crud.php");
        exit();
    } elseif (isset($_POST['update'])) {
        updateItem($_POST['id'], $_POST['name'], $_POST['description']);
        header("Location: crud.php");
        exit();
    }
}

if (isset($_GET['delete'])) {
    deleteItem($_GET['delete']);
    header("Location: crud.php");
    exit();
}

$item = null;
if (isset($_GET['edit'])) {
    $item = getItem($_GET['edit']);
}

$result = getAllItems();
?>
