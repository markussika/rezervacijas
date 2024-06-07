<?php

guest();

// Pieprasīt DB, config, Validator
require "Validator.php";
require "Database.php";
$config = require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = new Database($config);

  // Validācija datu
  //  1. e-pasts - burti, @, .lv beate@ckc.lv
  //  2. parole vismaz 6 string
  $errors = [];

  if (!Validator::username($_POST["username"])) {
    $errors["username"] = "Nepareiz lietotājvārda formāts";
  }
  if (!Validator::password($_POST["password"])) {
    $errors["password"] = "Parolē ir nepilnības";
  }
  // PĀRBAUDĪS, VAI datubāzē ir e-pasts
  // 
  $query = "SELECT * FROM users WHERE username = :username";
  $params = [":username" => $_POST["username"]];
  $result = $db->execute($query, $params)->fetch();

  if ($result) {
    $errors["username"] = "Konts jau pastāv";
  }

  if (empty($errors)) {
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $params = [
      ":username" => $_POST["username"],
      ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
    ];
    $db->execute($query, $params);

    $_SESSION["flash"] = "Tu esi veiksmīgi reģistrēts";
    header("Location: /login");
    die();
  }
}


// Ielikt DB

$title = "Register";
require "views/register.view.php";