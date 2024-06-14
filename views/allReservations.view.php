
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php require "views/components/navbar.php"; ?>
    <div class="container">
        <h1><?php echo htmlspecialchars($title); ?></h1>
        <?php if (!empty($reservations)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>Room Number</th>
                        <th>Username</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($reservation['reservation_id']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['room_number']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['username']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['check_in_date']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['check_out_date']); ?></td>
                            <td><?php echo htmlspecialchars('$' . number_format($reservation['total_price'], 2)); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No reservations available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
