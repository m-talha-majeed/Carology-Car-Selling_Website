<?php
require './connect.php';
session_start();

if (isset($_POST["submit"])) {
  // Read the file into an array
  $error="";
  $us = $_POST['user'];
  $em = $_POST['email'];
  $lo = $_POST['location'];
  $ph = $_POST['phone'];
  $ps = $_POST['pass'];

  if(filter_var($em, FILTER_VALIDATE_EMAIL))
  {
    $query = "INSERT INTO `user`(`User_Name`, `User_Phone`, `User_Email`, `User_Password`, `User_Location`) VALUES ('$us','$ph','$em','$ps','$lo')";
    if (mysqli_query($conn, $query)) {
      header("Location: home.php");
    } else {
    }
  }
  else{
    $error = "Invalid Email.";
    header("Location: signup.php");
  }
  
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Carology - The World of Cars </title>
  <link rel="shortcut icon" type="image/x-icon" href="fi.ico" />
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <link href="css/signup.css" rel="stylesheet" />
  <link href="css/all.css" rel="stylesheet" />
</head>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#page-top">Carology</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

          <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="home.php#portfolio">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="home.php#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="signin.php">Sign-In</a></li>
          

        </ul>
      </div>
    </div>

  </nav>
  <!-- Masthead-->
  <header class="masthead">
    <div class="container">
      <div class="masthead-heading text-uppercase">Sign-Up</div>
      <a class="btn btn-primary btn-xl text-uppercase" href="#sign-upp">Click Here</a>
    </div>
  </header>
  <br />
  <br />
  <section class="page-section" id="sign-upp">
    <div class="container">


      <div class="team-member">
        <div class="text-center">
          <div class="form">
            <br />
            <br />
            <img class="mx-auto rounded-circle" src="images/csi.jpg" alt="..." />
            <br />
            <br />
            <br />
            <br />
            <br />
            <form class="" action="" method="post">
              <input type="text" name="user" id="user" placeholder="Username" required><br />
              <br />
              <?php
                        if (!empty($error)) {
                            echo '<div class="alert alert-danger">' . $error . '</div>';
                        }
                        ?>
              <input type="text" name="email" id="email" placeholder="Email" required><br />
              <br />

              <input type="text" name="phone" id="phone" placeholder="Phone #" required><br />
              <br />
              <input type="text" name="pass" id="pass" placeholder="Password" required><br />
              <br />
              <input type="text" name="location" id="location" placeholder="Location" required><br />
              <br />
              <input type="submit" value="Sign-Up"name="submit">
            </form>

            <br />
            <br />
            <br />
            <br />
          </div>
        </div>
      </div>
    </div>

  </section>

  <br />
  <br />
  <br />
  <br />
  <br />


  <!-- Footer-->
  <footer class="footer py-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 text-lg-start">Copyright &copy; Carology 2023</div>
        <div class="col-lg-4 my-3 my-lg-0">
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
          <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
        </div>
      </div>
    </div>
  </footer>



  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <!-- * *                               SB Forms JS                               * *-->
  <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <script>
    window.addEventListener('DOMContentLoaded', event => {

      // Navbar shrink function
      var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
          return;
        }
        if (window.scrollY === 0) {
          navbarCollapsible.classList.remove('navbar-shrink')
        } else {
          navbarCollapsible.classList.add('navbar-shrink')
        }

      };

      // Shrink the navbar 
      navbarShrink();

      // Shrink the navbar when page is scrolled
      document.addEventListener('scroll', navbarShrink);

      //  Activate Bootstrap scrollspy on the main nav element
      const mainNav = document.body.querySelector('#mainNav');
      if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
          target: '#mainNav',
          rootMargin: '0px 0px -40%',
        });
      };

      // Collapse responsive navbar when toggler is visible
      const navbarToggler = document.body.querySelector('.navbar-toggler');
      const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
      );
      responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
          if (window.getComputedStyle(navbarToggler).display !== 'none') {
            navbarToggler.click();
          }
        });
      });

    });
  </script>

</body>

</html>