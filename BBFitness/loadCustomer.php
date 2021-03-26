<?php
require_once './Home_Admin.php';

$query = "select cuId, cuName, cuDoB, cuEmail, cuPhone, cuGender, cuAddress, cuImage from Customer";
$result = queryMysql($query);
$error = $msg = "";
if (!$result) {
    $error = "Couldn't load data, please try again.";
}
?>
<br><br>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<center>
    <table class="tbl">
    <tr>
        <th>CutomerId</th>
        <th>Name</th>
        <th>DoB</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Image</th>
        <th>Options</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $cuId = $row[0];
        $cuName = $row[1];
        $cuDoB = $row[2];
        $cuEmail = $row[3];
        $cuPhone = $row[4];
        $cuGender = $row[5];
        $cuAddress = $row[6];
        $cuImage = $row[7];
        echo "<tr>";
        echo "<td>$cuId</td>";
        echo "<td>$cuName</td>";
        echo "<td>$cuDoB</td>";
        echo "<td>$cuEmail</td>";
        echo "<td>$cuPhone</td>";
        echo "<td>$cuGender</td>";
        echo "<td>$cuAddress</td>";
        echo "<td ><img src='./images/customers/$cuImage' style='width:200px;height:200px;'></td>";
        ?>
    <td>
        <form class="frminline" action="deleteCustomer.php" method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="cuId" value="<?php echo $row[0] ?>"/>
            <input type="submit" value="delete"/>
        </form>
        <form class="frminline" action="updateCustomer.php" method="post">
            <input type="hidden" name="cuId" value="<?php echo $row[0] ?>"/>
            <input type="submit" value="update"/>
        </form>
    </td>
    <?php
    echo "</tr>";
}
?>
<script>
    function confirmDelete() {
        var r = confirm("Are you sure you would like to delete?");
        if (r) {
            return true;
        } else {
            return false;
        }
    }
</script>
</table>
</center>

</body>
</html>