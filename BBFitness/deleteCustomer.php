<?php
session_start();
require_once './functions.php';

if(isset($_POST['cuId'])) {
    $cuId = sanitizeString($_POST['cuId']);
    $query = "DELETE FROM Customer WHERE cuId = '$cuId'";
    queryMysql($query);
    header("Location: loadCustomer.php");    
}
?>
