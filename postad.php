<?php
require './connect.php';
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    if (isset($_POST["logout"])) {
        $_SESSION["loggedin"] = false;
        header("location: home.php");
    }
}
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CB = $_POST['brand'];
        $CM = $_POST['model'];
        $CV = $_POST['variant'];
        $YE = $_POST['year'];
        $ReLoc = $_POST['registration'];
        $Color = $_POST['color'];
        $Mileage = $_POST['Mileage'];
        $Price = $_POST['price'];
        $desc = $_POST["Desc"];
        $id = $_SESSION["id"];
        $filename = $_FILES["Carimage"]["name"];
        $tempname = $_FILES["Carimage"]["tmp_name"];
        $folder = "uploads/".$filename;
        move_uploaded_file($tempname, $folder);
        
        if (isset($_POST["submit"])) {
            
            $query = "INSERT INTO `used_car`(`User_ID`, `Car_Brand`, `Car_Model`,`Car_Variant`, `Car_Year`, `Registered_City`,
             `Car_Color`, `Mileage`, `Price`, `Picture`, `Description`)
            VALUES('$id','$CB','$CM','$CV', '$YE','$ReLoc','$Color','$Mileage','$Price','$folder','$desc')";

            if (mysqli_query($conn, $query)) {
                header("Location: home.php");
            } else {
                header("Location: home.php");
            }
        }
    }
} else {

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Post an Ad </title>
    <link rel="shortcut icon" type="image/x-icon" href="fi.ico" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/postad.css" rel="stylesheet" />
    <link href="css/all.css" rel="stylesheet" />
</head>

<body id="page-top">
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
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="postad.php">Post Ad</a>
                        </li>
                        <li class="nav-item">
                            <form action="">
                                <a class="nav-link" href="allads.php">All Ads</a>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form action="">
                                <a class="nav-link" href="cart.php">Cart</a>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form class="nav-link" action="" method="post">
                                <button class="btn-link" type="submit" name="logout" value="logout">Log Out</button>
                            </form>
                        </li>

                    <?php } else { ?>
                        <li class="nav-item">
                            <form action=""><a class="nav-link" href="#sign_in">Sign-In</a><input type="hidden" name="c">
                            </form>
                        </li>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>

    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading text-uppercase">Post an Ad</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#post-ad">Click Here</a>
        </div>
    </header>


    <br /><br />

    <section class="page-section" id="post-ad">
        <div class="container">

            <div class="team-member">
                <div class="text-center">
                    <div class="form">
                        <br /><br />
                        <h1>Follow three simple steps to Post your Ad</h1>
                        <h2>Give correct information and get authentic buyers</h2>
                        <br /><br /><br />
                        <div class="row text-center">
                            <div class="col-md-4">
                                <span class="fa-stack fa-1x">
                                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fas fa-car fa-stack-1x fa-inverse"></i>
                                </span>
                                <br /><br />
                                <p class="text-muted">Information about Car</p>
                            </div>
                            <div class="col-md-4">
                                <span class="fa-stack fa-1x">
                                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                                </span>
                                <br /><br />
                                <p class="text-muted">Upload Image</p>
                            </div>
                            <div class="col-md-4">
                                <span class="fa-stack fa-1x">
                                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fas fa-file-signature fa-stack-1x fa-inverse"></i>
                                </span>
                                <br /><br />
                                <p class="text-muted">Information about Owner</p>
                            </div>
                        </div>
                        <br />
                    </div>
                    <script>
                        var carBrand = {
                            "Toyota": {
                                "Corolla": ["Altis X Manual 1.6", "Altis X 1.6 X CVT-i", "Altis X CVT-i 1.8", "Altis 1.6 X CVT-i Special Edition", "Altis Grande X CVT-i 1.8"],
                                "Yaris": ["GLI MT 1.3", "ATIV MT 1.3", "GLI CVT 1.3", "ATIV CVT 1.3", "AERO CVT 1.3", "ATIV X MT 1.5", "ATIV X CVT 1.5", "AERO CVT 1.5"],
                                "Hilux": ["E", "Revo G 2.8", "Revo G Automatic 2.8", "Revo V Automatic 2.8", "Revo Rocco", "Revo GR-S"],
                                "Fortuner": ["2.7 G", "2.7 V", "2.8 Sigma 4", "Legender", "GR-S"],
                                "Corolla Cross": ["Low Grade", "Smart Mid Grade", " Premium High Grade"],
                                "Rush": ["G M/T", "G A/T"],
                                "Hiace": ["Standard Roof", "High Roof Commuter", "High Roof Tourer", "Luxury Wagon High Grade"]
                            },
                            "Honda": {
                                "Civic": ["Standard", "Oriel", "RS"],
                                "City": ["1.2L M/T", "1.2L CVT", "1.5L CVT", "1.5L ASPIRE M/T", "1.5L ASPIRE CVT"],
                                "BR-V": ["i-VTEC S"],
                                "HR-V": ["VTi", "VTi-S"],
                            },
                            "Hyundai": {
                                "Elentra": ["GL", "GLS"],
                                "Tucson": ["FWD A/T GLS Sport", "AWD A/T Ultimate"],
                                "Sonata": ["2.0", "2.5"]
                            },
                            "Suzuki": {
                                "Cultus": ["VXR", "VXL", "Auto Gear Shift"],
                                "Alto": ["VX", "VXR", "VXR AGS", "VXL AGS"],
                                "Wagon-R": ["VXR", "VXL", "AGS"],
                                "Swift": ["GL Manual", "GL CVT", "GLX CVT"]
                            },
                            "Changhan": {
                                "Alsvin": ["1.3L MT Comfort", "1.5L DCT Comfort", "1.5L DCT Lumiere"],
                                "Oshan X7": ["X7 Comfort", "X7 Futuresense"]
                            },
                            "Proton": {
                                "Saga": ["1.3L Standard M/T", "1.3L Ace A/T", "1.3L Standard A/T"],
                                "X70": ["Executive AWD", "Premium FWD"]
                            },
                            "Kia":
                            {
                                "Picanto":
                                    ["1.0 MT", "1.0 AT"],
                                "Sportage": ["Alpha", "FWD", "AWD", "Black Limited Edition"],
                                "Stonic": ["EX", "EX+"],
                                "Sorento": ["2.4 FWD", "2.4 AWD", "3.5 FWD"]
                            }
                        }
                        window.onload = function () {
                            var newBrandSel = document.getElementById("brand");
                            var newModelSel = document.getElementById("model");
                            var newVariantSel = document.getElementById("variant");
                            for (var x in carBrand) {
                                newBrandSel.options[newBrandSel.options.length] = new Option(x, x);
                            }
                            newBrandSel.onchange = function () {
                                //empty Chapters- and Topics- dropdowns
                                newVariantSel.length = 1;
                                newModelSel.length = 1;
                                //display correct values
                                for (var y in carBrand[this.value]) {
                                    newModelSel.options[newModelSel.options.length] = new Option(y, y);
                                }
                            }
                            newModelSel.onchange = function () {
                                newVariantSel.length = 1;
                                var z = carBrand[newBrandSel.value][this.value];
                                for (var i = 0; i < z.length; i++) {
                                    newVariantSel.options[newVariantSel.options.length] = new Option(z[i], z[i]);
                                }
                            }
                        }
                    </script>
                    <br /><br /><br /><br /><br /><br />
                    <div class="form1" id="ad">
                        <br />
                        <h1>Car Information</h1>
                        <br /><br />
                        <br />
                        <form action="" method="post"enctype="multipart/form-data">
                            <div class="d-flex align-items-center" style="width:600px; justify-content:right;">
                                <h2 class="mb-0 me-4 align-text-right" style="width:160px; ">Car Brand</h2>
                                <select class="form-select" style="width:440px; " required
                                    aria-label="Default select example" id="brand" name="brand">
                                    <option selected></option>
                                </select>
                            </div>
                            <br /><br />
                            <div class="d-flex align-items-center" style="width:600px; justify-content:right;">
                                <h2 class="mb-0 me-4 align-text-right" style="width:160px; ">Car Model</h2>
                                <select class="form-select" style="width:440px; " required
                                    aria-label="Default select example" id="model" name="model">
                                    <option selected></option>

                                </select>
                            </div>
                            <br /><br />
                            <div class="d-flex align-items-center" style="width:600px; justify-content:right;">
                                <h2 class="mb-0 me-4 align-text-right" style="width:160px; ">Car Variant</h2>
                                <select class="form-select" style="width:440px; " required
                                    aria-label="Default select example" id="variant" name="variant">
                                    <option selected></option>

                                </select>
                            </div>
                            <br /><br />
                            <div class="d-flex align-items-center" style="width:600px; justify-content:right;">
                                <h2 class="mb-0 me-4 align-text-right" style="width:160px;">Car Year</h2>
                                <select class="form-select" style="width:440px;" required
                                    aria-label="Default select example" name="year" id="year">
                                    <option selected></option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                </select>
                            </div>

                            <br /><br />
                            <div class="d-flex align-items-center" style="width:600px; justify-content:right;">
                                <h2 class="mb-0 me-4 align-text-right" style="width:160px; ">Registered-In</h2>
                                <select class="form-select" style="width:440px; " aria-label="Default select example"
                                    required name="registration">
                                    <option selected></option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Karachi">Karachi</option>
                                    <option value="Islamabad">Islamabad</option>
                                    <option value="Peshawar">Peshawar</option>
                                    <option value="Quetta">Quetta</option>
                                </select>
                            </div>
                            <br /><br />
                            <div class="d-flex align-items-center" style="width:600px; justify-content:right;">
                                <h2 class="mb-0 me-4 align-text-right" style="width:160px; ">Exterior Color</h2>
                                <select class="form-select" style="width:440px; " aria-label="Default select example"
                                    name="color" required>
                                    <option selected></option>
                                    <option value="White">White</option>
                                    <option value="Black">Black</option>
                                    <option value="Grey">Grey</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Red">Red</option>
                                </select>
                            </div>
                            <br /><br />
                            <div class="d-flex align-items-center" style="width:600px; justify-content:right;">
                                <h2 class="mb-0 me-4 align-text-right" style="width:160px; ">Mileage (km)</h2>
                                <input type="text" class="form-control" style="width:440px;" name="Mileage" required>
                            </div>
                            <br /><br />
                            <div class="d-flex align-items-center" style="width:600px; justify-content:right;">
                                <h2 class="mb-0 me-4 align-text-right" style="width:160px; ">Price (PKR)</h2>
                                <input type="text" class="form-control" style="width:440px;" name="price" required>
                            </div>
                            <br /><br />
                            <div class="d-flex align-items-center" style="width:1000px; justify-content:right;">
                                <h2 class="mb-0 me-4 align-text-right" style="width:130px; ">Description</h2>
                                <input type="text" class="form-control" style="width:860px; height:250px;" name="Desc"
                                    required>
                            </div>
                            <br /><br /><br />
                    </div>
                    <br /><br /><br /><br /><br /><br /><br />
                    <div class="form1">
                        <br />
                        <h1>Upload Image</h1>
                        <input type="file" name="Carimage"  class="form-control" required>
                        <br /><br /><br /><br /><br /><br /><br />
                    </div>
                    <br /><br /><br /><br /><br /><br /><br />
                    <br /><br />
                    <input type="submit" value="Submit" name="submit">
                    </form>

                </div>
            </div>
        </div>


    </section>

    <br /><br /><br /><br /><br />

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Carology 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>


    <?php
    if (!empty($err)) {
        echo '<div class="alert alert-danger">' . $_GET['error'] . '</div>';
    }
    ?>

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