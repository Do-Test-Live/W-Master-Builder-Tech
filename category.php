<?php
session_start();
include ("config/dbconfig.php");
if (!isset($_SESSION['id'])) {
    ?>
    <script>
        alert("Please login first to post a job.");
    </script>
    <?php
}else{
    $id = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <!-- Meta setup -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="decription" content="">
    <meta name="designer" content="">

    <!-- Title -->
    <title>Welcome</title>

    <!-- Fav Icon -->
    <link rel="icon" href="images/favicon.ico"/>

    <!-- Include Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css"/>

    <!-- Main StyleSheet -->
    <link rel="stylesheet" href="css/style.css"/>

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css"/>

</head>
<body>
<!--[if lte IE 9]> <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
        href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- main-wrapper start -->
<main class="main-wrapper">
    <div class="main-part main-partbg2">
        <div class="build-masttitle">
            <h2>Building <br> Master Tech</h2>
        </div>

        <?php
        if (isset($_SESSION['success'])) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Job has been posted successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['success']);
        }elseif (isset($_SESSION['profile_update'])){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Profile has been posted successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['profile_update']);
        }
        ?>

        <div class="desired-part">
            <h2>Desired</h2>
            <div class="desired-item">
                <div class="desired-box desired1">
                    <a href="booking.php?id=1">
                        <p>Maintenance <br>& <br> Install</p>
                    </a>
                </div>
                <div class="desired-box desired2">
                    <a href="booking.php?id=2">
                        <p>Renovation</p>
                    </a>
                </div>
                <div class="desired-box desired3">
                    <a href="booking.php?id=3">
                        <p>Move house <br>servise</p>
                    </a>
                </div>
                <div class="desired-box desired4">
                    <a href="booking.php?id=4">
                        <p>Radiator <br>service</p>
                    </a>
                </div>
                <div class="desired-box desired5">
                    <a href="booking.php?id=5">
                        <p>Cleaning <br>service</p>
                    </a>
                </div>
                <div class="desired-box desired6">
                    <a href="booking.php?id=6">
                        <p>Whole <br>house <br>decoration</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="desired-part">
            <h2 class="desired-ttl2">Referral</h2>
            <div class="desired-item">
                <div class="desired-box desired7">
                    <a href="booking.php?id=7">
                        <p>Electric <br> Lamp <br> safety camera</p>
                    </a>
                </div>
                <div class="desired-box desired8">
                    <a href="booking.php?id=8">
                        <p>Water tap <br>Plumbing</p>
                    </a>
                </div>
                <div class="desired-box desired9">
                    <a href="booking.php?id=9">
                        <p>Cleaning Roof</p>
                    </a>
                </div>
                <div class="desired-box desired10">
                    <a href="booking.php?id=10">
                        <p>Painting <br>works</p>
                    </a>
                </div>
                <div class="desired-box desired11">
                    <a href="booking.php?id=11">
                        <p>Door <br>Lock</p>
                    </a>
                </div>
                <div class="desired-box desired12">
                    <a href="booking.php?id=12">
                        <p>Aluminium <br>Window <br>door</p>
                    </a>
                </div>
                <div class="desired-box desired13">
                    <a href="booking.php?id=13">
                        <p>Radiator <br>service</p>
                    </a>
                </div>
                <div class="desired-box desired14">
                    <a href="booking.php?id=14">
                        <p>Disinfection</p>
                    </a>
                </div>
                <div class="desired-box desired15">
                    <a href="booking.php?id=15">
                        <p>Pest <br>Control</p>
                    </a>
                </div>
                <div class="desired-box desired16">
                    <a href="booking.php?id=16">
                        <p>Electric <br>Boiler <br>inspection</p>
                    </a>
                </div>
            </div>
        </div>

        <?php
        include('include/footer.php');
        ?>
    </div>
</main>
<!-- main-wrapper end -->

<!-- Main jQuery -->
<script src="js/jquery-3.4.1.min.js"></script>

<!-- Bootstrap jQuery -->
<script src="js/bootstrap.bundle.js"></script>

<!-- Fontawesome Script -->
<script src="https://kit.fontawesome.com/7749c9f08a.js"></script>

<!-- Custom jQuery -->
<script src="js/scripts.js"></script>
</body>
</html>
