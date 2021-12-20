<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT Flock_name FROM flock WHERE Status='ongoing' AND farm_id ='".$q."'";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
while($row = mysqli_fetch_array($result))
{
$id=$row['Flock_name'];
$return_arr[]=array("id" => $id);
}
echo json_encode($return_arr);
 ?>