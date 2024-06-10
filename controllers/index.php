<?php
// Šis fails ir, lai izvadītu datus no datubāzes uz lapu
require "Database.php";
$config = require("config.php");

$db = new Database($config);

$query = "SELECT rooms.*, pricing.price, pricing.start_date, pricing.end_date 
          FROM rooms 
          LEFT JOIN pricing ON rooms.room_id = pricing.room_id 
          AND CURDATE() BETWEEN pricing.start_date AND pricing.end_date";
$params = [];

$rooms = $db->execute($query, $params)->fetchAll();
          
$title = "Room Catalog 🙂";
require "views/index.view.php";
?>