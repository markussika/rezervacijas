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
    $error = '';

    // Check if room with the same number already exists
    $checkQuery = "SELECT COUNT(*) AS count FROM rooms WHERE room_number = :room_number";
    $checkParams = ['room_number' => $room_number];
    $checkResult = $db->execute($checkQuery, $checkParams)->fetch();
    if ($checkResult['count'] > 0) {
        $error = "A room with this number already exists.";
    } else {
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
            $query = "SELECT MAX(room_id) AS room_id FROM rooms";
            $result = $db->execute($query, []);
            $row = $result->fetch();
            $room_id = $row['room_id'];

            $pricingQuery = "INSERT INTO pricing (room_id, price) VALUES (:room_id, :price)";
            $pricingParams = [
                'room_id' => $room_id,
                'price' => $price
            ];

            if ($db->execute($pricingQuery, $pricingParams)) {
                echo "Room successfully added!";
                header("Location: /");
                exit;
            } else {
                $error = "Error adding room pricing.";
            }
        } else {
            $error = "Error uploading photo.";
        }
    }
}
require "views/create.view.php";
?>  