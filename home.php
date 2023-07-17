<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    if (isset($_POST["logout"])) {
        $_SESSION["loggedin"] = false;
        header("location: home.php");
    }
} else {

}
if (isset($_POST["submit1"])) {
    $_SESSION["NC-Brand"] = $_POST["New_Car_Brand"];
    $_SESSION["NC-Model"] = $_POST["New_Car_Model"];
    $_SESSION["NC-Variant"] = $_POST["New_Car_Variant"];
    header("location: newCarDesc.php");
}
if (isset($_POST["submit2"])) {
    $_SESSION["OC_Brand"] = $_POST["Old_Car_Brand"];
    $_SESSION["OC_Model"] = $_POST["Old_Car_Model"];
    $_SESSION["OC_Variant"] = $_POST["Old_Car_Variant"];
    $_SESSION["OC_Year"] = $_POST["Old_Car_Year"];
    $_SESSION["OC_Max_Price"] = $_POST["Old_Car_Max_Price"];
    $_SESSION["OC_Min_Price"] = $_POST["Old_Car_Min_Price"];
    header("location: oldcar.php");
}
if (isset($_POST["submit3"])) {
    $_SESSION["IPrice"] = $_POST["I_Price"];
    header("location: insurance.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Carology - The World of Cars </title>
    <link rel="shortcut icon" type="image/x-icon" href="fi.ico" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/home.css" rel="stylesheet" />
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

                    <li class="nav-item"><a class="nav-link" href="#page-top">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>

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
    <header class="videoc">
        <video height="100%" width="100%" autoplay loop muted class="newvid">
            <source src="images/vid1.mp4" type="video/mp4" />
        </video>
        <div class="container">
            <br />
            <div class="videoc-heading">Welcome To</div>
            <div class="videoc-heading2"> Carology!</div>
            <div class="videoc-subheading">We are one of the fastest growing website for car related stuff.<br /> Our
                website offers a variety of options for those looking to purchase a new car, <br />an old car, or car
                accessories. So, why wait? Explore our website today and find <br /> the perfect car and accessories for
                you!</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Let's Explore</a>
        </div>
    </header>
    <!-- Whats on our website-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h3 class="section-heading text-uppercase">What's on our Website!</h3><br />

            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-car fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Sell/Buy Car </h4>
                    <p class="text-muted">You can sell or buy a car of all brands on the basis of brands, budget,
                        features etc.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Accessories</h4>
                    <p class="text-muted">Get all the car related accessories of your choice by just a click.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-file-signature fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Insurance</h4>
                    <p class="text-muted">Get your car secure with an insurance policy of your choice.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2><br />

            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="images/newcarf.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">New Car</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="images/oldcarf.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Old Car</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" href="accessories.php">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="images/acc.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Accessories</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 mb-4 mb-lg-0">
                    <!-- Portfolio item 4-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="images/insf.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Insurance</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </section>

    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2><br /><br />

            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="images/missf.jpg"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">

                            <h4 class="subheading">Our Mission</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Our mission is to provide car enthusiasts with a one-stop-shop for
                                everything related to cars. We will provide you in-depth information related the cars
                                uploaded, all of there relevent accessories and best insurance policy for your car!</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="images/teamf.jpg"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">

                            <h4 class="subheading">Our Team</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Our team consists of passionate car enthusiasts who are committed to
                                delivering the best content possible. We are constantly updating our content to ensure
                                that our readers are getting accurate and up-to-date information.!</p>
                        </div>
                    </div>
                </li>

            </ul>

            <br /><br />
            <p class="text-muted10"> Thank you for choosing Carology for all your car-related needs.<br /> We look
                forward to serving you and helping you find your dream car.</p>
        </div>




        </div>
    </section>
    <h1 id="sign_in"></h1>
    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
        <!--Post An add-->
        <section class="page-section" id="ad">
            <div class="container">
                <div class="text-right1">
                    <h3 class="section-heading text-uppercase">Post an Ad</h3><br /><br />
                    <div class="ad-steps">
                        <p><i class="fas fa-arrow-right"></i> Follow 3 simple steps to post your AD for FREE</p>
                        <p><i class="fas fa-arrow-right"></i> Get in touch with authentic buyers</p>
                        <p><i class="fas fa-arrow-right"></i> Sell your car at your own desired price</p>
                    </div>
                    <br /><br />
                    <a class="btn btn-primary btn-xl text-uppercase" href="postad.php">Post Ad</a>
                </div>

                <div class="image">
                    <img class="image" src="images/postad2.jpg" />
                </div>
            </div>

        </section>

    <?php } else { ?>
        <!--sign in-->
        <section class="page-section bg-light">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Sign-In</h2><br />
                    <h3 class="section-subheading text-muted">Get yourself register or log-in to your existing account to
                        avail great offers.<br /> Signing-In will enable you to Post an Ad to sell your car and will get you
                        genuine buyers.<br />So Sign-In to our website now to make your car-related experiences much easier
                        and efficient.</h3>
                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="images/images.png" alt="..." /><br /> <br />

                            <a class="btn btn-primary btn-xl text-uppercase" href="signin.php">Sign-In</a>

                        </div>
                    </div>

                </div>

            </div>
        </section>
    <?php } ?>



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
    >
    <!-- Portfolio Modals-->
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
            var newBrandSel = document.getElementById("New_Car_Brand");
            var newModelSel = document.getElementById("New_Car_Model");
            var newVariantSel = document.getElementById("New_Car_Variant");
            var oldBrandSel = document.getElementById("Old_Car_Brand");
            var oldModelSel = document.getElementById("Old_Car_Model");
            var oldVariantSel = document.getElementById("Old_Car_Variant");
            var IBrandSel = document.getElementById("I_Brand");
            var IModelSel = document.getElementById("I_Model");
            var IVariantSel = document.getElementById("I_Variant");
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

            for (var x in carBrand) {
                oldBrandSel.options[oldBrandSel.options.length] = new Option(x, x);
            }
            oldBrandSel.onchange = function () {
                //empty Chapters- and Topics- dropdowns
                oldVariantSel.length = 1;
                oldModelSel.length = 1;

                //display correct values
                for (var y in carBrand[this.value]) {
                    oldModelSel.options[oldModelSel.options.length] = new Option(y, y);
                }
            }
            oldModelSel.onchange = function () {
                oldVariantSel.length = 1;
                var z = carBrand[oldBrandSel.value][this.value];
                for (var i = 0; i < z.length; i++) {
                    oldVariantSel.options[oldVariantSel.options.length] = new Option(z[i], z[i]);
                }
            }
            for (var x in carBrand) {
                IBrandSel.options[IBrandSel.options.length] = new Option(x, x);
            }
            IBrandSel.onchange = function () {
                //empty Chapters- and Topics- dropdowns
                IVariantSel.length = 1;
                IModelSel.length = 1;

                //display correct values
                for (var y in carBrand[this.value]) {
                    IModelSel.options[IModelSel.options.length] = new Option(y, y);
                }
            }
            IModelSel.onchange = function () {
                IVariantSel.length = 1;
                var z = carBrand[IBrandSel.value][this.value];
                for (var i = 0; i < z.length; i++) {
                    IVariantSel.options[IVariantSel.options.length] = new Option(z[i], z[i]);
                }
            }
        }
    </script>
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="images/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">NEW CAR</h2>
                                <br />
                                <form action="" method="post" id="NewCar">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <h4>Car Brands</h4>

                                                <select class="form-select" aria-label="Default select example"
                                                    id="New_Car_Brand" name="New_Car_Brand" form="NewCar" required>
                                                    <option selected>Select Brand</option>
                                                </select>
                                                <br />
                                                <br />
                                                <h4>Car Model</h4>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="New_Car_Model" name="New_Car_Model" form="NewCar" required>
                                                    <option selected>Select Model</option>
                                                </select>
                                                <br />
                                                <br />
                                                <h4>Car Variant</h4>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="New_Car_Variant" name="New_Car_Variant" form="NewCar" required>
                                                    <option selected>Select Brand</option>
                                                </select>
                                                <br />
                                                <br />


                                            </div>
                                        </div>
                                    </div>

                                    <input type='submit' class="btn btn-primary btn-xl text-uppercase"
                                        data-bs-dismiss="modal" name="submit1" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="images/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <div class="modal-body">
                                <!-- Project details-->
                                <form action="" method="post" id="Old_CarBrand">
                                    <h2 class="text-uppercase">Old Car</h2>
                                    <br />
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <h4>Car Brand</h4>

                                                <select class="form-select" aria-label="Default select example"
                                                    id="Old_Car_Brand" name="Old_Car_Brand" form="Old_CarBrand">
                                                    <option selected></option>
                                                </select>
                                                <br />
                                                <h4>Car Model</h4>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="Old_Car_Model" name="Old_Car_Model" form="Old_CarBrand">
                                                    <option selected></option>
                                                </select>
                                                <br />
                                                <h4>Car Variant</h4>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="Old_Car_Variant" name="Old_Car_Variant" form="Old_CarBrand">
                                                    <option selected></option>
                                                </select>
                                                <br />
                                                <h4>Car Year</h4>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="Car_Year"
                                                        name="Old_Car_Year">
                                                </div>
                                                <h4>Maximum Price</h4>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="Max_Price"
                                                        name="Old_Car_Max_Price">
                                                </div>
                                                <h4>Minimum Price</h4>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="Min_Price"
                                                        name="Old_Car_Min_Price">
                                                </div>




                                            </div>
                                        </div>
                                    </div>
                                    <input type='submit' class="btn btn-primary btn-xl text-uppercase"
                                        data-bs-dismiss="modal" name="submit2" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="images/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Finish
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Identity
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="images/close-icon.svg" alt="Close modal" />
                </div>
                <form action="" method="post" id="ICar">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h4>Car Brands</h4>

                                <select class="form-select" aria-label="Default select example" name="I_Brand"id="I_Brand"required>
                                    <option selected>Select Brand</option>
                                </select>
                                <br />
                                <br />
                                <h4>Car Model</h4>
                                <select class="form-select" aria-label="Default select example" name="I_Model"id="I_Model"form="ICar" required>
                                    <option selected>Select Model</option>
                                </select>
                                <br />
                                <br />
                                <h4>Car Variant</h4>
                                <select class="form-select" aria-label="Default select example" name="I_Variant"id="I_Variant"required>
                                    <option selected>Select Variant</option>
                                </select>
                                <br />
                                <br />
                                <h4>Price</h4>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="I_Price"required>
                                </div>
                                <br />
                                <br />
                            </div>
                        </div>
                    </div>

                    <input type='submit' class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"name="submit3"value="Find Values"/>
                </form>
            </div>
        </div>
    </div>



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