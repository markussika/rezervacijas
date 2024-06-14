<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Room</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            padding-top: 60px;
            background-color: #f0f0f0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label, input, textarea, button {
            margin-bottom: 10px;
            font-size: 16px;
        }
        input, textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-weight: bold;
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

    <div class="container">
        <h1>Add New Room</h1>
        <?php if (isset($_SESSION["admin"])) { ?>
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST" action="?<?=isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : ''?>" enctype="multipart/form-data">
            <label for="room_number">Room Number:</label>
            <input type="text" id="room_number" name="room_number" required>

            <label for="room_type">Room Type:</label>
            <input type="text" id="room_type" name="room_type" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>

            <button type="submit">Add Room</button>
        </form>
        <?php } else { ?>
           <?php echo "you dont have the facilities for that, big man!"?>
        <?php } ?>

    </div>
</body>
</html>