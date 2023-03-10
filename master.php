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
                    <h1>Master Page</h1>
                    <p>Mr. Wong | B Ltd.</p>
                </div>
                <div class="content-part">
                    <div class="block-mstbox">
                        <h6>Description:</h6>
                        <div class="record-cntbox">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                        </div>
                    </div>

                    <div class="total-box">
                        <p>Total Rate</p>
                        <h4>4.95 <img src="images/star.png" alt=""></h4>
                    </div>

                    <div class="reference-box">
                        <h4>Reference</h4>
                        <div class="reference-item">
                            <div class="reference-inner">
                                <img src="images/reference-1.png" alt="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            </div>
                            <div class="reference-inner">
                                <img src="images/reference-2.png" alt="">
                            </div>
                            <div class="reference-inner">
                                <img src="images/reference-3.png" alt="">
                            </div>
                            <div class="reference-inner">
                                <img src="images/reference-4.png" alt="">
                            </div>
                            <div class="reference-inner">
                                <img src="images/reference-5.png" alt="">
                            </div>
                            <div class="reference-inner">
                                <img src="images/reference-6.png" alt="">
                            </div>
                            <div class="reference-inner">
                                <img src="images/reference-7.png" alt="">
                            </div>
                            <div class="reference-inner">
                                <img src="images/reference-8.png" alt="">
                            </div>
                            <div class="reference-inner">
                                <img src="images/reference-9.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include ('include/footer.php');
                ?>
            </div>
        </main>
        <!-- main-wrapper end -->

        <!-- modal-area1 start -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="reference-mdlbox1">
                            <img src="images/reference-mdl1.png" alt="">
                            <form action="#">
                                <div class="reference-mdlcnt">
                                    <p>Cate</p>
                                    <input type="text" value="Disinfection">
                                </div>
                                <div class="reference-mdlcnt">
                                    <p>Date</p>
                                    <input type="text" value="01/10/2000">
                                </div>
                                <div class="reference-mdlcnt">
                                    <p>Price</p>
                                    <input type="text" value="$120000">
                                </div>
                                <div class="reference-descbox">
                                    <p>Description</p>
                                    <textarea name="" id="" cols="30" rows="2"> Lorem ipsum is placeholder text commonly used in the graphic</textarea>
                                </div>
                                <div class="back-btn text-center">
                                    <button type="button">Back</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal-area1 start -->

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
