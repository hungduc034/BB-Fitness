<?php
require_once './Home_Admin.php';

$error = $msg = "";
if (isset($_POST['coName'])) {
    $coId = sanitizeString($_POST['coId']);
    $coName = sanitizeString($_POST['coName']);
    $coDoB = sanitizeString($_POST['coDoB']);
    $coEmail = sanitizeString($_POST['coEmail']);
    $coPhone = sanitizeString($_POST['coPhone']);
    $coGender = sanitizeString($_POST['coGender']);
    $coAddress = sanitizeString($_POST['coAddress']);

    $query = "UPDATE Coach SET coName = '$coName', coDoB = '$coDoB', coEmail = '$coEmail', coPhone ='$coPhone', coGender = '$coGender', coAddress ='$coAddress' WHERE coId = '$coId'";
    $result = queryMysql($query);
    if (!$result) {
        $error = "Couldn't add, please try again.";
    } else {
        $msg = "Update $coName successfully";
    }
}
//for loading the data to the form
if (isset($_POST['coId'])) {
    $coId = sanitizeString($_POST['coId']);
    //Load the current data for that student
    $query = "select coName, coDoB, coEmail, coPhone, coGender, coAddress FROM Coach WHERE coId = '$coId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $coName = $row[0];
        $coDoB = $row[1];
        $coEmail = $row[2];
        $coPhone = $row[3];
        $coGender = $row[4];
        $coAddress = $row[5];
    }
}
?>
<br/><br/>
<center>
    <form action="updateCoach.php" method="post">
    <fieldset>
        <legend>Edit Coach</legend>
        <div class="error"><?php echo $error; ?></div>
        <input type="hidden" value="<?php echo $coId; ?>" name="coId"/>
        Student Name:<br/>
        <input type="text" id="coName" name="coName" required value="<?php echo $coName; ?>"/><br/>
        Student DoB:<br/>
        <input type="date" id="coDoB" name="coDoB" required value="<?php echo $coDoB; ?>"/><br/>
        Email: <br/>
        <input type="email" id="coEmail" name="coEmail" required value="<?php echo $coEmail; ?>"/><br/>
        Phone: <br/>
        <input type="number" id="coPhone" name="coPhone" required value="<?php echo $coPhone; ?>"/><br/>
        Gender: <br/>
        <input type="radio" name="coGender" value="Male" checked/> Male
        <input type="radio" name="coGender" value="Female"/> Female<br/>
        Address: <br/>
        <textarea maxlength="200" id="coAddress" name="coAddress"><?php echo $coAddress; ?></textarea><br/>
        <br/>
        <input type="submit" value="Edit" />           
        <div><?php echo $msg; ?></div>
    </fieldset>
</form>    
</center>
</body>
</html>