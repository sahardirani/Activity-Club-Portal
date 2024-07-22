<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "idsphp";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch guides from the database
$sql = "SELECT * FROM guides";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $guides = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $guides = [];
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="images/black-logo.png" type="image/x-icon">
    <title>Club Guides</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha384-ez0qhqZ5yEzZU2FZwL3Lr4QQpg6a9+sohZ6/D5HL1E6HItJcM/gJJUjoqFG2Dnpd" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css" />
    <link rel="stylesheet" href="assets/css/animated.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/more.css" />

    <style>
        

        /* Guides Container Styles */
        .guides-container {
            margin-top: 5em;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .guide-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Add these styles to your existing styles or in the head section of your HTML */
.guide-item {
    display: flex;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.guide-content {
    flex: 1;
    padding: 20px;
}

.guide-image img {
    border-radius: 8px;
    width: 15em;
    height: 10em;
}

        
        
    </style>
</head>

<body>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index.php"><img src="assets/images/white-logo.png" style="width:100px;height:90px;"></a>
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="category.php">Category</a></li>
                            <li><a href="listing.php">Events</a></li>
                            <li><a href="guides.php" class="active">Guides</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li class="main-white-button">
                                <a href="book_event.php"><i class="fa fa-plus"></i> Book Event</a>
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
                        <h1 style="color: aliceblue">Our Guides</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Main Content Area ***** -->
    <div class="container guides-container">
        <div class="row">
            <div class="col-lg-12">
                <?php if (!empty($guides)) : ?>
                    <?php foreach ($guides as $guide) : ?>
                        <div class="guide-item">
                            <div class="guide-content">
                                <h3><?php echo $guide['FullName']; ?></h3>
                                <p>Email: <?php echo $guide['Email']; ?></p>
                                <p>Date of Birth: <?php echo $guide['DateOfBirth']; ?></p>
                                <p>Profession: <?php echo $guide['Profession']; ?></p>
                                <p>Guide ID: <?php echo $guide['GuideID']; ?></p>
                                

                            </div>
                            <div class="guide-image">
                                <img src="<?php echo $guide['image_url']; ?>" alt="Guide Image" width="100" height="100">
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No guides available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>


    
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
</body>

</html>
