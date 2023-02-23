<?php
session_start();
include("config/dbconfig.php");
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
} else {
    $id = $_SESSION['id'];
}
$fetch_usertype = $con->query("select `type` from user where `id` = '$id'");
if($fetch_usertype){
    while($type = mysqli_fetch_assoc($fetch_usertype)){
        $typ = $type['type'];
    }
}

$job_id = $_GET['job_id'];

$select_job_details = $con->query("select * from jobs where `id` = '$job_id'");
if ($select_job_details) {
    while ($row = mysqli_fetch_assoc($select_job_details)) {
        $cat_name = $row['cat_name'];
        $customer_name = $row['name'];
        $contact = $row['contact'];
        $post_code = $row['post_code'];
        $address = $row['address'];
        $time = $row['time'];
        $budget = $row['budget'];
        $desctription = $row['desctription'];
        $image = $row['image'];
        $status = $row['status'];
        $master_status = $row['master_status'];
        $master_id = $row['master_id'];
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
            <h1><?php echo $cat_name; ?></h1>
        </div>
        <div class="row flex align-items-center justify-content-center">
            <img src="images/jobs/<?php echo $image;?>" style="max-width: 500px;">
        </div>
        <div class="content-part">
            <div class="renovat-item" style="display: block;">
                <h6>Customer Name:</h6>
                <h6><?php echo $customer_name; ?></h6>
            </div>
            <div class="renovat-item" style="display: block;">
                <h6>Customer Contact:</h6>
                <h6><?php echo $contact; ?></h6>
            </div>
            <div class="renovat-item" style="display: block;">
                <h6>Post Code:</h6>
                <h6><?php echo $post_code; ?></h6>
            </div>
            <div class="renovat-item" style="display: block;">
                <h6>Address:</h6>
                <h6><?php echo $address; ?></h6>
            </div>
            <div class="renovat-item" style="display: block;">
                <h6>Date:</h6>
                <h6><?php echo $time; ?></h6>
            </div>
            <div class="renovat-item" style="display: block;">
                <h6>Budget:</h6>
                <h6><?php echo $budget; ?></h6>
            </div>
            <div class="renovat-item" style="display: block;">
                <h6>Description:</h6>
                <h6><?php echo $desctription; ?></h6>
            </div>
            <div class="renovat-item" style="display: block;">
                <h6>Status:</h6>
                <h6><?php
                    if ($master_status == 0) {
                        ?>
                        Open
                        <?php
                    } else {
                        ?>Booked<?php
                    }
                    ?></h6>
            </div>
            <div class="renovat-item" style="display: block;">
                <h6>Master Name:</h6>
                <h6><?php
                    $fetch_master = $con->query("select name from user where `id` = '$master_id'");
                    if($fetch_master->num_rows > 0){
                        while($data = mysqli_fetch_assoc($fetch_master)){
                            $master_name = $data['name'];
                        }
                        echo $master_name;
                    }else{
                        echo "Not Booked Yet!";
                    }
                    ?>
                </h6>
            </div>
            <?php
            if($typ == 1 and $master_status == 0){
                ?>
                <div class="submit-btn text-center pt-4">
                    <a href="confirm_booking.php?job_id=<?php echo $job_id;?>">
                        <button type="submit" name="job_submit">Apply for the Job</button>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <?php include('include/footer.php'); ?>
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
