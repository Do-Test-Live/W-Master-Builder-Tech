<?php
session_start();
include ('config/dbconfig.php');
$id = $_SESSION['id'];
$job_id = $_GET['job_id'];

$update_query = $con->query("UPDATE `jobs` SET `master_status`='1',`master_id`='$id' where `id` = '$job_id'");
if($update_query){
    $_SESSION['success'] = 'success';
    header('Location: view_job.php?job_id='.$job_id);
}
