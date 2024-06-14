<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <style>
        body {
            
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            padding-top: 60px;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .room {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .room img {
            width: auto;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
        }
        .room-details {
            font-size: 14px;
            margin-left: 10px;
            display: inline-block;
            width: 70%;
        }
        .reserve-link {
            color: #007BFF;
            text-decoration: none;
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
        <h1><?php echo htmlspecialchars($title); ?></h1>
        <?php if (!empty($rooms)): ?>
            <?php foreach ($rooms as $room): ?>
                <div class="room">
                    <?php if (!empty($room['photo'])): ?>
                        <img src="<?php echo htmlspecialchars($room['photo']); ?>" alt="Room Photo">
                    <?php endif; ?>
                    <div class="room-details">
                        <strong>Room Number:</strong> <?php echo htmlspecialchars($room['room_number']); ?><br>
                        <strong>Room Type:</strong> <?php echo htmlspecialchars($room['room_type']); ?><br>
                        <strong>Description:</strong> <?php echo htmlspecialchars($room['description']); ?><br>
                        <?php $price = $room['price'] ?? null; ?>
                        <strong>Price:</strong> <?php echo htmlspecialchars($price ? '$' . number_format($price, 2) : 'N/A'); ?><br>
                        <?php if (isset($_SESSION["admin"])) { ?>
                        <form method="POST" action="/delete">
                            <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                        <?php } ?>
                    </div>   
                </div>
                
            <?php endforeach; ?>
        <?php else: ?>
            <p>No rooms available.</p>
        <?php endif; ?>
        
    </div>
</body>
</html>
