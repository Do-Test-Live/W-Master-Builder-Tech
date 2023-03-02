<?php
include("config/dbconfig.php");
$result = 0;
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $key = 'master-builder';
    $Pwd_peppered = Hash_hmac("Sha256", $password, $key);
    $query = $con->query("select `password`,`status`,`id`,`type` from user where `user_email` = '$email'");
    if ($query->num_rows == 1) {
        while ($row = mysqli_fetch_assoc($query)) {
            $pass = $row["password"];
            if (Password_verify($Pwd_peppered, $pass) && $row['status'] == 1) {
                $id = $row['id'];
                $user_type = $con->query("select type from user where id = '$id'");
                if($user_type){
                    while ($data = mysqli_fetch_assoc($user_type)){
                        $type = $data['type'];
                    }
                }
                session_start();
                $_SESSION["id"] = $row['id'];
                if($type == 0){
                    header('Location: category.php');
                }elseif ($type == 1){
                    $master_check = $con->query("select * from master_document where user_id = '$id'");
                    if($master_check->num_rows > 0){
                        header('Location: category.php');
                    }else{
                        header('Location: master_profile.php');
                    }
                }
            }
            else {
                $result = 2;
            }
        }
    } else {
        $result = 1;
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
            <h1>Login
            </h1>
        </div>
        <div class="content-part">
            <form action="#" method="post">
                <div class="email-box">
                    <label for="a1">Email</label>
                    <input type="email" name="email" id="a1" placeholder="Email Here" required>
                </div>
                <div class="email-box">
                    <label for="pass_log_id">Password</label>
                    <div class="hideshow-pass">
                        <input id="pass_log_id" type="password" name="password" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye-slash field_icon toggle-password"></span>
                    </div>
                </div>
                <div class="help-cnt">
                    <a href="signup.php">
                        <p>Sign Up</p>
                    </a>
                </div>
                <div class="help-cnt">
                    <a href="forget_pass.php">
                        <p>Forget Password</p>
                    </a>
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
