<?php
session_start();
require_once './functions.php';

if(isset($_POST['rId'])) {
    $rId = sanitizeString($_POST['rId']);
    $query = "DELETE FROM RegisterCourse WHERE rId = '$rId'";
    queryMysql($query);
    header("Location: loadRegisterCourse.php");    
}
?>


