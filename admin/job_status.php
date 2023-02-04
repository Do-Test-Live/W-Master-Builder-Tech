<?php
include ('config/dbconfig.php');
$id = $_GET['id'];
$update_query = $con->query("update jobs set status = 1 where id = '$id'");
if($update_query){
    header('Location: jobs.php');
}
