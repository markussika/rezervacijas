<?php
// all_reservations.php

session_start();

// Check if the user is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

require "Database.php";
$config = require("config.php");

$db = new Database($config);

$query = "SELECT reservations.*, rooms.room_number, users.username
          FROM reservations
          JOIN rooms ON reservations.room_id = rooms.room_id
          JOIN users ON reservations.user_id = users.user_id";
$params = [];

$reservations = $db->execute($query, $params)->fetchAll();

$title = "All Reservations";
require "views/allReservations.view.php";
?>
