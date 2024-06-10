<?php
// Šis fails ir, lai pievienotu jaunas istabas datubāzei
require "Database.php";
$config = require("config.php");

$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle file upload
    $photo = $_FILES['photo'];
    $photoPath = 'controllers/uploads/' . basename($photo['name']);
    if (move_uploaded_file($photo['tmp_name'], $photoPath)) {
        $query = "INSERT INTO rooms (room_number, room_type, description, photo) VALUES (:room_number, :room_type, :description, :photo)";
        $params = [
            'room_number' => $room_number,
            'room_type' => $room_type,
            'description' => $description,
            'photo' => $photoPath
        ];

        $db->execute($query, $params);
        $room_id = $db->lastInsertId();

        $pricingQuery = "INSERT INTO pricing (room_id, price) VALUES (:room_id, :price)";
        $pricingParams = [
            'room_id' => $room_id,
            'price' => $price
        ];

        if ($db->execute($pricingQuery, $pricingParams)) {
            echo "Room successfully added!";
        } else {
            echo "Error adding room pricing.";
        }
    } else {
        echo "Error uploading photo.";
    }
}
require "views/create.view.php";
?>