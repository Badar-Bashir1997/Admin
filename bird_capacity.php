<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT bird_capacity FROM farm WHERE Farm_id = '".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
mysqli_close($conn);
echo $row['bird_capacity'] === "" ? "no suggestion" : $row['bird_capacity'];

 ?>