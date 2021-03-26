<?php
require_once './Home_Admin.php';
error_reporting(0);

if (isset($_POST['cName'])) {
    $cName = sanitizeString($_POST['cName']);
    $cPrice = sanitizeString($_POST['cPrice']);
    $cImage = sanitizeString($_POST['cImage']);
    $error = $msg = "";
    
    $query = "UPDATE Course SET cName='$cName',cPrice ='$cPrice' WHERE cId = '$cId'";
    $result = queryMysql($query);
    if (!$result) {
        $error = "Couldn't add, please try again.";
    } else {
        $msg = "Update $cId successfully";
    }
}
//for loading the data to th form
if (isset($_POST['cId'])) {
    $cId = sanitizeString($_POST['cId']);
    //Load the current data for that batch
    $query = "select cName, cPrice from Course where cId = $cId";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $cName = $row[0];
        $cPrice = $row[1];
    }
}
?>
<br/><br/>
<center>
    <form action="updateCourse.php" method="post">
    <fieldset>
        <legend>Edit Course</legend>
        <div class="error"><?php echo $error; ?></div>
        <input type="hidden" name="cId" value="<?php echo $cId; ?>" />
        Course Name:<br/>
        <input type="text" id="cName" name="cName" value="<?php echo $cName; ?>"/><br/>
        Course Price:<br/>
        <input type="text" id="cPrice" name="cPrice" value="<?php echo $cPrice; ?>"/><br/>
        <input type="submit" value="Edit" />
        <div><?php echo $msg; ?></div>
    </fieldset>
</form>
</center>