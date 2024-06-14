<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
      font-family: Arial, sans-serif;
      padding-top: 60px;
    }
    .navbarcol {
  transition: transform 250ms;
  color: honeydew;
}
.navbarcol:hover {
  transform: translateX(10px);
}
nav {
  margin-left: 50px;
  margin-right: 50px;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 50px;
  background: gray;
  border-bottom: 1px solid #000000;
}
  </style>
</head>
<body>
  

<?php if (isset($_SESSION["user"])) { 
        require "views/components/navbar.auth.php";
    } else {
        require "views/components/navbar.guest.php";
    } ?>


<h1>Login</h1>

<form method="POST">
  <?php if(isset($_POST["username"])) { ?>
    <label>
      username:
      <input name="username" type="username" value="<?= $_POST["username"] ?>"/>
    </label>
    <?php if(isset($errors["username"])) {?>
      <p><?= $errors["username"] ?></p>
    <?php } ?>
  <?php } else { ?>
    <label>
      username:
      <input name="username" type="username"/>
    </label>
  <?php } ?>
    
  <label>
    Password:
    <input name="password" type="password"/>
  </label>
  <?php if(isset($errors["password"])) {?>
    <p><?= $errors["password"] ?></p>
  <?php } ?>
  <button>Login</button>
</form>
<a href="/register">Register</a>

<?php if(isset($_SESSION["flash"])) { ?>
  <p class="flash"><?= $_SESSION["flash"] ?></p>
<?php } ?>

</body>
</html>