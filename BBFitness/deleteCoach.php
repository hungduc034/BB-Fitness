<?php
session_start();
require_once './functions.php';

if(isset($_POST['coId'])) {
    $coId = sanitizeString($_POST['coId']);
    $query = "DELETE FROM Coach WHERE coId = '$coId'";
    queryMysql($query);
    header("Location: loadCoach.php");    
}
?>
