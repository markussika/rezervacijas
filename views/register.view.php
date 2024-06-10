<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST">
  <label>
    username:
    <input name="username" type="username" required/><br>
  </label>
  <?php if(isset($errors["username"])) {?>
    <p><?= $errors["username"] ?></p>
  <?php } ?>
  <label>
    Password:
    <input name="password" type="password" required/><br>
  </label>
  <?php if(isset($errors["password"])) {?>
    <p><?= $errors["password"] ?></p>
  <?php } ?>
  <button>Register</button>
</form>
</body>
</html>