<?php
require './connect.php';
session_start();
$brand = $model = $variant = "";
$brand = $_SESSION["NC-Brand"];
$model = $_SESSION["NC-Model"];
$variant = $_SESSION["NC-Variant"];
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    if (isset($_POST["logout"])) {
        $_SESSION["loggedin"] = false;
        header("location: home.php");
    }
} else {

}
$sql = "SELECT car.Car_Model, car_variants.Variant_Name, car_variants.Gear, car_variants.Engine_CC, car_variants.Engine_type,car.Car_Brand,car_variants.Price
FROM `car_variants` JOIN `car` ON `car_variants`.`Car_Model`=`car`.`Car_Model`
 WHERE `car`.`Car_Model`='$model' AND car.Car_Brand='$brand' AND Variant_Name='$variant'";
$result = ($conn->query($sql));
$row = [];
if ($result->num_rows > 0) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
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
    <title>Description</title>
    <link rel="shortcut icon" type="image/x-icon" href="fi.ico" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/cardesc.css" rel="stylesheet" />
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
                    <li class="nav-item"><a class="nav-link" href="">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="">About</a></li>
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
    <br /><br />

    <section class="page-section" id="post-ad">
        <div class="container">

            <div class="team-member">
                <div class="text-center">
                    <div class="form1">
                        <br /> <br /><br /><br />
                        <?php
                        $i = 1;
                        if (!empty($row))
                            foreach ($row as $rows) {
                                ?>
                                <h1>
                                    <?php echo $rows['Car_Brand'];
                                    echo " ";
                                    echo $rows['Car_Model'] ?>
                                </h1>

                                <br /><br />

                                <table style="width:40rem;  margin:auto">
                                    <tr>
                                        <th></th>
                                        <th></th>

                                    </tr>


                                    <tr style="height:5rem;">
                                        <td style="text-align:center; width:5.5rem; border-bottom-style:solid; border-bottom-color:lightgrey; border-right-style:solid; 
        border-right-color:lightgrey; border-bottom-width:3px; border-right-width:3px;">Car
                                            Variant</td>
                                        <td
                                            style="text-align:center;width:5rem; border-bottom-style:solid; border-bottom-color:lightgrey; border-bottom-width:3px;">
                                            <?php echo $rows['Variant_Name']; ?></td>

                                    </tr>


                                    <tr style="height:5rem;">
                                        <td style="width:5.5rem; border-bottom-style:solid; border-bottom-color:lightgrey; border-right-style:solid; 
        border-right-color:lightgrey; border-bottom-width:3px; border-right-width:3px;">
                                            Engine Capacity</td>
                                        <td
                                            style="width:5rem; border-bottom-style:solid; border-bottom-color:lightgrey; border-bottom-width:3px;">
                                            <?php echo $rows['Engine_CC']; ?> </td>

                                    </tr>
                                    <tr style="height:5rem;">
                                        <td style="width:5.5rem; border-bottom-style:solid; border-bottom-color:lightgrey; border-right-style:solid; 
        border-right-color:lightgrey; border-bottom-width:3px; border-right-width:3px;">
                                            Engine type</td>
                                        <td
                                            style="width:5rem; border-bottom-style:solid; border-bottom-color:lightgrey; border-bottom-width:3px;">
                                            <?php echo $rows['Engine_type']; ?> </td>

                                    </tr>
                                    </tr>
                                    <tr style="height:5rem;">
                                        <td style="width:5.5rem; border-bottom-style:solid; border-bottom-color:lightgrey; border-right-style:solid; 
        border-right-color:lightgrey; border-bottom-width:3px; border-right-width:3px;">
                                            Gear Transmission</td>
                                        <td
                                            style="width:5rem; border-bottom-style:solid; border-bottom-color:lightgrey; border-bottom-width:3px;">
                                            <?php echo $rows['Gear']; ?> </td>

                                    </tr>

                                    <tr style="height:5rem;">
                                        <td
                                            style="width:5.5rem; border-bottom-style:solid; border-bottom-color:lightgrey; border-right-style:solid; 
        border-right-color:lightgrey; border-bottom-width:3px; border-right-width:3px; font-weight:bold; font-size:1.5rem;">
                                            Price</td>
                                        <td
                                            style="width:5rem; border-bottom-style:solid; border-bottom-color:lightgrey; 
                                            border-bottom-width:3px;">
                                            <?php echo $rows['Price']; ?> </td>

                                    </tr>


                                </table>
                                <?php
                                break;
                            } ?>



                        <br /><br /><br /><br /><br /><br />


                    </div>
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