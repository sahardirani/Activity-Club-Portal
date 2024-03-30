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

    <title>Plot Listing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css" />
    <link rel="stylesheet" href="assets/css/animated.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="style.css?v=<?= time(); ?>" />

    <!--

TemplateMo 564 Plot Listing

https://templatemo.com/tm-564-plot-listing

-->
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
                <li><a href="index.php">Home</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="listing.php" class="active">Events</a></li>
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
              <h1 style="color: aliceblue" ;>Events</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="listing-page">
      <div class="container">
        <div class="row">
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
                          Community
                        </div>
                      </div>
                      <div class="thumb">
                        <div class="thumb">
                          <span class="icon"
                            ><img src="assets/images/fitness-icon.png" alt=""
                          /></span>
                          Fitness
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

                  <div class="col-lg-9">
                    <ul class="nacc">
                      <li class="active">
                      <div>
                           <div class="col-lg-12">
                            <div class="owl-carousel owl-listing">
                            <?php
                               $servername = "localhost";
                               $username = "root";
                               $password = "";
                                $dbname = "idsphp";

                               try {
                              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                              // Updated SQL query for Outdoor Adventures category (CategoryID = 1)
                              $sql = "SELECT * FROM events WHERE CategoryID = 1";
                              $stmt = $conn->prepare($sql);
                              $stmt->execute();
                              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                              if ($rows) {
                                  $eventCount = 0;

                                  foreach ($rows as $row) {
                                      if ($eventCount % 2 == 0) {
                                          echo '<div class="item">';
                                          echo '<div class="row">';
                                      }

                                      echo '<div class="col-lg-12">';
                                      echo '<div class="listing-item">';
                                      echo '<div class="right-content align-self-center">';
                                      echo '<h4>' . $row['Name'] . '</h4>';
                                      echo '<span class="price">' . $row['Description'] . '</span>';
                                      echo '<span class="details"><em>Destination:</em> ' . $row['Destination'] . '</span>';
                                      echo '<span class="details"><em>Date:</em> ' . $row['DateFrom'] . ' to ' . $row['DateTo'] . '</span>';
                                      echo '<span class="details"><em>Cost:</em> ' . $row['Cost'] . '</span>';
                                      echo '<span class="details"><em>Status:</em> ' . $row['Status'] . '</span>';

                                      echo '</div>';
                                      echo '</div>';
                                      echo '</div>';

                                      if ($eventCount % 2 == 1 || $eventCount == count($rows) - 1) {
                                          echo '</div>';
                                          echo '</div>';
                                      }

                                      $eventCount++;
                                  }
                              } else {
                                  echo 'No events found.';
                              }
                          } catch (PDOException $e) {
                              die("Error connecting to the database: " . $e->getMessage());
                          } finally {
                              $conn = null;
                          }
                          ?>



                        </div>
                        </div>
                      </div>
                    </li>
                    <li class="active">
                              <div>
                                  <div class="col-lg-12">
                                      <div class="owl-carousel owl-listing">
                                          <?php
                                          $servername = "localhost";
                                          $username = "root";
                                          $password = "";
                                          $dbname = "idsphp";

                                          try {
                                              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                              // Updated SQL query for Water Sports category (CategoryID = 3)
                                              $sql = "SELECT * FROM events WHERE CategoryID = 3";
                                              $stmt = $conn->prepare($sql);
                                              $stmt->execute();
                                              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                              if ($rows) {
                                                  $eventCount = 0;

                                                  foreach ($rows as $row) {
                                                      if ($eventCount % 2 == 0) {
                                                          echo '<div class="item">';
                                                          echo '<div class="row">';
                                                      }

                                                      echo '<div class="col-lg-12">';
                                                      echo '<div class="listing-item">';
                                                      echo '<div class="right-content align-self-center">';
                                                      echo '<h4>' . $row['Name'] . '</h4>';
                                                      echo '<span class="price">' . $row['Description'] . '</span>';
                                                      echo '<span class="details"><em>Destination:</em> ' . $row['Destination'] . '</span>';
                                                      echo '<span class="details"><em>Date:</em> ' . $row['DateFrom'] . ' to ' . $row['DateTo'] . '</span>';
                                                      echo '<span class="details"><em>Cost:</em> ' . $row['Cost'] . '</span>';
                                                      echo '<span class="details"><em>Status:</em> ' . $row['Status'] . '</span>';
                                                      // Include other fields as needed
                                                      echo '</div>';
                                                      echo '</div>';
                                                      echo '</div>';

                                                      if ($eventCount % 2 == 1 || $eventCount == count($rows) - 1) {
                                                          // Close the current row div after every second event or the last event
                                                          echo '</div>';
                                                          echo '</div>';
                                                      }

                                                      $eventCount++;
                                                  }
                                              } else {
                                                  echo 'No events found.';
                                              }
                                          } catch (PDOException $e) {
                                              die("Error connecting to the database: " . $e->getMessage());
                                          } finally {
                                              $conn = null;
                                          }
                                          ?>
                                      </div>
                                  </div>
                              </div>
                          </li>

                          <li class="active">
                              <div>
                                  <div class="col-lg-12">
                                      <div class="owl-carousel owl-listing">
                                          <?php
                                          $servername = "localhost";
                                          $username = "root";
                                          $password = "";
                                          $dbname = "idsphp";

                                          try {
                                              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                              // Updated SQL query for CategoryID = 2
                                              $sql = "SELECT * FROM events WHERE CategoryID = 2";
                                              $stmt = $conn->prepare($sql);
                                              $stmt->execute();
                                              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                              if ($rows) {
                                                  $eventCount = 0;

                                                  foreach ($rows as $row) {
                                                      if ($eventCount % 2 == 0) {
                                                          echo '<div class="item">';
                                                          echo '<div class="row">';
                                                      }

                                                      echo '<div class="col-lg-12">';
                                                      echo '<div class="listing-item">';
                                                      echo '<div class="right-content align-self-center">';
                                                      echo '<h4>' . $row['Name'] . '</h4>';
                                                      echo '<span class="price">' . $row['Description'] . '</span>';
                                                      echo '<span class="details"><em>Destination:</em> ' . $row['Destination'] . '</span>';
                                                      echo '<span class="details"><em>Date:</em> ' . $row['DateFrom'] . ' to ' . $row['DateTo'] . '</span>';
                                                      echo '<span class="details"><em>Cost:</em> ' . $row['Cost'] . '</span>';
                                                      echo '<span class="details"><em>Status:</em> ' . $row['Status'] . '</span>';
                                                      // Include other fields as needed
                                                      echo '</div>';
                                                      echo '</div>';
                                                      echo '</div>';

                                                      if ($eventCount % 2 == 1 || $eventCount == count($rows) - 1) {
                                                          // Close the current row div after every second event or the last event
                                                          echo '</div>';
                                                          echo '</div>';
                                                      }

                                                      $eventCount++;
                                                  }
                                              } else {
                                                  echo 'No events found.';
                                              }
                                          } catch (PDOException $e) {
                                              die("Error connecting to the database: " . $e->getMessage());
                                          } finally {
                                              $conn = null;
                                          }
                                          ?>
                                      </div>
                                  </div>
                              </div>
                          </li>




                          <li class="active">
                              <div>
                                  <div class="col-lg-12">
                                      <div class="owl-carousel owl-listing">
                                          <?php
                                          $servername = "localhost";
                                          $username = "root";
                                          $password = "";
                                          $dbname = "idsphp";

                                          try {
                                              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                              // Updated SQL query for CategoryID = 4
                                              $sql = "SELECT * FROM events WHERE CategoryID = 4";
                                              $stmt = $conn->prepare($sql);
                                              $stmt->execute();
                                              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                              if ($rows) {
                                                  $eventCount = 0;

                                                  foreach ($rows as $row) {
                                                      if ($eventCount % 2 == 0) {
                                                          echo '<div class="item">';
                                                          echo '<div class="row">';
                                                      }

                                                      echo '<div class="col-lg-12">';
                                                      echo '<div class="listing-item">';
                                                      echo '<div class="right-content align-self-center">';
                                                      echo '<h4>' . $row['Name'] . '</h4>';
                                                      echo '<span class="price">' . $row['Description'] . '</span>';
                                                      echo '<span class="details"><em>Destination:</em> ' . $row['Destination'] . '</span>';
                                                      echo '<span class="details"><em>Date:</em> ' . $row['DateFrom'] . ' to ' . $row['DateTo'] . '</span>';
                                                      echo '<span class="details"><em>Cost:</em> ' . $row['Cost'] . '</span>';
                                                      echo '<span class="details"><em>Status:</em> ' . $row['Status'] . '</span>';
                                                      // Include other fields as needed
                                                      echo '</div>';
                                                      echo '</div>';
                                                      echo '</div>';

                                                      if ($eventCount % 2 == 1 || $eventCount == count($rows) - 1) {
                                                          // Close the current row div after every second event or the last event
                                                          echo '</div>';
                                                          echo '</div>';
                                                      }

                                                      $eventCount++;
                                                  }
                                              } else {
                                                  echo 'No events found.';
                                              }
                                          } catch (PDOException $e) {
                                              die("Error connecting to the database: " . $e->getMessage());
                                          } finally {
                                              $conn = null;
                                          }
                                          ?>
                                      </div>
                                  </div>
                              </div>
                          </li>



                          <li class="active">
                              <div>
                                  <div class="col-lg-12">
                                      <div class="owl-carousel owl-listing">
                                          <?php
                                          $servername = "localhost";
                                          $username = "root";
                                          $password = "";
                                          $dbname = "idsphp";

                                          try {
                                              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                              // Updated SQL query for CategoryID = 5
                                              $sql = "SELECT * FROM events WHERE CategoryID = 5";
                                              $stmt = $conn->prepare($sql);
                                              $stmt->execute();
                                              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                              if ($rows) {
                                                  $eventCount = 0;

                                                  foreach ($rows as $row) {
                                                      if ($eventCount % 2 == 0) {
                                                          echo '<div class="item">';
                                                          echo '<div class="row">';
                                                      }

                                                      echo '<div class="col-lg-12">';
                                                      echo '<div class="listing-item">';
                                                      echo '<div class="right-content align-self-center">';
                                                      echo '<h4>' . $row['Name'] . '</h4>';
                                                      echo '<span class="price">' . $row['Description'] . '</span>';
                                                      echo '<span class="details"><em>Destination:</em> ' . $row['Destination'] . '</span>';
                                                      echo '<span class="details"><em>Date:</em> ' . $row['DateFrom'] . ' to ' . $row['DateTo'] . '</span>';
                                                      echo '<span class="details"><em>Cost:</em> ' . $row['Cost'] . '</span>';
                                                      echo '<span class="details"><em>Status:</em> ' . $row['Status'] . '</span>';
                                                      // Include other fields as needed
                                                      echo '</div>';
                                                      echo '</div>';
                                                      echo '</div>';

                                                      if ($eventCount % 2 == 1 || $eventCount == count($rows) - 1) {
                                                          // Close the current row div after every second event or the last event
                                                          echo '</div>';
                                                          echo '</div>';
                                                      }

                                                      $eventCount++;
                                                  }
                                              } else {
                                                  echo 'No events found.';
                                              }
                                          } catch (PDOException $e) {
                                              die("Error connecting to the database: " . $e->getMessage());
                                          } finally {
                                              $conn = null;
                                          }
                                          ?>
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

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>
