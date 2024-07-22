<?php
$pdo = new PDO('mysql:host=localhost;dbname=idsphp', 'root', '');

// Handle form submission for adding a new event
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $categoryID = $_POST['category_id'];
    $destination = $_POST['destination'];
    $dateFrom = $_POST['date_from'];
    $dateTo = $_POST['date_to'];
    $cost = $_POST['cost'];
    $relatedGuideID = $_POST['related_guide_id'];
    $status = $_POST['status'];

    // Insert new event into the database
    $insertEventSql = "INSERT INTO events (Name, Description, CategoryID, Destination, DateFrom, DateTo, Cost, RelatedGuideID, Status)
                      VALUES (:name, :description, :categoryID, :destination, :dateFrom, :dateTo, :cost, :relatedGuideID, :status)";

    $insertEventStatement = $pdo->prepare($insertEventSql);

    try {
        $insertEventStatement->execute([
            'name' => $name,
            'description' => $description,
            'categoryID' => $categoryID,
            'destination' => $destination,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'cost' => $cost,
            'relatedGuideID' => $relatedGuideID,
            'status' => $status
        ]);

        echo "Event added successfully.";
    } catch (Exception $e) {
        echo "Failed to add event. Error: " . $e->getMessage();
    }
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Add Event</title>
</head>
<body>
    <div class="container">
        <h2>Add Event</h2>
        <a href="admin.php">Back to Admin Page</a>

        <!-- Add Event Form -->
        <form method="post" action="add_event.php">
            <label for="name">Event Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="category_id">Category ID:</label>
            <input type="text" id="category_id" name="category_id" required>

            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" required>

            <label for="date_from">Date From:</label>
            <input type="date" id="date_from" name="date_from" required>

            <label for="date_to">Date To:</label>
            <input type="date" id="date_to" name="date_to" required>

            <label for="cost">Cost:</label>
            <input type="text" id="cost" name="cost" required>

            <label for="related_guide_id">Related Guide ID:</label>
            <input type="text" id="related_guide_id" name="related_guide_id" required>

            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required>

            <button type="submit">Add Event</button>
        </form>
    </div>
</body>
</html>