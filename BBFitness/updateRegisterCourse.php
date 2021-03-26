<?php
require_once './Home_Admin.php';
error_reporting(0);

if (isset($_POST['rName'])) {
    $rId = sanitizeString($_POST['rId']);
    $rCustomer = sanitizeString($_POST['rCustomer']);
    $rName = sanitizeString($_POST['rName']);    
    $rPrice = sanitizeString($_POST['rPrice']);
    $rStatus = sanitizeString($_POST['rStatus']);

    $error = $msg = "";
    $query = "UPDATE RegisterCourse SET rCustomer = '$rCustomer', rName = '$rName', rPrice = '$rPrice', rStatus = '$rStatus' WHERE rId = '$rId'";
    $result = queryMysql($query);
    if (!$result) {
        $error = "Couldn't add, please try again.";
    } else {
        $msg = "Update $rName successfully";
    }
}
//for loading the data to the form
if (isset($_POST['rId'])) {
    $rId = sanitizeString($_POST['rId']);
    //Load the current data for that student
    $query = "select rCustomer, rName, rPrice, rStatus FROM RegisterCourse WHERE rId = '$rId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $rCustomer = $row[0];
        $rName = $row[1];
        $rPrice = $row[2];
        $rStatus = $row[3];
    }
}
?>
<br/><br/>
<center>
    <form action="updateRegisterCourse.php" method="post">
    <fieldset>
        <legend>Update Register Course</legend>
        <span class="error"><?php echo $error; ?></span>
        <input type="hidden" value="<?php echo $rId; ?>" name="rId"/>
        Customer:<br/>
        <input type="text" id="rCustomer" name="rCustomer" required value="<?php echo $rCustomer; ?>"/><br/>
        Course: <br>
        <input type="text" id="rName" name="rName" required value="<?php echo $rName; ?>"/><br/>
        Price: <br>
        <input type="text" name="rPrice" value="<?php echo $rPrice ?>"/><br>
        Status: <br>
        <select name="rStatus">
            <option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
        </select><br>
        <input type="submit" value="Edit" /> <br>          
        <span><?php echo $msg; ?></span>
    </fieldset>
</form>    
</center>
</body>
</html>