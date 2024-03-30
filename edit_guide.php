<?php
$pdo = new PDO('mysql:host=localhost;dbname=idsphp', 'root', '');

// Check if guide_id_to_update is set in the URL
if (isset($_GET['guide_id_to_update'])) {
    $guideIdToUpdate = $_GET['guide_id_to_update'];

    // Fetch guide details for the selected guide
    $selectGuideSql = "SELECT * FROM guides WHERE GuideID = :guideIdToUpdate";
    $selectGuideStatement = $pdo->prepare($selectGuideSql);
    $selectGuideStatement->execute(['guideIdToUpdate' => $guideIdToUpdate]);
    $guideDetails = $selectGuideStatement->fetch(PDO::FETCH_ASSOC);

    // Handle form submission for updating guide details
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve updated guide details from the form
        $updatedFullName = $_POST['updated_full_name'];
        $updatedDateOfBirth = $_POST['updated_date_of_birth'];
        $updatedEmail = $_POST['updated_email'];
        $updatedPassword = $_POST['updated_password'];
        $updatedJoiningDate = $_POST['updated_joining_date'];
        $updatedProfession = $_POST['updated_profession'];
        $updatedImageUrl = $_POST['updated_image_url'];

        // Update guide details in the database
        $updateGuideSql = "UPDATE guides SET 
            FullName = :fullName, 
            DateOfBirth = :dateOfBirth, 
            Email = :email, 
            Password = :password, 
            JoiningDate = :joiningDate, 
            Profession = :profession, 
            image_url = :imageUrl 
            WHERE GuideID = :guideIdToUpdate";

        $updateGuideStatement = $pdo->prepare($updateGuideSql);

        try {
            $updateGuideStatement->execute([
                'fullName' => $updatedFullName,
                'dateOfBirth' => $updatedDateOfBirth,
                'email' => $updatedEmail,
                'password' => $updatedPassword,
                'joiningDate' => $updatedJoiningDate,
                'profession' => $updatedProfession,
                'imageUrl' => $updatedImageUrl,
                'guideIdToUpdate' => $guideIdToUpdate
            ]);

            echo "Guide details updated successfully.";
        } catch (Exception $e) {
            echo "Failed to update guide details. Error: " . $e->getMessage();
        }
    }
} else {
    echo "Guide ID to update is not provided.";
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
    <title>Edit Guide</title>
</head>
<body>
    <div class="container">
        <h2>Edit Guide</h2>
        <a href="admin.php">Back to Admin Page</a>
        <!-- Edit Guide Form -->
        <form method="post" action="edit_guide.php?guide_id_to_update=<?php echo $guideIdToUpdate; ?>">
            <!-- Add input fields for each guide detail -->
            <label for="updated_full_name">Full Name:</label>
            <input type="text" id="updated_full_name" name="updated_full_name" value="<?php echo $guideDetails['FullName']; ?>" required>

            <label for="updated_date_of_birth">Date of Birth:</label>
            <input type="date" id="updated_date_of_birth" name="updated_date_of_birth" value="<?php echo $guideDetails['DateOfBirth']; ?>" required>

            <label for="updated_email">Email:</label>
            <input type="email" id="updated_email" name="updated_email" value="<?php echo $guideDetails['Email']; ?>" required>

            <label for="updated_password">Password:</label>
            <input type="password" id="updated_password" name="updated_password" value="<?php echo $guideDetails['Password']; ?>" required>

            <label for="updated_joining_date">Joining Date:</label>
            <input type="date" id="updated_joining_date" name="updated_joining_date" value="<?php echo $guideDetails['JoiningDate']; ?>" required>

            <label for="updated_profession">Profession:</label>
            <input type="text" id="updated_profession" name="updated_profession" value="<?php echo $guideDetails['Profession']; ?>" required>

            <label for="updated_image_url">Image URL:</label>
            <input type="text" id="updated_image_url" name="updated_image_url" value="<?php echo $guideDetails['image_url']; ?>" required>

            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>