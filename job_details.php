<?php
session_start();
include('config/dbconfig.php');
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}
$select_type = $con->query("select type from user where `id`='$id'");
if($select_type){
    while($data = mysqli_fetch_assoc($select_type)){
        $user_type = $data['type'];
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
        <div class="heading-cnt pb-1">
            <h1>Job Details</h1>
            <!--<p>Mr. Wong | B Ltd.</p>-->
        </div>
        <div class="content-part">
            <?php
            if(isset($_SESSION['success'])){
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congratulation!</strong> You have successfully applied for the job.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['success']);
            }
            ?>
            <div class="block-mstbox comment-textcnt">
                    <?php
                    if($user_type == 1){
                    $fetch_job = $con->query("SELECT * FROM `jobs` WHERE `status` = 1 order by id desc");
                    if ($fetch_job->num_rows > 0) {
                        while ($data = mysqli_fetch_assoc($fetch_job)) {
                            ?>
                            <div class="row mt-5">
                                <h4><?php echo $data['cat_name'];?></h4>
                                <div class="container">
                                    <div class="row flex align-items-center justify-content-center">
                                        <img src="images/jobs/<?php echo $data['image'];?>" alt="review image"
                                             style="padding: 0 !important;">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <p>Budget: <?php echo $data['budget'];?> HKD</p>
                                    </div>
                                    <div class="col-12">
                                        <p>Address: <?php echo $data['address'];?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="submit-btn text-center mt-2">
                                        <a href="view_job.php?job_id=<?php echo $data['id'];?>">
                                            <button type="submit" name="signup" style="width: 200px;">See Details</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    }else{
                        $fetch_job = $con->query("SELECT * FROM `jobs` WHERE `user_id` = '$id' order by id desc");
                        if ($fetch_job->num_rows > 0) {
                            while ($data = mysqli_fetch_assoc($fetch_job)) {
                                ?>
                                <div class="row mt-5">
                                    <h4><?php echo $data['cat_name'];?></h4>
                                    <div class="container">
                                        <div class="row flex align-items-center justify-content-center">
                                            <img src="images/jobs/<?php echo $data['image'];?>" alt="review image"
                                                 style="padding: 0 !important;">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <p>Budget: <?php echo $data['budget'];?> HKD</p>
                                        </div>
                                        <div class="col-12">
                                            <p>Address: <?php echo $data['address'];?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="submit-btn text-center mt-2">
                                            <a href="view_job.php?job_id=<?php echo $data['id'];?>">
                                                <button type="submit" name="signup" style="width: 200px;">See Details</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>


            </div>
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
