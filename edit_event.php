<?php
$pdo = new PDO('mysql:host=localhost;dbname=idsphp', 'root', '');

// Check if event_id_to_update is set in the URL
if (isset($_GET['event_id_to_update'])) {
    $eventIdToUpdate = $_GET['event_id_to_update'];

    // Fetch event details for the selected event
    $selectEventSql = "SELECT * FROM events WHERE EventID = :eventIdToUpdate";
    $selectEventStatement = $pdo->prepare($selectEventSql);
    $selectEventStatement->execute(['eventIdToUpdate' => $eventIdToUpdate]);
    $eventDetails = $selectEventStatement->fetch(PDO::FETCH_ASSOC);

    // Handle form submission for updating event details
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve updated event details from the form
        $updatedName = $_POST['updated_name'];
        $updatedDescription = $_POST['updated_description'];
        $updatedCategoryID = $_POST['updated_category_id'];
        $updatedDestination = $_POST['updated_destination'];
        $updatedDateFrom = $_POST['updated_date_from'];
        $updatedDateTo = $_POST['updated_date_to'];
        $updatedCost = $_POST['updated_cost'];
        $updatedRelatedGuideID = $_POST['updated_related_guide_id'];
        $updatedStatus = $_POST['updated_status'];

        // Update event details in the database
        $updateEventSql = "UPDATE events SET 
            Name = :name, 
            Description = :description, 
            CategoryID = :categoryID, 
            Destination = :destination, 
            DateFrom = :dateFrom, 
            DateTo = :dateTo, 
            Cost = :cost, 
            RelatedGuideID = :relatedGuideID, 
            Status = :status 
            WHERE EventID = :eventIdToUpdate";

        $updateEventStatement = $pdo->prepare($updateEventSql);

        try {
            $updateEventStatement->execute([
                'name' => $updatedName,
                'description' => $updatedDescription,
                'categoryID' => $updatedCategoryID,
                'destination' => $updatedDestination,
                'dateFrom' => $updatedDateFrom,
                'dateTo' => $updatedDateTo,
                'cost' => $updatedCost,
                'relatedGuideID' => $updatedRelatedGuideID,
                'status' => $updatedStatus,
                'eventIdToUpdate' => $eventIdToUpdate
            ]);

            echo "Event details updated successfully.";
        } catch (Exception $e) {
            echo "Failed to update event details. Error: " . $e->getMessage();
        }
    }
} else {
    echo "Event ID to update is not provided.";
    // Redirect or handle the error accordingly
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

input,
select {
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
    <title>Edit Event</title>
</head>
<body>
    <div class="container">
        <h2>Edit Event</h2>
        <a href="admin.php">Back to Admin Page</a>
        <!-- Edit Event Form -->
        <form method="post" action="edit_event.php?event_id_to_update=<?php echo $eventIdToUpdate; ?>">
            <!-- Add input fields for each event detail -->
            <label for="updated_name">Event Name:</label>
            <input type="text" id="updated_name" name="updated_name" value="<?php echo $eventDetails['Name']; ?>" required>

            <label for="updated_description">Event Description:</label>
            <textarea id="updated_description" name="updated_description" required><?php echo $eventDetails['Description']; ?></textarea>

            <label for="updated_category_id">Category ID:</label>
            <input type="number" id="updated_category_id" name="updated_category_id" value="<?php echo $eventDetails['CategoryID']; ?>" required>

            <label for="updated_destination">Destination:</label>
            <input type="text" id="updated_destination" name="updated_destination" value="<?php echo $eventDetails['Destination']; ?>" required>

            <label for="updated_date_from">Date From:</label>
            <input type="date" id="updated_date_from" name="updated_date_from" value="<?php echo $eventDetails['DateFrom']; ?>" required>

            <label for="updated_date_to">Date To:</label>
            <input type="date" id="updated_date_to" name="updated_date_to" value="<?php echo $eventDetails['DateTo']; ?>" required>

            <label for="updated_cost">Cost:</label>
            <input type="text" id="updated_cost" name="updated_cost" value="<?php echo $eventDetails['Cost']; ?>" required>

            <label for="updated_related_guide_id">Related Guide ID:</label>
            <input type="number" id="updated_related_guide_id" name="updated_related_guide_id" value="<?php echo $eventDetails['RelatedGuideID']; ?>" required>

            <label for="updated_status">Status:</label>
            <input type="text" id="updated_status" name="updated_status" value="<?php echo $eventDetails['Status']; ?>" required>

            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>