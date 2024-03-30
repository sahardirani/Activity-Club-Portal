<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
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
    <link rel="shortcut icon" href="images/black-logo.png" type="image/x-icon">

    <title>ACP</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css" />
    <link rel="stylesheet" href="assets/css/animated.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />

  </head>

  <body>
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
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Logo Start ***** -->
              <a href="index.php" ><img src="assets/images/white-logo.png" style="width:100px;height:90px;"> </a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="category.php" class="active">Category</a></li>
                <li><a href="listing.php">Events</a></li>
                <li><a href="guides.php">Guides</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li>
                  <div class="main-white-button">
                    <a href="book_event.php"><i class="fa fa-plus"></i> Book Event</a>
                  </div>
                </li>
              </ul>
              <a class="menu-trigger">
                <span>Menu</span>
              </a>
              <!-- ***** Menu End ***** -->
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="top-text header-text">
              <h2>Categories of Events we offer</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="category-post">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="naccs">
              <div class="grid">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="menu">
                      <div class="first-thumb active">
                        <div class="thumb">
                          <span class="icon"
                            ><img src="assets/images/outdoor-icon.png" alt="" />
                            <h4>Outdoor</h4></span
                          >
                        </div>
                      </div>
                      <div>
                        <div class="thumb">
                          <span class="icon"
                            ><img src="assets/images/water-icon.png" alt="" />
                            <h4>Water Sports</h4></span
                          >
                        </div>
                      </div>
                      <div>
                        <div class="thumb">
                          <span class="icon"
                            ><img
                              src="assets/images/community-service-icon.png"
                              alt=""
                            />
                            <h4>Community</h4></span
                          >
                        </div>
                      </div>
                      <div>
                        <div class="thumb">
                          <span class="icon"
                            ><img src="assets/images/fitness-icon.png" alt="" />
                            <h4>Fitness</h4></span
                          >
                        </div>
                      </div>
                      <div class="last-thumb">
                        <div class="thumb">
                          <span class="icon"
                            ><img src="assets/images/tech-icon.png" alt="" />
                            <h4>Technology</h4></span
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="top-content">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="top-icon">
                                        <span class="icon">
                                          <img src="assets/images/outdoor-icon.png" alt="" />
                                          <h4>Outdoor</h4>
                                        </span>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="main-white-button">
                                        <a href="listing.php">
                                          <i class="fa fa-plus"></i> Explore Our Events
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="description">
                                  <div class="row">
                                    <div class="col-lg-9">
                                      <h4>Description</h4>
                                      <p>
                                        Immerse yourself in the wonders of nature with our exciting outdoor activities. Whether you're a thrill-seeker or someone seeking tranquility, our events offer a perfect blend of adventure and serenity. Join us for unforgettable experiences in the great outdoors.
                                      </p>
                                    </div>
                                    
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="activity-list">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <h4>Outdoor Activities</h4>
                                      <div class="row">

        <?php
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "idsphp";

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
        $query = "SELECT * FROM events WHERE categoryid = 1"; // Assuming categoryid is the column for categories
        $result = $conn->query($query);

        if ($result === false) {
            die("Error executing the query: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . $row['Name'] . '</h4>';
            echo '<p class="card-text">' . $row['Description'] . '</p>';
            // You can add more details here if needed
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        $result->close();

        ?>

    </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      
                      <li>
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="top-content">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="top-icon">
                                        <span class="icon"
                                          ><img
                                            src="assets/images/water-icon.png"
                                            alt=""
                                          />
                                          <h4>Water Sports</h4></span
                                        >
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="main-white-button">
                                        <a href="listing.php"
                                          ><i class="fa fa-plus"></i> Check Our
                                          Events</a
                                        >
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="description">
                                  <div class="row">
                                    <div class="col-lg-9">
                                      <h4>Description</h4>
                                      <p>
                                        Dive into the thrill of water sports with our exhilarating experiences that blend aquatic adventure with pure enjoyment. Whether you're a seasoned water enthusiast or a beginner seeking a splash of excitement, our water sports offerings guarantee an unforgettable journey. Feel the rush of adrenaline as you navigate through crystal-clear waters with activities like kayaking, paddleboarding, and jet skiing. Explore the mesmerizing underwater world through snorkeling or embrace the challenge of windsurfing against the backdrop of scenic coastlines. Our expert instructors ensure a safe and enjoyable experience, making every splash, glide, and wave a moment to remember. Join us and immerse yourself in the dynamic and refreshing world of water sports.
                                      </p>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="general-info">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <h4>Water Sports</h4>

                                      <div class="row">

        <?php
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "idsphp";

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
        $query = "SELECT * FROM events WHERE categoryid = 3"; // Assuming categoryid is the column for categories
        $result = $conn->query($query);

        if ($result === false) {
            die("Error executing the query: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . $row['Name'] . '</h4>';
            echo '<p class="card-text">' . $row['Description'] . '</p>';
            // You can add more details here if needed
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        $result->close();

        ?>

    </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="top-content">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="top-icon">
                                        <span class="icon"
                                          ><img
                                            src="assets/images/community-service-icon.png"
                                            alt=""
                                          />
                                          <h4>Community</h4></span
                                        >
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="main-white-button">
                                        <a href="listing.php"
                                          ><i class="fa fa-plus"></i> Check Our
                                          Events</a
                                        >
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="description">
                                  <div class="row">
                                    <div class="col-lg-9">
                                      <h4>Description</h4>
                                      <p>
                                      Community service is a transformative experience that goes beyond individual benefit, fostering a sense of responsibility and connection to the broader society. Engaging in community service involves volunteering time, skills, and resources to support and improve the well-being of others. Whether it's participating in local cleanup initiatives, contributing to food drives, or assisting at community centers, these acts of service play a vital role in creating a more compassionate and cohesive society. By selflessly giving back, individuals not only make a positive impact on the lives of those in need but also cultivate a profound sense of empathy, social awareness, and a shared commitment to building a stronger and more supportive community for everyone.
                                      </p>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="general-info">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <h4>Community Service</h4>
                                      <div class="row">

        <?php
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "idsphp";

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
        $query = "SELECT * FROM events WHERE categoryid = 2"; // Assuming categoryid is the column for categories
        $result = $conn->query($query);

        if ($result === false) {
            die("Error executing the query: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . $row['Name'] . '</h4>';
            echo '<p class="card-text">' . $row['Description'] . '</p>';
            // You can add more details here if needed
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        $result->close();

        ?>

    </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="top-content">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="top-icon">
                                        <span class="icon"
                                          ><img
                                            src="assets/images/fitness-icon.png"
                                            alt=""
                                          />
                                          <h4>Fitness</h4></span
                                        >
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="main-white-button">
                                        <a href="listing.php"
                                          ><i class="fa fa-plus"></i> Check Our
                                          Events</a
                                        >
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="description">
                                  <div class="row">
                                    <div class="col-lg-9">
                                      <h4>Description</h4>
                                      <p>
                                      Fitness and sports are essential for a healthy lifestyle, offering physical strength, mental well-being, and social connections. Engaging in activities like running, weightlifting, or team sports not only enhances physical health but also contributes to mental resilience and stress reduction. Sports, in particular, foster teamwork and community building, while fitness activities provide flexibility for individual preferences. Together, they form a holistic approach to well-being, promoting a balanced and fulfilling life.
                                      </p>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="general-info">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <h4>Fitness and Sports</h4>
                                      <div class="row">

        <?php
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "idsphp";

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
        $query = "SELECT * FROM events WHERE categoryid = 4"; // Assuming categoryid is the column for categories
        $result = $conn->query($query);

        if ($result === false) {
            die("Error executing the query: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . $row['Name'] . '</h4>';
            echo '<p class="card-text">' . $row['Description'] . '</p>';
            // You can add more details here if needed
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        $result->close();

        ?>

    </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="top-content">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="top-icon">
                                        <span class="icon"
                                          ><img
                                            src="assets/images/tech-icon.png"
                                            alt=""
                                          />
                                          <h4>Technology</h4></span
                                        >
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="main-white-button">
                                        <a href="listing.php"
                                          ><i class="fa fa-plus"></i> Check Our
                                          Events</a
                                        >
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="description">
                                  <div class="row">
                                    <div class="col-lg-9">
                                      <h4>Description</h4>
                                      <p>
                                      Technology and gaming converge to create a dynamic and immersive realm that shapes our modern digital landscape. The rapid evolution of technology has not only revolutionized how we live and work but has also transformed gaming into a sophisticated and interactive experience. Cutting-edge hardware, virtual reality, and cloud-based platforms have elevated gaming to new heights, providing players with realistic environments and captivating narratives. The synergy of technology and gaming extends beyond entertainment, influencing education, social interaction, and even professional competitions. As technology continues to advance, the gaming industry evolves, offering endless possibilities for innovation, connectivity, and the exploration of virtual worlds that captivate enthusiasts of all ages.
                                      </p>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="general-info">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <h4>Technology and Gaming</h4>
                                      <div class="row">

        <?php
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "idsphp";

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
        $query = "SELECT * FROM events WHERE categoryid = 5"; // Assuming categoryid is the column for categories
        $result = $conn->query($query);

        if ($result === false) {
            die("Error executing the query: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . $row['Name'] . '</h4>';
            echo '<p class="card-text">' . $row['Description'] . '</p>';
            // You can add more details here if needed
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        $result->close();

        ?>

    </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>
