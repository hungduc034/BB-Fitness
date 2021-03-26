<?php
require_once './Registerform.php';
require_once './functions.php';
error_reporting(0);
//getting the data

if (isset($_POST['add'])) {//adding
    $cuId = sanitizeString($_POST['cuId']);
    $cuName = sanitizeString($_POST['cuName']);
    $cuDoB = sanitizeString($_POST['cuDoB']);
    $cuEmail = sanitizeString($_POST['cuEmail']);
    $cuPhone = sanitizeString($_POST['cuPhone']);
    $cuGender = sanitizeString($_POST['cuGender']);
    $cuAddress = sanitizeString($_POST['cuAddress']);
    $cuImage = "";
    $extension = "";
    $error = $msg = "";
    //Process the uploaded image
    if (isset($_FILES['cuImage']) && $_FILES['cuImage']['size'] != 0) {
        $temp_name = $_FILES['cuImage']['tmp_name'];
        $name = $_FILES['cuImage']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $cuImage = "$cuId.$extension";
        $destination = "./images/customers/$cuImage";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }
    //TODO: Do the PHP validation here to protect your server
    $query = "INSERT INTO Customer VALUES('$cuId','$cuName','$cuDoB','$cuEmail','$cuPhone','$cuGender','$cuAddress','$cuImage')";
    $result = queryMysql($query);
    if (!$result) {
        $error = $error . "<br/>Can't add customer, please try again";
    } else {
        $msg = "Added $cuName successfully!";
    }
}
?>
<br/><br/><br/><br/>
<center>
    <form action="Register.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <span class="error"><?php echo $error; ?></span>
        <legend>Register</legend>
        ID (e.g., BB00001): <br/>
        <input type="text" name="cuId" size="10" maxlength="8"
               required pattern="^B[BCD]\d{5}$"/><br/>
        Name: <br/>
        <input type="text" name="cuName" maxlength="50" required/><br/>
        Date of birth:<br/>
        <input type="date" name="cuDoB"/><br/>
        Email:<br/>
        <input type="email" name="cuEmail" maxlength="50"/><br/>
        Phone:<br/>
        <input type="number" name="cuPhone" maxlength="15"/><br/>
        Gender:<br/>
        <input type="radio" name="cuGender" value="Male" checked/> Male
        <input type="radio" name="cuGender" value="Fale"/> Female<br/>
        Address:<br/>
        <textarea maxlength="200" name="cuAddress"></textarea><br/>
        Image:<br/>
        <input type="file" name="cuImage"/><br/>       
        <input type="submit" value="Add" name="add"/>
        <span><?php echo $msg; ?></span>        
    </fieldset>
</form>
</center>

</body>
</html>
