<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT * FROM broker WHERE  name='".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$blns=$row['balance'];
$rmng=$row['remaining'];
$return_arr[]=array("blns" => $blns,"rmng" => $rmng);

echo json_encode($return_arr);

 ?>