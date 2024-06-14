<?php
// Šis fails ir, lai rezervētu istabas datubāzei
require "Database.php";
$config = require("config.php");

$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_id = $_POST['room_id'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $total_price = $_POST['total_price'];

    $query = "INSERT INTO reservations (room_id, check_in_date, check_out_date, total_price) VALUES (:room_id, :check_in_date, :check_out_date, :total_price)";
    $params = [
        'room_id' => $room_id,
        'check_in_date' => $check_in_date,
        'check_out_date' => $check_out_date,
        'total_price' => $total_price
    ];

    if ($db->execute($query, $params)) {
        echo "Room successfully reserved!";
    } else {
        echo "Error reserving room.";
    }
}

$rooms = $db->execute("SELECT * FROM rooms", [])->fetchAll();
$users = $db->execute("SELECT * FROM users", [])->fetchAll();
$title = "Reserve room";

require "views/reserve.view.php";
?>