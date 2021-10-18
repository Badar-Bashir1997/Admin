<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT Breed_type FROM farm WHERE Farm_id = '".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
mysqli_close($conn);
echo $row['Breed_type'] === "" ? "no suggestion" : $row['Breed_type'];

 ?>