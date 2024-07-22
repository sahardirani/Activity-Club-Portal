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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha384-ez0qhqZ5yEzZU2FZwL3Lr4QQpg6a9+sohZ6/D5HL1E6HItJcM/gJJUjoqFG2Dnpd" crossorigin="anonymous">
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
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="category.php">Category</a></li>
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

    <div class="main-banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="top-text header-text">
              <h2>What is ACP?</h2>
              <div class="activity-card">
                <p style="color: white">
                  As a passionate community dedicated to fostering connections
                  and promoting a healthy, active lifestyle, we offer a diverse
                  range of thrilling activities and events for enthusiasts of
                  all interests. From thrilling outdoor adventures that
                  challenge your limits to community-driven volunteering
                  initiatives that make a positive impact, our club provides a
                  platform for like-minded individuals to come together, share
                  experiences, and create lasting memories. Explore our website
                  to discover upcoming events, detailed activity information,
                  and ways to get involved. Join us on this journey of
                  exploration, camaraderie, and discovery – where every click
                  opens the door to a new opportunity for fun, growth, and
                  connection. Welcome to the heart of our dynamic Activity Club!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="popular-categories">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-heading">
              <h2>Popular Events</h2>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="naccs">
              <div class="grid">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="menu">
                      <div class="first-thumb active">
                        <div class="thumb">
                          <span class="icon"
                            ><img src="assets/images/outdoor-icon.png" alt=""
                          /></span>
                          Outdoor
                        </div>
                      </div>
                      <div>
                        <div class="thumb">
                          <span class="icon"
                            ><img src="assets/images/water-icon.png" alt=""
                          /></span>
                          Water Sports
                        </div>
                      </div>
                      <div>
                        <div class="thumb">
                          <span class="icon"
                            ><img
                              src="assets/images/community-service-icon.png"
                              alt=""
                          /></span>
                          Community Service
                        </div>
                      </div>
                      <div>
                        <div class="thumb">
                          <span class="icon"
                            ><img src="assets/images/fitness-icon.png" alt=""
                          /></span>
                          <span class="line-break">Fitness</span>
                          <!-- Fitness &amp; <br />
                          Sports -->
                        </div>
                      </div>
                      <div class="last-thumb">
                        <div class="thumb">
                          <span class="icon"
                            ><img src="assets/images/tech-icon.png" alt=""
                          /></span>
                          Technology
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-9 align-self-center">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-5 align-self-center">
                                <div class="left-text">
                                  <h4>Outdoor Adventures</h4>
                                  <p>
                                    Embark on thrilling outdoor adventures with
                                    our club! Explore the beauty of nature
                                    through activities like hiking, camping,
                                    rock climbing, and more. Join us in creating
                                    unforgettable memories and conquering new
                                    heights in the great outdoors.
                                  </p>
                                 
                                </div>
                              </div>
                              <div class="col-lg-7 align-self-center">
                                <div class="right-image">
                                  <img
                                    src="assets/images/outdoor-img.jpg"
                                    alt=""
                                  />
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
                              <div class="col-lg-5 align-self-center">
                                <div class="left-text">
                                  <h4>Water Sports</h4>
                                  <p>
                                    Dive into the world of water sports with our
                                    club! Experience the thrill of activities
                                    like snorkeling, kayaking, and windsurfing.
                                    Join us for exciting adventures on the water
                                    and make a splash with our water-centric
                                    events. Discover the joy of aquatic
                                    activities and create memories that will
                                    last a lifetime.
                                  </p>
                                  
                                </div>
                              </div>
                              <div class="col-lg-7 align-self-center">
                                <div class="right-image">
                                  <img
                                    src="assets/images/water-img.jpg"
                                    alt="Water Sports Adventure"
                                  />
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
                              <div class="col-lg-5 align-self-center">
                                <div class="left-text">
                                  <h4>Community Service</h4>
                                  <p>
                                    Engage in meaningful community service
                                    initiatives with our club! Contribute to the
                                    well-being of society through activities
                                    like volunteering, charity drives, and
                                    community outreach programs. Join us in
                                    making a positive impact and building a
                                    stronger, more connected community.
                                    Together, we can create a better tomorrow
                                    through service and compassion.
                                  </p>
                                  
                                </div>
                              </div>
                              <div class="col-lg-7 align-self-center">
                                <div class="right-image">
                                  <img
                                    src="assets/images/community-service-img.jpg"
                                    alt="Community Service Initiatives"
                                  />
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
                              <div class="col-lg-5 align-self-center">
                                <div class="left-text">
                                  <h4>Fitness & Sports</h4>
                                  <p>
                                    Elevate your fitness journey with our
                                    diverse range of sports and wellness
                                    activities. From group workouts to
                                    individual training sessions, our club
                                    offers a supportive environment for
                                    achieving your fitness goals. Join us in
                                    promoting a healthy and active lifestyle
                                    while enjoying the camaraderie of fellow
                                    enthusiasts.
                                  </p>
                                  
                                </div>
                              </div>
                              <div class="col-lg-7 align-self-center">
                                <div class="right-image">
                                  <img
                                    src="assets/images/fitness-img.jpg"
                                    alt="Fitness and Sports"
                                  />
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
                              <div class="col-lg-5 align-self-center">
                                <div class="left-text">
                                  <h4>Technology and Gaming</h4>
                                  <p>
                                    Immerse yourself in the exciting realms of
                                    technology and gaming with our club. From
                                    the latest advancements in tech to thrilling
                                    gaming experiences, we provide a platform
                                    for enthusiasts to share knowledge, connect,
                                    and stay updated on the ever-evolving world
                                    of technology and gaming.
                                  </p>
                                  
                                </div>
                              </div>
                              <div class="col-lg-7 align-self-center">
                                <div class="right-image">
                                  <img
                                    src="assets/images/tech-img.jpg"
                                    alt="Technology and Gaming"
                                  />
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
    <br>
    <br>
    <br>
    <section class="upcoming-activities">
    <div class="container">
        <h2>Upcoming Activities</h2>
        <div class="activity-list">
            <?php
            $servername = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "idsphp";

            $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
            $query = "SELECT * FROM events WHERE DateTo >= CURDATE() ORDER BY DateFrom ASC LIMIT 2";
            $result = $conn->query($query);

            if ($result === false) {
                die("Error executing the query: " . $conn->error);
            }

            while ($row = $result->fetch_assoc()) {
                echo '<div class="event-card">';
                echo '<span class="icon"><img src="assets/images/' . getCategoryIcon($row['CategoryID']) . '.png" alt="Category Icon"></span>';
                echo '<div class="text-content">';
                echo '<h3>' . $row['Name'] . '</h3>';
                echo '<p>' . $row['Description'] . '</p>';
                echo '</div>';
                echo '<div class="main-white-button">';
                // echo '<a href="eventsdetails.php?id=' . $row['EventID'] . '"><i class="fa fa-eye"></i> Learn More</a>';
                echo '</div>';
                echo '</div>';
            }

            $result->close();
            $conn->close();
            ?>
        </div>
    </div>
</section>


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
<script>
    // Activate Owl Carousel
    $(document).ready(function () {
        $("#upcomingActivitiesCarousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
        });
    });
</script>


  </body>
</html>
<?php
// Function to get category icon based on category ID
function getCategoryIcon($categoryId) {
    switch ($categoryId) {
        case 1:
            return 'outdoor-icon'; // Name of your outdoor icon file (without extension)
        case 2:
            return 'community-service-icon'; // Name of your community service icon file
        case 3:
            return 'water-icon'; // Name of your water sports icon file
        case 4:
            return 'fitness-icon'; // Name of your fitness & sports icon file
        case 5:
            return 'technology-icon'; // Name of your technology & gaming icon file
        default:
            return 'question'; // Default icon for unknown categories
    }
}
?>
