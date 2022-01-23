  <?php
    require_once 'connection.php';
    require_once 'functions.php';

    $isHeaderActive = getConfigValueByKey("isHeaderActive", $db);
    $isLoginActive  = getConfigValueByKey("isLoginActive", $db);
    $isSignUpActive = getConfigValueByKey("isSignUpActive ", $db);
    $isTitleActive  = getConfigValueByKey("isTitleActive ", $db);
    $isLogoActive   = getConfigValueByKey("isLogoActive", $db);
    $logoName       = getConfigValueByKey("logoName", $db);
    $navbarItems    = getNavbarItems($db);


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
      <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Additional CSS Files -->
      <link rel="stylesheet" href="/assets/css/fontawesome.css">
      <link rel="stylesheet" href="/assets/css/templatemo-host-cloud.css">
      <link rel="stylesheet" href="/assets/css/owl.css">



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
                      <?php if ($isTitleActive == 'true') { ?>
                          <a class="navbar-brand" href="/index.php">
                              <h2>Host <em>Cloud</em></h2>
                          </a>
                      <?php } ?>
                      <?php if ($isLogoActive == 'true') { ?>
                          <a class="navbar-brand" href="index.php">
                              <img src="/images/<?php echo $logoName ?>" style="width:100%; height:50px ">
                          </a>
                      <?php } ?>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarResponsive">
                          <ul class="navbar-nav ml-auto">
                          <?php foreach($navbarItems as $navbarItem){?>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo $navbarItem->link ?>"><?php echo $navbarItem->name ?></a>
                              </li>
                              <?php } ?>
                          </ul>
                      </div>
                  </div>
                  <div class="functional-buttons">
                      <ul>
                          <?php
                           if(isset($_SESSION['loggeduser'])){ ?>
                               <li><a href="/userpanel.php">ClientArea</a></li>
                          <?php } ?>
                          <?php if ($isLoginActive == 'true') {
                            if(!isset($_SESSION['loggeduser'])){
                              ?>

                              <li><a href="/login.php">Log in</a></li>

                          <?php }} ?>
                          <?php
                          if ($isSignUpActive == 'true') {
                          if(!isset($_SESSION['loggeduser'])){
                              ?>
                              <li><a href="/register.php">Sign Up</a></li>
                          <?php }} ?>
                      </ul>
                  </div>
                  </div>
              </nav>
          </header>
      <?php } ?>