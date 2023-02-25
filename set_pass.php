<?php
include("config/dbconfig.php");
$result = 0;
$email = $_GET['email'];
if (isset($_POST['login'])) {
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $key = 'master-builder';
    $Pwd_peppered = Hash_hmac("Sha256", $password, $key);
    $Pwd_hashed = Password_hash($Pwd_peppered, PASSWORD_ARGON2ID);
    $query = $con->query("UPDATE `user` SET `password`='$Pwd_hashed' where `user_email` = '$email'");
    if ($query) {
        $fetch_id = $con->query("select id from user where `user_email` = '$email'");
        if($fetch_id){
            while ($row = mysqli_fetch_assoc($fetch_id)) {
                session_start();
                $_SESSION["id"] = $row['id'];
                header("Location: category.php");
            }
        }
    }
}

?><!DOCTYPE html>
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
    <link rel="stylesheet" href="toaster/toastr.min.css"/>

</head>
<body>
<!--[if lte IE 9]> <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
    href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- main-wrapper start -->
<main class="main-wrapper">
    <div class="main-part">
        <div class="heading-cnt">
            <h1>Set Password
            </h1>
        </div>
        <div class="content-part">
            <form action="#" method="post">
                <div class="email-box">
                    <label for="pass_log_id">New Password</label>
                    <div class="hideshow-pass">
                        <input id="pass_log_id" type="password" name="password" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye-slash field_icon toggle-password"></span>
                    </div>
                </div>

                <div class="submit-btn text-center">
                    <button type="submit" name="login">Login</button>
                </div>
            </form>
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
