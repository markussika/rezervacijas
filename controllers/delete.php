<?php
require "Database.php";
$config = require("config.php");

$db = new Database($config);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $query_pricing = "DELETE FROM pricing WHERE room_id = :room_id";
  $params_pricing = [ ":room_id" => $_POST["room_id"]];
  $db->execute($query_pricing, $params_pricing);

  $query_rooms = "DELETE FROM rooms WHERE room_id = :room_id";
  $params_rooms = [ ":room_id" => $_POST["room_id"]];
  $db->execute($query_rooms, $params_rooms);
}

header("Location: /");
die();