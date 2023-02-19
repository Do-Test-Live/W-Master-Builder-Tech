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
        <div class="build-masttitle" style="text-align: end;" >
            <select class="form-select" aria-label="Default select example" style="display: inline; font-weight: bold;" onchange="window.location.href = this.value;">
                <option selected style="font-weight: bold;" value="index.php">中文</option>
                <option value="home_eng.php" style="font-weight: bold;">ENG</option>
            </select>
        </div>

        <div class="row">
            <img src="images/master_home.jpg" alt="" width="100%">
        </div>

        <div class="desired-part">
            <div class="row text-center mt-5">
                <h4>師傅配對 預先審查</h4>
                    <h4>師傅均通過驗證，質素保證</h4>
                <h4>免費配對附近師傅</h4>
                   <h4> 一般距離用戶約10英里內</h4>
            </div>
        </div>
        <div class="submit-btn text-center mt-3">
            <a href="signup.php">
                <button type="submit" name="signup" style="width: 200px;">Become Member</button>
            </a>
        </div>
        <div class="submit-btn text-center mt-3">
            <a href="login.php">
                <button type="submit" name="signup" style="width: 200px;">Login</button>
            </a>

        </div>


        <?php
        include ('include/footer.php');
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
