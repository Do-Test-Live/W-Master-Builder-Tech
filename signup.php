<?php
include("config/dbconfig.php");
$result = 0;
if (isset($_POST["signup"])) {
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $key = 'master-builder';
    $Pwd_peppered = Hash_hmac("Sha256", $password, $key);
    $Pwd_hashed = Password_hash($Pwd_peppered, PASSWORD_ARGON2ID);
    $v_code = rand(100000, 999999);

    $email_check = $con->query("select id from user where useremail = '$email'");
    if ($email_check->num_rows > 0) {
        $result = 1;
    } else {
        $signup_query = $con->query("INSERT INTO `user`(`phone`, `name`, `user_email`, `address`, `password`, `type`,`vcode`) VALUES ('$phone','$name','$email','$address','$Pwd_hashed','$type','$v_code')");
        if ($signup_query) {
            $result = 2;
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
                        6 digit authentication code for your email verification is : <strong>$v_code</strong>
                    </p>
                </div>
                </body>
            </html>";

            if (mail($email_to, $subject, $messege, $headers)) {
                $select = $con->query("select id from user where `user_email` = '$email'");
                if($select){
                    while($row = mysqli_fetch_assoc($select)){
                        $id = $row['id'];
                    }
                }
                session_start();
                $_SESSION["id"] = $id;
                Header("Location: email_verify.php");
            }
        } else {
            echo "something went wrong";
            $value = 1;
        }
    }
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
    <div class="main-part">
        <div class="heading-cnt">
            <h1>Signin form</h1>
        </div>
        <div class="content-part">
            <form action="#" method="post">
                <div class="email-box">
                    <label for="a1">Phone</label>
                    <input type="tel" name="phone" id="a1" placeholder="" required>
                </div>
                <div class="email-box">
                    <label for="a2">Full Name</label>
                    <input type="text" name="name" id="a2" placeholder="" required>
                </div>
                <div class="email-box">
                    <label for="disabledSelect" class="form-label">Choose Your Role</label>
                    <select id="disabledSelect" name="type" class="form-select">
                        <option value="0">User</option>
                        <option value="1">Master</option>
                    </select>
                </div>
                <div class="email-box">
                    <label for="a3">Email</label>
                    <input type="email" name="email" id="a3" placeholder="" required>
                </div>
                <div class="email-box">
                    <label for="pass_log_id">Password <span style="font-size: 12px;">(At least 1 Capital Letter, 1 small letter, 1 number and 1 special character)</span></label>
                    <div class="hideshow-pass">
                        <input id="pass_log_id" type="password" name="password"
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye-slash field_icon toggle-password"></span>
                    </div>
                </div>
                <div class="email-box">
                    <label for="addr">Address</label>
                    <textarea name="address" id="addr" cols="30" rows="4" placeholder=""></textarea>
                </div>
                <div class="submit-btn text-center">
                    <button type="submit" name="signup">Submit</button>
                </div>
            </form>
        </div>
        <?php
        include("include/footer.php");
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
