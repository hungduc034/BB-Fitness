<?php
require_once './Home_Admin.php';
error_reporting(0);

if (isset($_POST['cuName'])) {
    $cuId = sanitizeString($_POST['cuId']);
    $cuName = sanitizeString($_POST['cuName']);
    $cuDoB = sanitizeString($_POST['cuDoB']);
    $cuEmail = sanitizeString($_POST['cuEmail']);
    $cuPhone = sanitizeString($_POST['cuPhone']);
    $cuGender = sanitizeString($_POST['cuGender']);
    $cuAddress = sanitizeString($_POST['cuAddress']);
    $error = $msg = "";
    $query = "UPDATE Customer SET cuName = '$cuName', cuDoB = '$cuDoB', cuEmail = '$cuEmail', cuPhone ='$cuPhone', cuGender = '$cuGender', cuAddress ='$cuAddress' WHERE cuId = '$cuId'";
    $result = queryMysql($query);
    if (!$result) {
        $error = "Couldn't add, please try again.";
    } else {
        $msg = "Update $cuName successfully";
    }
}
//for loading the data to the form
if (isset($_POST['cuId'])) {
    $cuId = sanitizeString($_POST['cuId']);
    //Load the current data for that student
    $query = "select cuName, cuDoB, cuEmail, cuPhone, cuGender, cuAddress FROM Customer WHERE cuId = '$cuId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $cuName = $row[0];
        $cuDoB = $row[1];
        $cuEmail = $row[2];
        $cuPhone = $row[3];
        $cuGender = $row[4];
        $cuAddress = $row[5];
    }
}
?>
<br/><br/>
<center>
    <form action="updateCustomer.php" method="post">
    <fieldset>
        <legend>Edit Customer</legend>
        <span class="error"><?php echo $error; ?></span>
        <input type="hidden" value="<?php echo $cuId; ?>" name="cuId"/>
        Student Name:<br/>
        <input type="text" id="cuName" name="cuName" required value="<?php echo $cuName; ?>"/><br/>
        Student DoB:<br/>
        <input type="date" id="cuDoB" name="cuDoB" required value="<?php echo $cuDoB; ?>"/><br/>
        Email: <br/>
        <input type="email" id="cuEmail" name="cuEmail" required value="<?php echo $cuEmail; ?>"/><br/>
        Phone: <br/>
        <input type="number" id="cuPhone" name="cuPhone" required value="<?php echo $cuPhone; ?>"/><br/>
        Gender: <br/>
        <input type="radio" name="cuGender" value="Male" checked/> Male
        <input type="radio" name="cuGender" value="Female"/> Female<br/>
        Address: <br/>
        <textarea maxlength="200" id="cuAddress" name="cuAddress"><?php echo $cuAddress; ?></textarea><br/>
        <input type="submit" value="Edit" />           
        <span><?php echo $msg; ?></span>
    </fieldset>
</form>    
</center>
</body>
</html>