<?php

$con = mysqli_connect("localhost", "root", "", "master_builder") or die("Could not Connect My Sql");

/*$con=mysqli_connect("localhost","u727820269_master_builder","Am?N0Ec:46","u727820269_master_builder") or die("Could not Connect My Sql");*/

$user_agent = $_SERVER['HTTP_USER_AGENT'];
$is_mobile = false;

if (preg_match('/android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos/i', $user_agent)) {
    $is_mobile = true;
}

if (!$is_mobile) {
    echo "<script>
alert('Please use a mobile device in order to access the website');
</script>";
    exit();
}