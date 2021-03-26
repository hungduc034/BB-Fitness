<?php
require_once './Home_Admin.php';
error_reporting(0);
//getting the data

if (isset($_POST['add'])) {//adding
    $cName = sanitizeString($_POST['cName']);
    $cPrice = sanitizeString($_POST['cPrice']);
    $cImage = "";
    $extension = "";
    $error = $msg = "";
    //Process the uploaded image
    if (isset($_FILES['cImage']) && $_FILES['cImage']['size'] != 0) {
        $temp_name = $_FILES['cImage']['tmp_name'];
        $name = $_FILES['cImage']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $cImage = "$cName.$extension";
        $destination = "./images/courses/$cImage";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }
    //TODO: Do the PHP validation here to protect your server
    $query = "INSERT INTO Course(cName, cPrice,cImage) VALUES('$cName','$cPrice', '$cImage')";
    $result = queryMysql($query);
    if (!$result) {
        $error = $error . "<br/>Can't add course, please try again";
    } else {
        $msg = "Added $cName successfully!";
    }
}
?>
<br/><br/><br/><br/>
<center>
    <form action="addCourse.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <span class="error"><?php echo $error; ?></span>
        <legend>Add Course</legend>
        Name: <br/>
        <input type="text" name="cName" required/><br/>
        Price:<br>
        <input type="text" name="cPrice" required/><br>
        Image:<br/>
        <input type="file" name="cImage"/><br/>       
        <input type="submit" value="Add" name="add"/>
        <span><?php echo $msg; ?></span>        
    </fieldset>
</form>
</center>

</body>
</html>
