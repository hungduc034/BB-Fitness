<?php
require './functions.php';

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname, $dbport);
if($conn->connect_error) {
    die($conn->connect_error);
}
function mysql_fix_string($conn, $string) {
    if(get_magic_quotes_gpc())
        $string = stripslashes($string);
    return $string = $conn->real_escape_string($string);
}

function mysql_entities_fix_string($conn, $string) {
    return htmlentities(mysql_fix_string($conn, $string));
}
if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header("HTTP/1.0 401 Unauthorized");
    die("Please enter your username and passwork: ");
}else {
    $un_temp = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_PW']);
    $query = "SELECT * FROM User WHERE username = '$un_temp'";
    $result = $conn->query($query);
    if(!$result) {
        die($conn->error);
    }else {
        $row = mysqli_fetch_array($result);
        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
        if($token == $row[4]){
            session_start();
            $_SESSION['role'] = $row[5];
            if($_SESSION['role'] == 'admin') {
                header("location:Home_Admin.php");
            }else if ($_SESSION['role'] == 'user') {
                header("location:CustomerPage.php");
            }
        } else
            die("Invalid username/password combination");
    }
}
$conn->close();
?>

