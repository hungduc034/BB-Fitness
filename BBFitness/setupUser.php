<?php
require_once './functions.php';
$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname, $dbport);
if($conn->connect_error) {
    die($conn->connect_error);
}
$salt1 = "qm&h*";
$salt2 = "pg!@";
$uID = '';
$forename = 'John';
$surname = 'Smith';
$username = 'admin';
$password = 'admin';
$token = hash('ripemd128', "$salt1$password$salt2");
$role = 'admin';
$status = '1';
add_user($conn,$uID,$forename,$surname, $username, $token,$role,$status);
$uID = '';
$forename = 'Michael';
$surname = 'Owen';
$username = 'user';
$password = '123456';
$token = hash('ripemd128', "$salt1$password$salt2");
$role = 'user';
$status = '1';
add_user($conn,$uID, $forename, $surname, $username, $token, $role,$status);

?>