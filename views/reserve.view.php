<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Room</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        label, input, select, button {
            margin-bottom: 10px;
            font-size: 16px;
        }
        input, select {
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Reserve Room</h1>
        <form method="POST" action="">
            <label for="room_id">Room:</label>
            <select id="room_id" name="room_id" required>
                <?php foreach ($rooms as $room): ?>
                    <option value="<?php echo htmlspecialchars($room['room_id']); ?>">
                        <?php echo htmlspecialchars($room['room_number']) . " - " . htmlspecialchars($room['room_type']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="user_id">User:</label>
            <select id="user_id" name="user_id" required>
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo htmlspecialchars($user['user_id']); ?>">
                        <?php echo htmlspecialchars($user['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="check_in_date">Check-in Date:</label>
            <input type="date" id="check_in_date" name="check_in_date" required>

            <label for="check_out_date">Check-out Date:</label>
            <input type="date" id="check_out_date" name="check_out_date" required>

            <label for="total_price">Total Price:</label>
            <input type="number" id="total_price" name="total_price" step="0.01" required>

            <button type="submit">Reserve Room</button>
        </form>
    </div>
</body>
</html>