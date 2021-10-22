<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT IFNULL(remaning,0) FROM remaning_eggs WHERE flock_id = '".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
mysqli_close($conn);
echo $row['remaning'] === "" ? "no suggestion" : $row['remaning'];

 ?>