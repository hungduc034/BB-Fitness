<?php
require_once './Home_Admin.php';
error_reporting(0);

//getting the data

if (isset($_POST['add'])) {//adding
    $coId = sanitizeString($_POST['coId']);
    $coName = sanitizeString($_POST['coName']);
    $coDoB = sanitizeString($_POST['coDoB']);
    $coEmail = sanitizeString($_POST['coEmail']);
    $coPhone = sanitizeString($_POST['coPhone']);
    $coGender = sanitizeString($_POST['coGender']);
    $coAddress = sanitizeString($_POST['coAddress']);
    $coImage = "";
    $extension = "";
    $error = $msg = "";
    //Process the uploaded image
    if (isset($_FILES['coImage']) && $_FILES['coImage']['size'] != 0) {
        $temp_name = $_FILES['coImage']['tmp_name'];
        $name = $_FILES['coImage']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $coImage = "$coId.$extension";
        $destination = "./images/coachs/$coImage";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }
    //TODO: Do the PHP validation here to protect your server
    //Add the student.
    $query = "INSERT INTO Coach(coId,coName,coDoB,coEmail,coPhone,coGender,coAddress,coImage) values('$coId','$coName','$coDoB','$coEmail','$coPhone','$coGender','$coAddress','$coImage')";
    $result = queryMysql($query);
    if (!$result) {
        $error = $error . "<br/>Can't add coach, please try again";
    } else {
        $msg = "Added $coName successfully!";
    }
}
?>
<br/><br/>
<center>
    <form action="addCoach.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <span class="error"><?php echo $error; ?></span>        
        <legend>Add Coach</legend>
        ID (e.g., BC00001): <br/>
        <input type="text" name="coId" size="10" maxlength="8"
               required pattern="^B[BCD]\d{5}$"/><br/>
        Name: <br/>
        <input type="text" name="coName" maxlength="50" required/><br/>
        Date of birth:<br/>
        <input type="date" name="coDoB"/><br/>
        Email:<br/>
        <input type="email" name="coEmail" maxlength="50"/><br/>
        Phone:<br/>
        <input type="number" name="coPhone" maxlength="15"/><br/>
        Gender:<br/>
        <input type="radio" name="coGender" value="Male" checked/> Male
        <input type="radio" name="coGender" value="Fale"/> Female<br/>
        Address:<br/>
        <textarea maxlength="200" name="coAddress"></textarea><br/>
        Image:<br/>
        <input type="file" name="coImage"/><br/>
        <input type="submit" value="Add" name="add"/>  
        <span><?php echo $msg; ?></span>
    </fieldset>
</form>
</center>

</body>
</html>
