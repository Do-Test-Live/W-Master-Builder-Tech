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
        <link rel="icon" href="images/favicon.ico" />   

        <!-- Include Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css" />

        <!-- Main StyleSheet -->
        <link rel="stylesheet" href="css/style.css" />
        
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css" /> 
        
    </head>
    <body>
        <!--[if lte IE 9]> <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p><![endif]-->

        <!-- main-wrapper start -->
        <main class="main-wrapper">
            <div class="main-part">
                <div class="heading-cnt pb-1">
                    <h1>Setting</h1>
                </div>
                <div class="content-part">
                    <div class="settings-part">
                        <div class="settings-box">
                            <p>Language: </p>
                            <div class="lang-btn">
                                <button type="button">English</button>
                                <button type="button">Chinese</button>
                            </div>
                        </div>
                        <div class="settings-box">
                            <p>Push broadcast: </p>
                            <div class="lang-btn">
                                <button type="button">Yes</button>
                                <button type="button">No</button>
                            </div>
                        </div>
                        <div class="settings-box">
                            <p>Push message: </p>
                            <div class="lang-btn">
                                <button type="button">Yes</button>
                                <button type="button">No</button>
                            </div>
                        </div>
                        <div class="settings-box">
                            <p>Privacy policy: </p>
                            <div class="lang-btn">
                                <button type="button">Yes</button>
                                <button type="button">No</button>
                            </div>
                        </div>
                    </div>
                    <div class="submit-btn text-center mt-3">
                        <a href="#">
                            <button type="submit" name="signup" style="width: 200px;">Save</button>
                        </a>
                    </div>
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
