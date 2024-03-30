<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Check if the user has the "admin" role
$isAdmin = false; // Assume the user is not an admin
if (isset($_SESSION['user_id'])) {
    // You might need to fetch the user role from the database based on the user_id
    // Replace this with your actual logic to fetch the user role
    $userRole = "admin"; // For demonstration purposes, assuming the role is "admin"

    if ($userRole == "admin") {
        $isAdmin = true; // Set to true if the user has the "admin" role
    }
}

// If the user is not an admin, redirect them to the index page
if (!$isAdmin) {
    header("Location: index.php");
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=idsphp', 'root', '');

// Fetch all users
$selectUsersSql = "SELECT * FROM users";
$usersStatement = $pdo->query($selectUsersSql);
$users = $usersStatement->fetchAll(PDO::FETCH_ASSOC);

// Fetch all guides
$selectGuidesSql = "SELECT * FROM guides";
$guidesStatement = $pdo->query($selectGuidesSql);
$guides = $guidesStatement->fetchAll(PDO::FETCH_ASSOC);

// Fetch all events
$selectEventsSql = "SELECT * FROM events";
$eventsStatement = $pdo->query($selectEventsSql);
$events = $eventsStatement->fetchAll(PDO::FETCH_ASSOC);

// Handle user deletion
if (isset($_GET['confirmed_delete_user'])) {
    $userIdToDelete = $_GET['confirmed_delete_user'];

    $deleteUserSql = "DELETE FROM users WHERE UserID = :userIdToDelete";
    $deleteUserStatement = $pdo->prepare($deleteUserSql);

    try {
        $deleteUserStatement->execute(['userIdToDelete' => $userIdToDelete]);
        echo "User deleted successfully.";
        // Redirect to prevent resubmission on page refresh
        header("Location: admin.php");
        exit();
    } catch (Exception $e) {
        echo "Failed to delete user. Error: " . $e->getMessage();
    }
}

// Handle guide deletion
if (isset($_POST['delete_guide'])) {
    $guideIdToDelete = $_POST['delete_guide'];

    $deleteGuideSql = "DELETE FROM guides WHERE GuideID = :guideIdToDelete";
    $deleteGuideStatement = $pdo->prepare($deleteGuideSql);

    try {
        $deleteGuideStatement->execute(['guideIdToDelete' => $guideIdToDelete]);
        echo "Guide deleted successfully.";
        // Redirect to prevent resubmission on page refresh
        header("Location: admin.php");
        exit();
    } catch (Exception $e) {
        echo "Failed to delete guide. Error: " . $e->getMessage();
    }
}

// Handle event deletion
if (isset($_POST['delete_event'])) {
    $eventIdToDelete = $_POST['delete_event'];

    $deleteEventSql = "DELETE FROM events WHERE EventID = :eventIdToDelete";
    $deleteEventStatement = $pdo->prepare($deleteEventSql);

    try {
        $deleteEventStatement->execute(['eventIdToDelete' => $eventIdToDelete]);
        echo "Event deleted successfully.";
        // Redirect to prevent resubmission on page refresh
        header("Location: admin.php");
        exit();
    } catch (Exception $e) {
        echo "Failed to delete event. Error: " . $e->getMessage();
    }
}
if (isset($_GET['logout'])) {
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Redirect to the login page after logout
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/mystyle.css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <style>
        /* Add your styles here */

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Gray background color for table headers */
        }
        .logout-button {
            float: right;
            margin-top: -40px;
            margin-right: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #d32f2f;
        }
    </style>
    <title>Admin Dashboard</title>
</head>
<body>
<div class="container">
    <h2>Admin Dashboard</h2>

    <button onclick="location.href='add_user.php'">Add User</button>
    <button onclick="location.href='add_guide.php'">Add Guide</button>
    <button onclick="location.href='add_event.php'">Add Event</button>
    <a href="?logout" class="logout-button">Logout</a>
   
    <!-- Display All Users -->
    <div class="user-section">
        <h3>User Summary</h3>
        <table>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Password</th>
                <th>Joining Date</th>
                <th>Mobile Number</th>
                <th>Emergency Number</th>
                <th>Profession</th>
                <th>Nationality</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['UserID']; ?></td>
                    <td><?php echo $user['FullName']; ?></td>
                    <td><?php echo $user['DateOfBirth']; ?></td>
                    <td><?php echo $user['Gender']; ?></td>
                    <td><?php echo $user['Email']; ?></td>
                    <td><?php echo $user['Password']; ?></td>
                    <td><?php echo $user['JoiningDate']; ?></td>
                    <td><?php echo $user['MobileNumber']; ?></td>
                    <td><?php echo $user['EmergencyNumber']; ?></td>
                    <td><?php echo $user['Profession']; ?></td>
                    <td><?php echo $user['Nationality']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td>
                        <form method="post" action="delete_user.php">
                            <input type="hidden" name="delete_user" value="<?php echo $user['UserID']; ?>">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete User</button>

                            <!-- Edit User button -->
                            <a href="edit_user.php?user_id_to_update=<?php echo $user['UserID']; ?>">
                                <button type="button">Edit User</button>
                            </a>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Display All Guides -->
    <div class="guide-section">
        <h3>Guide Summary</h3>
        <table>
            <tr>
                <th>Guide ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Date of Birth</th>
                <th>Joining Date</th>
                <th>Profession</th>
                <th>Image URL</th>
                <th>Actions</th>
                <!-- Add more columns as needed -->
            </tr>
            <?php foreach ($guides as $guide): ?>
                <tr>
                    <td><?php echo $guide['GuideID']; ?></td>
                    <td><?php echo $guide['FullName']; ?></td>
                    <td><?php echo $guide['Email']; ?></td>
                    <td><?php echo $guide['Password']; ?></td>
                    <td><?php echo $guide['DateOfBirth']; ?></td>
                    <td><?php echo $guide['JoiningDate']; ?></td>
                    <td><?php echo $guide['Profession']; ?></td>
                    <td><?php echo $guide['image_url']; ?></td>
                    <td>
                    <form method="post" action="delete_guide.php">
                        <input type="hidden" name="delete_guide" value="<?php echo $guide['GuideID']; ?>">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this guide?')">Delete Guide</button>

                        <!-- Edit Guide button -->
                        <a href="edit_guide.php?guide_id_to_update=<?php echo $guide['GuideID']; ?>">
                            <button type="button">Edit Guide</button>
                        </a>
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div><div class="event-section">
        <h3>Event Summary</h3>
        <table>
            <tr>
                <th>Event ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category ID</th>
                <th>Destination</th>
                <th>Date From</th>
                <th>Date To</th>
                <th>Cost</th>
                <th>Related Guide ID</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td><?php echo $event['EventID']; ?></td>
                    <td><?php echo $event['Name']; ?></td>
                    <td><?php echo $event['Description']; ?></td>
                    <td><?php echo $event['CategoryID']; ?></td>
                    <td><?php echo $event['Destination']; ?></td>
                    <td><?php echo $event['DateFrom']; ?></td>
                    <td><?php echo $event['DateTo']; ?></td>
                    <td><?php echo $event['Cost']; ?></td>
                    <td><?php echo $event['RelatedGuideID']; ?></td>
                    <td><?php echo $event['Status']; ?></td>
                    <td>
                        <form method="post" action="admin.php">
                            <input type="hidden" name="delete_event" value="<?php echo $event['EventID']; ?>">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')">Delete Event</button>

                            <!-- Edit Event button -->
                            <a href="edit_event.php?event_id_to_update=<?php echo $event['EventID']; ?>">
                                <button type="button">Edit Event</button>
                            </a>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<script>
    function showConfirmation(message, title, action, userId) {
        if (confirm(message)) {
            window.location.href = `${action}.php?confirmed_${action}_user=${userId}`;
        }
    }
</script>
</body>
</html>