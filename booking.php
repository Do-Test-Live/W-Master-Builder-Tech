<?php
include ("config/dbconfig.php");
$cat_id = $_GET['id'];
$cat_select = $con->query("select cat_name from category where cat_id = '$cat_id'");
if($cat_select){
    while ($cat_data = mysqli_fetch_assoc($cat_select)){
        $cat_name = $cat_data['cat_name'];
    }
}
if (isset($_POST['job_submit'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $contact = mysqli_real_escape_string($con,$_POST['contact']);
    $postcode = mysqli_real_escape_string($con,$_POST['postcode']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $time = mysqli_real_escape_string($con,$_POST['time']);
    $budget = mysqli_real_escape_string($con,$_POST['budget']);
    $license = mysqli_real_escape_string($con,$_POST['license']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $c_image = $_FILES['image']['name'];
    $c_image_temp=$_FILES['image']['tmp_name'];
    $imageFileType = strtolower(pathinfo($c_image,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ){
        echo "wrong file extension";
    }else{
        if(move_uploaded_file($c_image_temp , "images/jobs/$c_image")){
            $insert_job = $con->query("INSERT INTO `jobs`(`name`, `contact`, `post_code`, `address`, `time`, `budget`, `license`, `desctription`, `image`,`cat_name`) 
VALUES ('$name','$contact','$postcode','$address','$time','$budget','$license','$description','$c_image','$cat_name')");
            if($insert_job){
                header('Location: index.php');
            }
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
                <div class="heading-cnt">
                    <h1><?php echo $cat_name;?></h1>
                </div>
                <div class="content-part">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="renovat-item">
                            <label for="r1">Name</label>
                            <input type="text" id="r1" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="renovat-item">
                            <label for="r2">Contact</label>
                            <input type="text" id="r2" name="contact" placeholder="Contact Number" required>
                        </div>
                        <div class="renovat-item">
                            <label for="r3">PostCode</label>
                            <input type="text" id="r3" name="postcode" placeholder="Post Code" required>
                        </div>
                        <div class="renovat-item">
                            <label for="r4">Address</label>
                            <input type="text" id="r4" name="address" placeholder="Address" required>
                        </div>
                        <div class="renovat-item">
                            <label for="r5">Date</label>
                            <input type="date" id="r5" name="time" placeholder="" required>
                        </div>
                        <div class="renovat-item">
                            <label for="r6">Budget</label>
                            <input type="text" id="r6" name="budget" placeholder="Budget" required>
                        </div>
                        <div class="renovat-item">
                            <p>Require designated license</p>
                            <div class="custck-box">
                                <div class="form-group">
                                    <input type="checkbox" name="license" value="1" id="html">
                                    <label for="html"></label>
                                </div>
                            </div>      
                        </div>
                        <div class="renovat-item renovat2">
                            <p>Desctription</p>
                            <textarea name="description" required id="" cols="30" rows="4"></textarea>
                        </div>
                        <div class="renovat-item">
                            <label for="r6">Image</label>
                            <input type="file" id="r6" name="image" placeholder="" required>
                        </div>


                        <!--<div class="repair-box">
                            <h4>Repair Photo</h4>
                            <div class="repair-item">
                                <div class="repair-inner">
                                    <img src="images/repair.png" alt="">
                                </div>
                                <div class="repair-inner">
                                    <img src="images/repair.png" alt="">
                                </div>
                                <div class="repair-inner">
                                    <img src="images/repair.png" alt="">
                                </div>
                            </div>
                        </div>-->

                        <div class="submit-btn text-center pt-4">
                            <button type="submit" name="job_submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="footer-part">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="images/master.svg" alt=""> 
                                <img src="images/master-active.svg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/messages.svg" alt="">
                                <img src="images/messages-active.svg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/user.svg" alt="">
                                <img src="images/user-active.svg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/settings.svg" alt="">
                                <img src="images/settings-active.svg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
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
