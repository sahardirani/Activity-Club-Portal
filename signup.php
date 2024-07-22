<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "idsphp";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$passwordError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $userid = $conn->real_escape_string($_POST['userid']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirmPassword = $conn->real_escape_string($_POST['confirm-password']);

    // Optional fields
    $gender = isset($_POST['gender']) ? $conn->real_escape_string($_POST['gender']) : '';
    $mobileNumber = isset($_POST['mobileNumber']) ? $conn->real_escape_string($_POST['mobileNumber']) : '';
    $emergencyNumber = isset($_POST['emergencyNumber']) ? $conn->real_escape_string($_POST['emergencyNumber']) : '';
    $profession = isset($_POST['profession']) ? $conn->real_escape_string($_POST['profession']) : '';
    $nationality = isset($_POST['nationality']) ? $conn->real_escape_string($_POST['nationality']) : '';

    if ($password !== $confirmPassword) {
        $passwordError = 'Passwords do not match.';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertQuery = $conn->prepare("INSERT INTO users (FullName, UserID, DateOfBirth, Gender, Email, Password, JoiningDate, MobileNumber, EmergencyNumber, Profession, Nationality) VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?)");

        if (!$insertQuery) {
            die("Error in prepare statement: " . $conn->error);
        }

        $insertQuery->bind_param("ssssssssss", $name, $userid, $dob, $gender, $email, $hashedPassword, $mobileNumber, $emergencyNumber, $profession, $nationality);

        if ($insertQuery->execute()) {
            $insertQuery->close();
            $conn->close();
            echo "<script>window.location.href='login.php';</script>";
            exit();
        } else {
            echo "Error in execute: " . $insertQuery->error;
        }

        $insertQuery->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/black-logo.png" type="image/x-icon">

    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("med.jpg");
        }

        .signup-container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
            color: #333;
        }

        h1 {
        
        margin-bottom: 20px;
        color: #333;
    
            margin-top: 20px;
            font-size: 2.5em;
            white-space: nowrap; 
        }

        .form-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
        }

        #signup-form {
            display: flex;
            flex-direction: column;
        }

        #signup-form label {
            font-weight: bold;
            margin-top: 15px;
        }

        #signup-form input[type="text"],
        #signup-form input[type="email"],
        #signup-form input[type="password"],
        #signup-form input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        #signup-form small {
            display: block;
            margin-top: 5px;
            color: #666;
            font-size: 0.8em;
        }

        #signup-form button {
            margin-top: 20px;
            padding: 10px;
            border: none;
            border-radius: 10px;
            background-color: #3c4245; /* Button color */
            color: white;
            cursor: pointer;
            transition: opacity 0.1s ease;
            font-size: 1.4em;
        }

        #signup-form button:hover {
            opacity: 0.9;
            background-color: #3c4245; /* Hover color */
        }

        .login-section {
            flex: 0 0 30%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: left;
            justify-content: center;
            background-color: #fff;
            text-align: left;
        }

        .logo-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h1 >Join our Activity Club!</h1>
        <div class="form-container">
            <form id="signup-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="name" style="opacity: 60%;">Name</label>
                <input type="text" id="name" name="name" placeholder="John Doe">
                
                <label for="userid" style="opacity: 60%;">UserID</label>
                <input type="text" id="userid" name="userid" required placeholder="23">
                
                <label for="dob" style="opacity: 60%;">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
                
                <label for="email" style="opacity: 60%;">Email</label>
                <input type="email" id="email" name="email" required placeholder="johndoe@example.com">
                
                <label for="password" style="opacity: 60%;">Password</label>
                <input type="password" id="password" name="password" required placeholder="*******">
                

                <label for="confirm-password" style="opacity: 60%;">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required placeholder="*******">

                <?php if (!empty($passwordError)): ?>
                    <small style="color: red;"><?php echo $passwordError; ?></small>
                <?php endif; ?>

                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>