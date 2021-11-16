<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT IFNULL(SUM(remaining),0)AS re FROM egg_production WHERE flock_id ='".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
mysqli_close($conn);
if($row && $row['re']==!''){
echo $row['re'] === "" ? "no suggestion" : $row['re'];
}
else
{
    $r=0;
    echo $r === "" ? "no suggestion" : $r;
    
}
 ?>
