<?php
include("config/dbconfig.php");
$result = 0;
if (isset($_POST['verify_email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    /*$password = mysqli_real_escape_string($con, $_POST['password']);
    $key = 'master-builder';
    $Pwd_peppered = Hash_hmac("Sha256", $password, $key);*/
    $query = $con->query("select `vcode` from user where `user_email` = '$email'");
    if ($query->num_rows == 1) {
        while ($row = mysqli_fetch_assoc($query)) {
            $vcode = $row['vcode'];
            $email_to = $email;
            $subject = 'Verify your email.';


            $headers = "From: Building Master Tech <mingowhk@gmail.com>\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $messege = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='max-width: 600px; min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                
                    <p style='text-align: center;color:green;font-weight:bold'>Thank you for reaching out to us!</p>
                
                    <p style='color:black;text-align: center'>
                        6 digit authentication code for your email verification is : <strong>$vcode</strong>
                    </p>
                </div>
                </body>
            </html>";

            if (mail($email_to, $subject, $messege, $headers)) {
                Header("Location: verify_email.php?email=".$email);
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

                <div class="submit-btn text-center">
                    <button type="submit" name="verify_email">Verify Email</button>
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
