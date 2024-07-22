<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "idsphp";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure $user_id is initialized
$user_id = $_SESSION['user_id'];

// Fetch booked events for the logged-in user
$bookedEventsSQL = "SELECT events.*
                    FROM eventmembers
                    JOIN events ON eventmembers.EventID = events.EventID
                    WHERE eventmembers.UserID = '$user_id'";
$bookedResult = $conn->query($bookedEventsSQL);

if ($bookedResult->num_rows > 0) {
    $bookedEvents = $bookedResult->fetch_all(MYSQLI_ASSOC);
} else {
    $bookedEvents = [];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="images/black-logo.png" type="image/x-icon">
    <title>Your Booked Events</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            margin-bottom: 5px;
        }

        /* Add more styles as needed */

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            background-color: #8d99af;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container button:hover {
            background-color: #6b7c94;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="button-container">
        <a class="back-button" href="javascript:history.back()">Back</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2>Your Booked Events</h2>
                <?php if (!empty($bookedEvents)) : ?>
                    <ul>
                        <?php foreach ($bookedEvents as $bookedEvent) : ?>
                            <li>
                                <h3><?php echo $bookedEvent['Name']; ?></h3>
                                <p>Description: <?php echo $bookedEvent['Description']; ?></p>
                                <p>Category: <?php echo $bookedEvent['CategoryID']; ?></p>
                                <p>Destination: <?php echo $bookedEvent['Destination']; ?></p>
                                <p>Date: <?php echo $bookedEvent['DateFrom'] . ' to ' . $bookedEvent['DateTo']; ?></p>
                                <p>Cost: <?php echo $bookedEvent['Cost']; ?></p>
                                <!-- Add more details as needed -->
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>You haven't booked any events yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>
