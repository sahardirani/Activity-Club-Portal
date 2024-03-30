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

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css" />
    <link rel="stylesheet" href="assets/css/animated.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
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
                <li><a href="listing.php">Events</a></li>
                <li><a href="guides.php">Guides</a></li>
                <li><a href="contact.html" class="active">Contact Us</a></li>
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
              <h6>Keep in touch with us</h6>
              <h2>Feel free to send us any message</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="contact-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-lg-6">
                  <div id="map">
                    <iframe
                    src="https://www.google.com/maps?q=Beirut,+Lebanon&z=13&ie=UTF8&iwloc=&output=embed"

                      width="100%" height="650px" frameborder="0" style="border: 0" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="col-lg-6 align-self-center">
                  <form id="contact" action="https://formsubmit.co/sahar.dirani@lau.edu" method="get" target="_blank">

                    <div class="row">
                      <div class="col-lg-6">
                        <fieldset>
                          <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required/>
                        </fieldset>
                      </div>
                      <div class="col-lg-6">
                        <fieldset>
                          <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required />
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="" />
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required="" ></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="main-button">
                            <i class="fa fa-paper-plane"></i> Send Message
                          </button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
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
