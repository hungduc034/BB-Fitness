<?php
require_once './Home_Admin.php';

$query = "select coId, coName, coDoB, coEmail, coPhone, coGender, coAddress, coImage from Coach";
$result = queryMysql($query);
$error = $msg = "";
if (!$result) {
    $error = "Couldn't load data, please try again.";
}
?>
<br><br><br><br><br><br>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<center>
    <table class="tbl">
    <tr>
        <th>CoachId</th>
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
        $coId = $row[0];
        $coName = $row[1];
        $coDoB = $row[2];
        $coEmail = $row[3];
        $coPhone = $row[4];
        $coGender = $row[5];
        $coAddress = $row[6];
        $coImage = $row[7];
        echo "<tr>";
        echo "<td>$coId</td>";
        echo "<td>$coName</td>";
        echo "<td>$coDoB</td>";
        echo "<td>$coEmail</td>";
        echo "<td>$coPhone</td>";
        echo "<td>$coGender</td>";
        echo "<td>$coAddress</td>";
        echo "<td ><img src='./images/coachs/$coImage' style='width:200px;height:200px;'></td>";
        ?>
    <td>
        <form class="frminline" action="deleteCoach.php" method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="coId" value="<?php echo $row[0] ?>"/>
            <input type="submit" value="delete"/>
        </form>
        <form class="frminline" action="updateCoach.php" method="post">
            <input type="hidden" name="coId" value="<?php echo $row[0] ?>"/>
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