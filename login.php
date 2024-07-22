<?php
session_start();

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "idsphp";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $conn->real_escape_string($_POST['login']);
    $password = $conn->real_escape_string($_POST['password']);

    $query = "SELECT UserID, password, role FROM users WHERE UserID = ? OR email = ?";
    
    $stmt = $conn->prepare($query);
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("ss", $login, $login);
    $stmt->execute();
    
    if ($stmt === false) {
        die("Execute failed: " . $stmt->error);
    }
    
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['UserID'];

            // Check user role
            if ($user['role'] == 'admin') {
                // Redirect to admin page
                $stmt->close(); // Close the statement before header redirection
                ob_start(); // Start output buffering
                header("Location: admin.php");
                ob_end_flush(); // Flush the output buffer and send output to the browser
                exit(); // Ensure that no further code is executed after the header
            } else {
                // Redirect to index page
                $stmt->close(); // Close the statement before header redirection
                ob_start(); // Start output buffering
                header("Location: index.php");
                ob_end_flush(); // Flush the output buffer and send output to the browser
                exit(); // Ensure that no further code is executed after the header
            }
        }
    }

    // Moved echo statement outside the if block
    ob_start(); // Start output buffering
    echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>Invalid UserID or password.</div>";
    ob_end_flush(); // Flush the output buffer and send output to the browser

    $stmt->close();
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/black-logo.png" type="image/x-icon">

    <title>Welcome to ACP</title>
    <style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
        overflow: hidden; 
    }

    .container {
        display: flex;
        height: 100vh; 
        align-items: center; 
        justify-content: center; 
    }

    .login-section {
        flex: 0 0 30%;
        padding: 40px;
        background-color: #fff;
        text-align: center; 
    }

    h1 {
        margin-bottom: 20px;
        color: #333;
        font-size: 3.5em;
    }

    .login-form {
        width: 100%;
    }

    .login-form input {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        box-sizing: border-box;
    }

    .login-form button {
        width: calc(100% - 20px);
        padding: 10px;
        border: none;
        background-color: #3c4245; /* Button color */
        color: white;
        cursor: pointer;
        margin-bottom: 10px;
        border-radius: 10px;
        font-size: 1.4em;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        text-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
        transition: background-color 0.3s;
    }

    .login-form button:hover {
        background-color: #3c4245; /* Hover color */
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .signup-section {
        text-align: center;
    }

    .signup-section p {
        margin-bottom: 10px;
    }

    .signup-section button {
        width: 50%;
        transition: all 0.3s;
        font-size: 1.1em;
        position: relative;
        right: 3px;
        background-color: #3c4245; /* Button color */
    }

    p {
        opacity: 70%;
        color: #04375f;
    }

    .signup-section button:hover {
        transform: translateY(-3px);
    }

    .line-container {
        width: 100%;
        padding: 0;
        text-align: center;
        position: relative;
        right: 0.65em;
    }

    .separator-line {
        margin: 2px 0;
        border: 0;
        height: 1px;
        background-color: #3e3b3b;
        display: inline-block;
        width: calc(100% - 40px);
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-section">
            <h1>Welcome to ACP</h1>
            <form class="login-form" method="post" action="login.php">
                <p>UserID</p>
                <input type="text" name="login" placeholder="UserID" required style="border-radius: 10px;">
                <p>Password</p>
                <input type="password" name="password" placeholder="******" required style="border-radius: 10px;">
                
                <button type="submit" style="margin-top: 9px;">Login</button>
                <div class="line-container">
                    <hr class="separator-line" />
                </div>
                <div class="signup-section">
                    <p>Don't have an account?</p>
                    <a href="signup.php"><button type="button">Sign Up Here</button></a>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>