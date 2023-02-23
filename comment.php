<?php
session_start();
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
                    <h1>Comment</h1>
                    <!--<p>Mr. Wong | B Ltd.</p>-->
                </div>
                <div class="content-part">
                    <div class="block-mstbox comment-textcnt">
                        <h6>Mr. Wong</h6>
                        <div class="container">
                            <div class="row flex align-items-center justify-content-center">
                                <img src="images/review/1.png" alt="review image" style="padding: 0 !important;">
                            </div>
                        </div>
                        <div class="record-cntbox">
                            <p>This is great platfotm finding master.</p>
                        </div>
                        <h6>Mr. Ying</h6>
                        <div class="container">
                            <div class="row flex align-items-center justify-content-center">
                                <img src="images/review/2.png" alt="review image" style="padding: 0 !important;">
                            </div>
                        </div>
                        <div class="record-cntbox">
                            <p>Easy to find qualified masters from this platform. Recommended.</p>
                        </div>
                        <h6>Mr. Chun</h6>
                        <div class="container">
                            <div class="row flex align-items-center justify-content-center">
                                <img src="images/review/3.png" alt="review image" style="padding: 0 !important;">
                            </div>
                        </div>
                        <div class="record-cntbox">
                            <p>Beautiful platform for the masters to find new jobs for them.</p>
                        </div>
                        <h6>Mr. Cheuk</h6>
                        <div class="container">
                            <div class="row flex align-items-center justify-content-center">
                                <img src="images/review/4.png" alt="review image" style="padding: 0 !important;">
                            </div>
                        </div>
                        <div class="record-cntbox">
                            <p>All the masters here know there jobs very well. I am completely satisfy with their works.</p>
                        </div>
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
