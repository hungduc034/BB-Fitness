<?php
require_once './Home_Admin.php';

$query = "select rId, rCustomer, rName, rPrice, rStatus from RegisterCourse";

$result = queryMysql($query);

if (!$result) {
    $error = "Couldn't load data, please try again.";
}
?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<center>
    <table class="tbl">
    <tr>
        <th>Id</th>
        <th>Customer</th>
        <th>Name</th>       
        <th>Price</th>
        <th>Status</th>
        <th>Option</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $rId = $row [0];
        $rCustomer = $row[1];
        $rName = $row[2];       
        $rPrice = $row[3];
        $rStatus = $row[4];
        echo "<tr>";
        echo "<td>$rId</td>";
        echo "<td>$rCustomer</td>";
        echo "<td>$rName</td>";
        echo "<td>$rPrice</td>";
        echo "<td>$rStatus</td>";
        ?>
    <td>
        <form class="frminline" action="deleteRegisterCourse.php" method="post"
              onsubmit="return confirmDelete();">
            <input type="hidden" name="rId" value="<?php echo $row[0] ?>"/>
            <input type="submit" value="delete"/>
        </form>
        <form class="frminline" action="updateRegisterCourse.php" method="post">
            <input type="hidden" name="rId" value="<?php echo $row[0] ?>"/>
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



