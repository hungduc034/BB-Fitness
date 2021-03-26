<?php

session_start();
require_once './functions.php';

if(isset($_POST['cId'])) {
    $cId = sanitizeString($_POST['cId']);
    $query = "DELETE FROM Course WHERE cId = '$cId'";
    queryMysql($query);
    header("Location: loadCourse.php");
    
}
?>
