<!-- Favicons -->
<?php $page_name = str_replace(dirname($_SERVER['PHP_SELF']).'/', '', $_SERVER['PHP_SELF']); 


$services = "services.php";
$index = "index.php";
$profile = "profile.php";
$profile_settings = "profile_settings.php";
$ot = "";

if($page_name != $index){
    $ot = "../";
}else{
    $ot = "";
}

?>
<!-- Google Fonts -->
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
<!-- Vendor CSS Files -->
<link href="<?php echo $ot; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $ot; ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="<?php echo $ot; ?>assets/vendor/aos/aos.css" rel="stylesheet">
<link href="<?php echo $ot; ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="<?php echo $ot; ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href="<?php echo $ot; ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<script src="<?php echo $ot;?>assets/vendor/bs4-toast.js"></script>
<link href="<?php echo $ot; ?>assets/vendor/bs4Toast.css" rel="stylesheet">
<!-- Template Main CSS File -->
<link href="<?php echo $ot; ?>assets/css/style.css" rel="stylesheet">

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span>SpikeExcel</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <?php  if($page_name == $profile || $page_name == $profile_settings){ ?>
                <li><a class="nav-link scrollto active" href="../index.php">Home</a></li>
                <li><a href="../services/services.php">Services</a></li>
                <?php
                }else{
               ?>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>

                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <?php
                        }
                        ?>

                <?php  if($_SESSION['autoriser'] == "oui"){ include_once('assets/php/session_history.php'); ?>

                <li class="dropdown"><a href="#"><span><?php echo  $_SESSION['username']; ?></span><i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="<?php echo $ot; ?>profile/profile.php">Profile</a></li>
                        <li><a href="<?php echo $ot; ?>services/services.php">Services</a></li>
                        <li><a href="#">My Folder</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto"
                        style="background-color: #4154f1; color: #fff; padding: 3px 5px; border-radius: 4px; font-size: .8em; margin-left: 0.8em;"
                        href="<?php echo $ot; ?>auth/logout.php">Log-out<i class="bi bi-box-arrow-right"></i></a></li>

                <?php
                }else{
               ?>
                <li><a class="nav-link scrollto" href="auth/login/login.php">Login</a></li>
                <li><a class="getstarted scrollto" href="auth/register/register.php">Get Started</a></li>
                <?php
                        }
                        ?>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<!-- Vendor JS Files -->
<script src="<?php echo $ot; ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?php echo $ot; ?>assets/vendor/aos/aos.js"></script>
<script src="<?php echo $ot; ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo $ot; ?>assets/vendor/purecounter/purecounter.js"></script>
<script src="<?php echo $ot; ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo $ot; ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<!-- Template Main JS File -->
<script src="<?php echo $ot; ?>assets/js/main.js"></script>