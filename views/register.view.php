<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
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

    <h1>Register</h1>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="" method="POST">
        <?php if (isset($_POST["username"])): ?>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($_POST["username"]) ?>" required>
            </div>
        <?php else: ?>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
        <?php endif; ?>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>
