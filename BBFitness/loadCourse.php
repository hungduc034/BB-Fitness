<?php
require_once './Home_Admin.php';

$query = "select cId, cName, cPrice, cImage from Course";

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
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Options</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $cId = $row[0];
        $cName = $row[1];
        $cPrice = $row[2];
        $cImage = $row[3];
        echo "<tr>";
        echo "<td>$cId</td>";
        echo "<td>$cName</td>";
        echo "<td>$cPrice</td>";
        echo "<td><img src='./images/courses/$cImage' style='width:200px;height:200px;'></td>";
        ?>
    <td>
        <form class="frminline" action="deleteCourse.php" method="post"
              onsubmit="return confirmDelete();">
            <input type="hidden" name="cId" value="<?php echo $row[0] ?>"/>
            <input type="submit" value="delete"/>
        </form>
        <form class="frminline" action="updateCourse.php" method="post">
            <input type="hidden" name="cId" value="<?php echo $row[0] ?>"/>
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



