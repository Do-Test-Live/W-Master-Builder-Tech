<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location: index.php');
}else{
    $id = $_SESSION['id'];
}
include ("config/dbconfig.php");
if(isset($_POST['profile_update'])) {
    if (isset($_POST['cat'])) {
        echo $cat = implode(",", $_POST['cat']);
    }else{
        $cat = '';
    }
    $c_image = $_FILES['image']['name'];
    $c_image_temp=$_FILES['image']['tmp_name'];
    $imageFileType = strtolower(pathinfo($c_image,PATHINFO_EXTENSION));
    if($imageFileType != "pdf" ){
        echo "wrong file extension";
    }else{
        if(move_uploaded_file($c_image_temp , "documents/$c_image")){
            $insert_job = $con->query("INSERT INTO `master_document`(`user_id`, `cat_id`, `document`) VALUES ('$id','$cat','$c_image')");
            if($insert_job){
                $_SESSION['profile_update'] = 'success';
                header('Location: category.php');
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
            <h1>Master Profile</h1>
        </div>
        <div class="content-part">
            <form action="#" method="post" enctype="multipart/form-data">
                <?php
                $fetch_cat = $con->query("SELECT * FROM `category`");
                if($fetch_cat-> num_rows > 0){
                    while($data = mysqli_fetch_assoc($fetch_cat)){
                        ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="cat[]" value="<?php echo $data['cat_id'];?>" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $data['cat_name'];?>
                            </label>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="renovat-item">
                    <label for="r6">Documents((Please upload your construction permit(s), insurance, credit check documents. PDF Only)</label>
                    <input type="file" id="r6" name="image" placeholder="" required>
                </div>

                <div class="submit-btn text-center pt-4">
                    <button type="submit" name="profile_update">Submit</button>
                </div>
            </form>
        </div>
        <?php include ('include/footer.php');?>
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
