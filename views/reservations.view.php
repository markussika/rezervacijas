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
        .reservation {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
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
        <?php if (!empty($reservations)): ?>
            <?php foreach ($reservations as $reservation): ?>
                <?php if ($reservation['user'] == $_SESSION['user']): ?>
                <div class="reservation">
                    <?php echo "<strong>Room Number:</strong> " . htmlspecialchars($reservation['room_number']) . "<br>"; ?>
                    <?php echo "<strong>Room Type:</strong> " . htmlspecialchars($reservation['room_type']) . "<br>"; ?>
                    <?php echo "<strong>Check-in Date:</strong> " . htmlspecialchars($reservation['check_in_date']) . "<br>"; ?>
                    <?php echo "<strong>Check-out Date:</strong> " . htmlspecialchars($reservation['check_out_date']) . "<br>"; ?>
                    <?php echo "<strong>Total Price:</strong> $" . htmlspecialchars(number_format($reservation['total_price'], 2)) . "<br>"; ?>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No reservations found.</p>
        <?php endif; ?>
    </div>
    
</body>
</html>
