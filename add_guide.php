<?php
$pdo = new PDO('mysql:host=localhost;dbname=idsphp', 'root', '');

// Handle form submission for adding a new guide
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guideId = $_POST['guide_id'];
    $fullName = $_POST['full_name'];
    $dateOfBirth = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $joiningDate = $_POST['joining_date'];
    $profession = $_POST['profession'];
    $imageUrl = $_POST['image_url'];

    // Insert new guide into the database
    $insertGuideSql = "INSERT INTO guides (GuideID, FullName, DateOfBirth, Email, Password, JoiningDate, Profession, image_url)
                      VALUES (:guideId, :fullName, :dateOfBirth, :email, :password, :joiningDate, :profession, :imageUrl)";

    $insertGuideStatement = $pdo->prepare($insertGuideSql);

    try {
        $insertGuideStatement->execute([
            'guideId' => $guideId,
            'fullName' => $fullName,
            'dateOfBirth' => $dateOfBirth,
            'email' => $email,
            'password' => $password,
            'joiningDate' => $joiningDate,
            'profession' => $profession,
            'imageUrl' => $imageUrl
        ]);

        echo "Guide added successfully.";
    } catch (Exception $e) {
        echo "Failed to add guide. Error: " . $e->getMessage();
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
    <title>Add Guide</title>
</head>
<body>
    <div class="container">
        <h2>Add Guide</h2>
        <a href="admin.php">Back to Admin Page</a>

        <!-- Add Guide Form -->
        <form method="post" action="add_guide.php">
            <!-- Add input fields for each guide detail -->
            <label for="guide_id">Guide ID:</label>
            <input type="text" id="guide_id" name="guide_id" required>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="joining_date">Joining Date:</label>
            <input type="date" id="joining_date" name="joining_date" required>

            <label for="profession">Profession:</label>
            <input type="text" id="profession" name="profession" required>

            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" required>

            <button type="submit">Add Guide</button>
        </form>
    </div>
</body>
</html>