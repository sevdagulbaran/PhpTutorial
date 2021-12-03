  <?php
  require_once 'connection.php';
  // $query = $db->prepare("SELECT value FROM settings WHERE `key`='isHeaderActive'");
  // $query = $db->prepare("SELECT value FROM settings WHERE `key`='isLoginActive' AND `key`='isSignUpActive'");
  // $query = $db->prepare("SELECT value FROM settings WHERE `key`='isSignUpActive'");
  // $query = $db->prepare("SELECT value FROM settings WHERE `key`='isLoginActive'");
  // $query = $db->prepare("SELECT value FROM settings WHERE `key` IN ('isSignUp', 'isLoginActive')");
  $query->execute();
  $isHeaderActive = true;
  $isLoginActive = true;
   $isSignUpActive = true;
  if ($query->rowCount() > 0) {
      $result = $query->fetchAll();
      foreach ($result as $row) {
          $isHeaderActive = $row['value'];
          $isSignUpActive = $row['value'];
          $isLoginActive = $row['value'];
      }
  }
echo $isSignUpActive;
echo$isLoginActive ;
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Host Cloud Template - About Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-host-cloud.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <!--

Host Cloud Template

https://templatemo.com/tm-541-host-cloud

-->
  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
      <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <?php if ($isHeaderActive == 'true') { ?>
      <!-- Header -->
      <header class="">
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <a class="navbar-brand" href="index.php">
              <h2>Host <em>Cloud</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="services.php">Our Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="functional-buttons">
            <ul>
              <?php if ($isLoginActive == 'true') { ?>
                <li><a href="#">Log in</a></li>
              <?php } ?>
              <?php if ($isSignUpActive == 'true') { ?>
                <li><a href="#">Sign Up</a></li>
              <?php } ?>
            </ul>
          </div>
          </div>
        </nav>
      </header>
    <?php } ?>