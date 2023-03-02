<?php
include("config/dbconfig.php");
$result = 0;
session_start();
$id = $_SESSION["id"];

$select = $con->query("select * from user where `id` = '$id'");
if($select){
    while($row = mysqli_fetch_assoc($select)){
        $email = $row['user_email'];
    }
}

if (isset($_POST['verify_email'])) {
    $v_code = mysqli_real_escape_string($con, $_POST['v_code']);
    $update_query = $con->query("UPDATE `user` SET `status`='1' WHERE `user_email` = '$email' and `vcode` = '$v_code'");
    if ($update_query) {
        $user_type = $con->query("select type from user where id = $id");
        if($user_type){
            while ($row = mysqli_fetch_assoc($user_type)){
                $type = $row['type'];
            }
        }
        session_start();
        $_SESSION['id'] = $id;
        if($type == 0){
            header('Location: category.php');
        }elseif ($type == 1){
            header('Location: master_profile.php');
        }
    } else {
        header('Location: index.php');
    }
}

if (isset($_POST['resend_email'])) {
    $select_query = $con->query("select vcode from user where `user_email` = '$email'");
    if($select_query->num_rows == 1){
        while ($data = mysqli_fetch_assoc($select_query)){
            $vcode = $data['vcode'];
        }
    }

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
        Header("Location: email_verify.php");
    }

}

?>
<!DOCTYPE html>
<html lang="en-US" xmlns="http://www.w3.org/1999/html">
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
                    <label for="a1">Verification Code</label>
                    <input type="text" name="v_code" id="a1" placeholder="6 Digit Code Here" required>
                </div>
                <div class="submit-btn text-center">
                    <button type="submit" name="verify_email">Verify Email</button>
                </div>
            </form>
            <form action="#" method="post">
            <div class="submit-btn text-center mt-3">
                <button type="submit" name="resend_email">Resend Email</button>
            </div>
            </form>
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
