<?php
require_once './Home_Admin.php';
error_reporting(0);

if (isset($_POST['rCustomer'])) {
    $rCustomer = sanitizeString($_POST['rCustomer']);
    $rName = sanitizeString($_POST['rName']);
    $rPrice = sanitizeString($_POST['rPrice']);
    $rStatus = sanitizeString($_POST['rStatus']);
    $error = $message = "";
    $query = "INSERT INTO RegisterCourse(rCustomer, rName, rPrice, rStatus) VALUES('$rCustomer','$rName','$rPrice','$rStatus')";
    $result = queryMysql($query);
    if (!$result) {
        $error = "Adding error, please try again";
    } else {
        $msg = "Added successfully";
    }
}
?>
<br/>
<center>
    <form action="addRegisterCourse.php" method="post">
        <fieldset >
            <legend>Register Course</legend>
            <span class="error"><?php echo $error; ?></span><br/>           
            Customer: <br/>
            <select name="rCustomer">
                <?php
                $query = "select cuId, cuName from Customer";
                $customers = queryMysql($query);
                while ($customer = mysqli_fetch_array($customers)) {
                    $cuId = $customer[0];
                    $cuName = $customer[1];
                    echo "<option value='$cuName'>$cuName</option>";
                }
                ?>
            </select><br/>
            Name: <br/>
            <select name="rName" id="cName">
                <?php
                $query = "select cId, cName from Course";
                $courses = queryMysql($query);
                while ($course = mysqli_fetch_array($courses)) {
                    $cId = $course[0];
                    $cName = $course[1];
                    echo "<option value='$cName'>$cName</option>";
                }
                ?>
            </select><br/>
            Price: <br>
            <input type="text" name="rPrice"/><br/>
            Status:
            <select name="rStatus" id="rStatus">
                <option>Paid</option>
                <option>Unpaid</option>
            </select> <br>
            <input type="submit" value="Add"/><br/>
            <span><?php echo $msg; ?></span><br/>
        </fieldset>
    </form>
</center>

</body>
</html>

