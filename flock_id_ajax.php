<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT flock_id FROM flock WHERE Status='ongoing' AND Farm_id ='".$q."'";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
while($row = mysqli_fetch_array($result))
{
$id=$row['flock_id'];
$return_arr[]=array("id" => $id);
}
echo json_encode($return_arr);

 ?>