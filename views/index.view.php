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
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .room-details {
            font-size: 16px;
        }
        .reserve-link {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
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
                        <strong>Price:</strong> <?php echo htmlspecialchars($room['price'] ? '$' . number_format($room['price'], 2) : 'N/A'); ?><br>
                        <a href="reserve?room_id=<?= htmlspecialchars($room['room_id']) ?>">Reserve Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No rooms available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
