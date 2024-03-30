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

// Initialize variables
$message_class = "";
$message = "";

// Ensure $user_id is initialized
$user_id = $_SESSION['user_id'];

// Fetch events from the database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $events = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $events = [];
}

// Handle event booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_event'])) {
    $event_id = $_POST['event_id'];

    // Check if the user has already booked this event
    $checkBookingSQL = "SELECT * FROM eventmembers WHERE EventID = '$event_id' AND UserID = '$user_id'";
    $checkResult = $conn->query($checkBookingSQL);

    if ($checkResult->num_rows > 0) {
        $message_class = "error";
        $message = "You have already booked this event.";
    } else {
        // Book the event
        $bookEventSQL = "INSERT INTO eventmembers (EventID, UserID) VALUES ('$event_id', '$user_id')";
        if ($conn->query($bookEventSQL) === TRUE) {
            $message_class = "success";
            $message = "Event booked successfully.";
        } else {
            $message_class = "error";
            $message = "Error booking event: " . $conn->error;
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .contain {
            margin-top: 110px;
        }

        .contain h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .contain ul {
            list-style: none;
            padding: 0;
        }

        .contain li {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .contain h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .contain p {
            color: #555;
            margin-bottom: 5px;
        }

        .contain button {
            position: absolute;
            bottom: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: #8d99af;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
        }

        .contain button:hover {
            background-color: #6b7c94;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .back-button:hover {
            background-color: #555;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <div class="contain">
        <a class="back-button" href="javascript:history.back()">Back</a>
        <a class="back-button" href="booked_events.php" style="float: right;">View Your Booked Events</a>
        <div class="row">
            <div class="col-lg-12">
                <h2>Available Events</h2>
                <?php if (!empty($events)) : ?>
                    <ul>
                        <?php foreach ($events as $event) : ?>
                            <li>
                                <h3><?php echo $event['Name']; ?></h3>
                                <p>Description: <?php echo $event['Description']; ?></p>
                                <p>Category: <?php echo $event['CategoryID']; ?></p>
                                <p>Destination: <?php echo $event['Destination']; ?></p>
                                <p>Date: <?php echo $event['DateFrom'] . ' to ' . $event['DateTo']; ?></p>
                                <p>Cost: <?php echo $event['Cost']; ?></p>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <input type="hidden" name="event_id" value="<?php echo $event['EventID']; ?>">
                                    <button type="submit" name="book_event">Book Event</button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>No events available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="message <?php echo $message_class; ?>">
        <?php echo $message; ?>
    </div>
</body>

</html>
