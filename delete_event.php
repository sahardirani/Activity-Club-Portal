<?php
$pdo = new PDO('mysql:host=localhost;dbname=idsphp', 'root', '');

if (isset($_GET['confirmed_delete_event'])) {
    $eventIdToDelete = $_GET['confirmed_delete_event'];

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
} else {
    echo "Event ID to delete is not provided.";
    // Redirect or handle the error accordingly
    exit();
}
?>