<?php
$pdo = new PDO('mysql:host=localhost;dbname=idsphp', 'root', '');

// Check if user_id_to_update is set in the URL
if (isset($_GET['user_id_to_update'])) {
    $userIdToUpdate = $_GET['user_id_to_update'];

    // Fetch user details for the selected user
    $selectUserSql = "SELECT * FROM users WHERE UserID = :userIdToUpdate";
    $selectUserStatement = $pdo->prepare($selectUserSql);
    $selectUserStatement->execute(['userIdToUpdate' => $userIdToUpdate]);
    $userDetails = $selectUserStatement->fetch(PDO::FETCH_ASSOC);

    // Handle form submission for updating user details
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve updated user details from the form
        $updatedFullName = $_POST['updated_full_name'];
        $updatedDateOfBirth = $_POST['updated_date_of_birth'];
        $updatedGender = $_POST['updated_gender'];
        $updatedEmail = $_POST['updated_email'];
        $updatedPassword = $_POST['updated_password'];
        $updatedJoiningDate = $_POST['updated_joining_date'];
        $updatedMobileNumber = $_POST['updated_mobile_number'];
        $updatedEmergencyNumber = $_POST['updated_emergency_number'];
        $updatedProfession = $_POST['updated_profession'];
        $updatedNationality = $_POST['updated_nationality'];
        $updatedRole = $_POST['updated_role'];

        // Update user details in the database
        $updateUserSql = "UPDATE users SET 
            FullName = :fullName, 
            DateOfBirth = :dateOfBirth, 
            Gender = :gender, 
            Email = :email, 
            Password = :password, 
            JoiningDate = :joiningDate, 
            MobileNumber = :mobileNumber, 
            EmergencyNumber = :emergencyNumber, 
            Profession = :profession, 
            Nationality = :nationality, 
            role = :role 
            WHERE UserID = :userIdToUpdate";

        $updateUserStatement = $pdo->prepare($updateUserSql);

        try {
            $updateUserStatement->execute([
                'fullName' => $updatedFullName,
                'dateOfBirth' => $updatedDateOfBirth,
                'gender' => $updatedGender,
                'email' => $updatedEmail,
                'password' => $updatedPassword,
                'joiningDate' => $updatedJoiningDate,
                'mobileNumber' => $updatedMobileNumber,
                'emergencyNumber' => $updatedEmergencyNumber,
                'profession' => $updatedProfession,
                'nationality' => $updatedNationality,
                'role' => $updatedRole,
                'userIdToUpdate' => $userIdToUpdate
            ]);

            echo "User details updated successfully.";
        } catch (Exception $e) {
            echo "Failed to update user details. Error: " . $e->getMessage();
        }
    }
} else {
    echo "User ID to update is not provided.";
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
    <title>Edit User</title>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <a href="admin.php">Back to Admin Page</a>
        <!-- Edit User Form -->
        <form method="post" action="edit_user.php?user_id_to_update=<?php echo $userIdToUpdate; ?>">
            <!-- Add input fields for each user detail -->
            <label for="updated_full_name">Full Name:</label>
            <input type="text" id="updated_full_name" name="updated_full_name" value="<?php echo $userDetails['FullName']; ?>" required>

            <label for="updated_date_of_birth">Date of Birth:</label>
            <input type="date" id="updated_date_of_birth" name="updated_date_of_birth" value="<?php echo $userDetails['DateOfBirth']; ?>" required>

            <label for="updated_gender">Gender:</label>
            <select id="updated_gender" name="updated_gender" required>
                <option value="Male" <?php echo ($userDetails['Gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($userDetails['Gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                <!-- Add options for other gender values -->
            </select>

            <label for="updated_email">Email:</label>
            <input type="email" id="updated_email" name="updated_email" value="<?php echo $userDetails['Email']; ?>" required>

            <label for="updated_password">Password:</label>
            <input type="password" id="updated_password" name="updated_password" value="<?php echo $userDetails['Password']; ?>" required>

            <label for="updated_joining_date">Joining Date:</label>
            <input type="date" id="updated_joining_date" name="updated_joining_date" value="<?php echo $userDetails['JoiningDate']; ?>" required>

            <label for="updated_mobile_number">Mobile Number:</label>
            <input type="text" id="updated_mobile_number" name="updated_mobile_number" value="<?php echo $userDetails['MobileNumber']; ?>" required>

            <label for="updated_emergency_number">Emergency Number:</label>
            <input type="text" id="updated_emergency_number" name="updated_emergency_number" value="<?php echo $userDetails['EmergencyNumber']; ?>" required>

            <label for="updated_profession">Profession:</label>
            <input type="text" id="updated_profession" name="updated_profession" value="<?php echo $userDetails['Profession']; ?>" required>

            <label for="updated_nationality">Nationality:</label>
            <input type="text" id="updated_nationality" name="updated_nationality" value="<?php echo $userDetails['Nationality']; ?>" required>

            <label for="updated_role">Role:</label>
            <input type="text" id="updated_role" name="updated_role" value="<?php echo $userDetails['role']; ?>" required>

            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>