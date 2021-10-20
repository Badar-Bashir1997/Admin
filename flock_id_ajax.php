<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT flock_id FROM flock WHERE Farm_id = '".$q."'";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
while($row = mysqli_fetch_array($result))
{
echo $row['flock_id'] === "" ? "no suggestion" : $row['flock_id'];
}
 ?>