<?php


// Include necessary files
require "Validator.php";
require "Database.php";
$config = require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = new Database($config);

  // Data validation
  $errors = [];

  if (!Validator::username($_POST["username"])) {
    $errors["username"] = "Invalid username format";
  }
  if (!Validator::password($_POST["password"])) {
    $errors["password"] = "Password must be at least 6 characters long";
  }

  // Check if username already exists in the database
  $query = "SELECT * FROM users WHERE username = :username";
  $params = [":username" => $_POST["username"]];
  $result = $db->execute($query, $params)->fetch(PDO::FETCH_ASSOC);

  if ($result) {
    $errors["username"] = "Username already exists";
  }

  if (empty($errors)) {
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $params = [
      ":username" => $_POST["username"],
      ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
    ];
    $db->execute($query, $params);

    $_SESSION["flash"] = "You have successfully registered";
    header("Location: /login");
    exit(); // Use exit instead of die for consistency
  }
}

// Set the page title and include the view
$title = "Register";
require "views/register.view.php";
?>
