<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
} else {
    $id = $_SESSION['id'];
}
include("config/dbconfig.php");

$result = 0;
if (isset($_POST['profile_update'])) {
    if (isset($_POST['cat'])) {
        $cat = implode(",", $_POST['cat']);
    } else {
        $cat = '';
    }
    $uploaded_files = array();
    $total_image = count($_FILES['images']['name']);
    if ($total_image <= 10) {
        foreach ($_FILES['images']['name'] as $key => $name) {
            $size = $_FILES['images']['size'];
            $tmp_name = $_FILES['images']['tmp_name'][$key];
            $path = 'documents/' . $name;
            if ($size[0] < 1000001) {
                move_uploaded_file($tmp_name, $path);
                $uploaded_files[] = $name;
            }

        }
        $image_names = implode(",", $uploaded_files);

        $sql = "INSERT INTO master_document (user_id,cat_id,document) VALUES ('$id','$cat','$image_names')";

        if (mysqli_query($con, $sql)) {
            $master_name = $con->query("SELECT `name` FROM `user` WHERE `id` = '$id'");
            if($master_name){
                while ($row = mysqli_fetch_assoc($master_name)){
                    $master = $row['name'];
                }
            }
            // Recipient email addresses
            $to = 'ukmasterbuilder@gmail.com';

            // Email subject and message body
            $subject = 'New Master Signup';
            $message = 'Master Name: '.$master.' You can see the attached files below.';


            // Email headers
            $headers = "From: mingowhk@gmail.com\r\n";
            $headers .= "Reply-To: mingowhk@gmail.com\r\n";
            $headers .= "Cc: mingowhk@gmail.com\r\n";
            $headers .= "Bcc: mingowhk@gmail.com\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

            // Email body
            $body = "--boundary\r\n";
            $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
            $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $body .= $message . "\r\n\r\n";

            foreach ($_FILES['images']['name'] as $key => $name) {
                // Image attachment

                $image = 'documents/'.$name;

                // Attach image
                $image_data = file_get_contents($image);
                $image_type = mime_content_type($image);
                $image_name = basename($image);
                $body .= "--boundary\r\n";
                $body .= "Content-Type: {$image_type}; name=\"{$image_name}\"\r\n";
                $body .= "Content-Transfer-Encoding: base64\r\n";
                $body .= "Content-Disposition: attachment; filename=\"{$image_name}\"\r\n\r\n";
                $body .= base64_encode($image_data) . "\r\n\r\n";
            }

            // Send email to recipients
            if (mail($to, $subject, $body, $headers)) {
                header("Location: category.php");
            }

        }
    } else {
        $result = 1;
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
            <h1>Master Profile</h1>
        </div>
        <div class="content-part">
            <form action="#" method="post" enctype="multipart/form-data">
                <?php
                $fetch_cat = $con->query("SELECT * FROM `category`");
                if ($fetch_cat->num_rows > 0) {
                    while ($data = mysqli_fetch_assoc($fetch_cat)) {
                        ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="cat[]"
                                   value="<?php echo $data['cat_id']; ?>" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $data['cat_name']; ?>
                            </label>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="renovat-item">
                    <label for="r6">Documents((Please upload your construction permit(s), insurance, credit check
                        documents. Not more than 10 files. Each file shouldn't exceed 1mb.)</label>
                    <input type="file" id="r6" name="images[]" placeholder="" multiple required>
                </div>

                <div class="submit-btn text-center pt-4">
                    <button type="submit" name="profile_update">Submit</button>
                </div>
            </form>
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
