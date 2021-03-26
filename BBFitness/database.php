<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Setting up...</h1>
<?php
require_once './functions.php';
//setup table user
createTable("User", "uId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    forename varchar(32),
                    surname varchar(32) not null,                    
                    username VARCHAR(50),
                    password VARCHAR(50),
                    role varchar(10) not null,
                    status CHAR(1),
                    INDEX(username(10))");
echo "<br>";

createTable("Course", "cId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                cName VARCHAR(50),
                cPrice VARCHAR(200),
                cImage VARCHAR(200),
                INDEX (cName(20))");
echo "<br>";
createTable("Customer", "cuId VARCHAR(8) PRIMARY KEY,
                        cuName VARCHAR(50),
                        cuDoB DATE,
                        cuEmail VARCHAR(50),
                        cuPhone VARCHAR(15),
                        cuGender CHAR(10),
                        cuAddress VARCHAR(200),
                        cuImage VARCHAR(200),
                        INDEX(cuName(10))");
echo "<br>";
createTable("Coach", "coId VARCHAR(8) PRIMARY KEY,"
        . "coName VARCHAR(50),"
        . "coDoB DATE,"
        . "coEmail VARCHAR(50),"
        . "coPhone VARCHAR(15),"
        . "coGender CHAR(1),"
        . "coAddress VARCHAR(200),"
        . "coImage VARCHAR(200)");
echo "<br>";
createTable("RegisterCourse", "rId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                rCustomer VARCHAR(200),
                                rName VARCHAR(50),
                                rPrice VARCHAR(50),
                                rStatus VARCHAR(50)");
                                
?>
        <h1>...done!</h1>       
    </body>
</html>
