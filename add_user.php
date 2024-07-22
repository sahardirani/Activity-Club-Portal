<?php
$pdo = new PDO('mysql:host=localhost;dbname=idsphp', 'root', '');

// Handle form submission for adding a new user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id']; 
    $fullName = $_POST['full_name'];
    $dateOfBirth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    
    // Hash the password before storing it in the database
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $joiningDate = $_POST['joining_date'];
    $mobileNumber = $_POST['mobile_number'];
    $emergencyNumber = $_POST['emergency_number'];
    $profession = $_POST['profession'];
    $nationality = $_POST['nationality'];
    $role = $_POST['role'];

    // Insert new user into the database
    $insertUserSql = "INSERT INTO users (UserID, FullName, DateOfBirth, Gender, Email, Password, JoiningDate, MobileNumber, EmergencyNumber, Profession, Nationality, role)
                      VALUES (:userId, :fullName, :dateOfBirth, :gender, :email, :password, :joiningDate, :mobileNumber, :emergencyNumber, :profession, :nationality, :role)";

    $insertUserStatement = $pdo->prepare($insertUserSql);

    try {
        $insertUserStatement->execute([
            'userId' => $userId,
            'fullName' => $fullName,
            'dateOfBirth' => $dateOfBirth,
            'gender' => $gender,
            'email' => $email,
            'password' => $password,
            'joiningDate' => $joiningDate,
            'mobileNumber' => $mobileNumber,
            'emergencyNumber' => $emergencyNumber,
            'profession' => $profession,
            'nationality' => $nationality,
            'role' => $role
        ]);

        echo "User added successfully.";
    } catch (Exception $e) {
        echo "Failed to add user. Error: " . $e->getMessage();
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
    <title>Add User</title>
</head>
<body>
    <div class="container">
        <h2>Add User</h2>
        <a href="admin.php">Back to Admin Page</a>

        <!-- Add User Form -->
        <form method="post" action="add_user.php">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" required>

            <!-- Add input fields for each user detail -->
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <!-- Add options for other gender values -->
            </select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="joining_date">Joining Date:</label>
            <input type="date" id="joining_date" name="joining_date" required>

            <label for="mobile_number">Mobile Number:</label>
            <input type="text" id="mobile_number" name="mobile_number" required>

            <label for="emergency_number">Emergency Number:</label>
            <input type="text" id="emergency_number" name="emergency_number" required>

            <label for="profession">Profession:</label>
            <input type="text" id="profession" name="profession" required>

            <label for="nationality">Nationality:</label>
            <input type="text" id="nationality" name="nationality" required>

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required>

            <button type="submit">Add User</button>
        </form>
    </div>
</body>
</html>