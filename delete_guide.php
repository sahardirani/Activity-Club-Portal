<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_guide'])) {
    $guideIdToDelete = $_POST['delete_guide'];

    // Delete guide from the database
    $pdo = new PDO('mysql:host=localhost;dbname=idsphp', 'root', '');

    $stmt = $pdo->prepare("DELETE FROM guides WHERE GuideID = ?");
    $stmt->execute([$guideIdToDelete]);

    // Redirect to the admin page after deleting the guide
    header("Location: admin.php");
    exit();
} else {
    echo "Invalid request. Guide ID to delete is not provided.";
}
?>