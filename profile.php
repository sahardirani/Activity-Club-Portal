<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();



// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "idsphp"; // Updated database name to "idsphp"

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle password change
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_password'])) {
  // Get the user's current password from the database
  $currentPasswordSQL = "SELECT Password FROM users WHERE UserID = '$user_id'";
  $result = $conn->query($currentPasswordSQL);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $currentPasswordFromDB = $row['Password'];

      // Verify if the entered current password matches the one in the database
      $currentPassword = $_POST['current_password'];

      if (password_verify($currentPassword, $currentPasswordFromDB)) {
          // Current password is correct
          $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

          // Update the user's password in the database
          $updatePasswordSQL = "UPDATE users SET Password = '$newPassword' WHERE UserID = '$user_id'";
          if ($conn->query($updatePasswordSQL) === TRUE) {
              echo "Password updated successfully";
          } else {
              echo "Error updating password: " . $conn->error;
          }
      } else {
          echo "Current password is incorrect";
      }
  } else {
      echo "User not found";
  }
}


// Handle profile changes
// Handle profile changes
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_changes'])) {
  // User inputs from the form
  $full_name = $_POST['full_name'];
  $date_of_birth = $_POST['date_of_birth'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $mobile_number = $_POST['mobile_number'];

  // Prepare and bind the update query
  $updateProfileSQL = $conn->prepare("UPDATE users SET FullName = ?, DateOfBirth = ?, Gender = ?, Email = ?, MobileNumber = ? WHERE UserID = ?");
  $updateProfileSQL->bind_param("sssssi", $full_name, $date_of_birth, $gender, $email, $mobile_number, $user_id);

  if ($updateProfileSQL->execute()) {
    $message = "Profile updated successfully";
    $message_class = "success";
  } else {
      $message = "Error updating profile: " . $conn->error;
        $message_class = "error";
  }

  // Close the prepared statement
  $updateProfileSQL->close();
}


// Fetch updated user data
$sql = "SELECT * FROM users WHERE UserID = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // Handle the case where user information is not found
    echo "User not found";
    exit();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha384-ez0qhqZ5yEzZU2FZwL3Lr4QQpg6a9+sohZ6/D5HL1E6HItJcM/gJJUjoqFG2Dnpd" crossorigin="anonymous"> -->

    <link rel="shortcut icon" href="images/black-logo.png" type="image/x-icon">
    <title>ACP</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css" />
    <link rel="stylesheet" href="assets/css/animated.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/more.css" />
<style>
    /* body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}*/

 .container1 {
    max-width: 1000px;
    margin: 50px auto;
    padding: 20px;
    /* border: 1px solid #ccc; */
    border-radius: 10px;
    background-color: #fff;
    /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  */
} 

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
}

input,
select,
textarea {
    margin-bottom: 15px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    padding: 10px;
    background-color: #8d99af;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #8d99af;
}

.login-link {
    text-align: center;
    margin-top: 10px;
}

.login-link a {
    color: #8d99af;
    text-decoration: none;
    font-weight: bold;
}

.login-link a:hover {
    text-decoration: underline;
}


</style>
  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header
      class="header-area header-sticky wow slideInDown"
      data-wow-duration="0.75s"
      data-wow-delay="0s"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Logo Start ***** -->
              <a href="index.php" ><img src="assets/images/white-logo.png" style="width:100px;height:90px;"> </a>

              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li><a href="index.php" >Home</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="listing.php">Events</a></li>
                <li><a href="guides.php">Guides</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="profile.php" class="active">Profile</a></li>
                <li>
                  <div class="main-white-button">
                    <a href="book_event.php"><i class="fa fa-plus"></i> Book Event</a>
                  </div>
                </li>
              </ul>
              <a class="menu-trigger">
                <span>Menu</span>
              </a>
              
            </nav>
          </div>
        </div>
      </div>
    </header>
    <div class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="top-text header-text">
              <h2>Profile Page</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container1">
    <div class="result-box">
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
    <form id="profileForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return confirmChanges()">
    <label for="user_id">UserID:</label>
    <input type="text" id="user_id" name="user_id" value="<?php echo $user['UserID']; ?>" readonly>

    <label for="full_name">FullName:</label>
    <input type="text" id="full_name" name="full_name" value="<?php echo isset($user['FullName']) ? $user['FullName'] : ''; ?>">

    <label for="date_of_birth">DateOfBirth:</label>
    <input type="text" id="date_of_birth" name="date_of_birth" value="<?php echo isset($user['DateOfBirth']) ? $user['DateOfBirth'] : ''; ?>">

    <label for="gender">Gender:</label>
    <select id="gender" name="gender">
        <option value="Male" <?php echo (isset($user['Gender']) && $user['Gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?php echo (isset($user['Gender']) && $user['Gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
    </select>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo isset($user['Email']) ? $user['Email'] : ''; ?>">

    <label for="mobile_number">MobileNumber:</label>
    <input type="text" id="mobile_number" name="mobile_number" value="<?php echo isset($user['MobileNumber']) ? $user['MobileNumber'] : ''; ?>">

    <button type="submit" name="save_changes" class="result-box">Save Changes</button>

</form>
    <!-- <h3>Change Password</h3> -->
    <form onsubmit="return validatePassword()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="current_password">Current Password:</label>
        <input type="password" id="current_password" name="current_password" required>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <button type="submit" name="change_password" class="result-box">Change Password</button>
    </form>        <br>
    
</div>
<script>
function confirmChanges() {
    return confirm("Are you sure you want to save changes?");
}
</script>
<script>




    function validatePassword() {
        var newPassword = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (newPassword !== confirmPassword) {
            alert("Passwords do not match. Please re-enter.");
            return false;
        }

        return true;
    }

    function validateNumericInput(inputElement) {
        var inputValue = inputElement.value.trim();

        // Allow only numeric values
        var numericRegex = /^[0-9]+$/;

        if (!numericRegex.test(inputValue)) {
            alert("Please enter only numeric values.");
            inputElement.value = ''; // Clear the input field
            return false;
        }

        return true;
    }

    document.addEventListener('DOMContentLoaded', function () {
        
        document.getElementById('mobile_number').addEventListener('input', function () {
            validateNumericInput(this);
        });
    });
</script>

<footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="about">
              <div class="logo">
                <img src="assets/images/black-logo.png" alt="Plot Listing Template"/>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="helpful-links">
              <h4>Helpful Links</h4>
              <div class="row">
                <div class="col-lg-6">
                  <ul>
                    <li><a href="category.php">Categories</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul>
                    <li><a href="index.php">About Us</a></li>
                    <li><a href="listing.php">Events</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="contact-us">
              <h4>Contact Us</h4>
              <p>Beirut, Lebanon</p>
              <div class="row">
                <div class="col-lg-6">
                  <a href="#">+961 81835725</a>
                </div>
                <div class="col-lg-6">
                  <a href="#">+961 78892285</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="sub-footer">
              <p>
                Copyright © 2023
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



  </body>
</html>

