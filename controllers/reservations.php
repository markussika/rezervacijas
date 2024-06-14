<?php
require "Database.php";
$config = require("config.php");



if (!isset($_SESSION['user'])) {
    header("Location: login");
    exit;
}

$db = new Database($config);

$user_id = $_SESSION['user'];

$query = "SELECT reservations.*, rooms.room_number, rooms.room_type 
          FROM reservations 
          JOIN rooms ON reservations.room_id = rooms.room_id 
          WHERE reservations.user_id = :user_id";
$params = ['user_id' => $user_id];

$reservations = $db->execute($query, $params)->fetchAll();


$title = "My Reservations";
require "views/reservations.view.php";
?>
