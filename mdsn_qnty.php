<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT IFNULL(SUM(remaining),0) AS mdsn_q FROM medicine WHERE remaining>0 AND medicine_name='".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
mysqli_close($conn);
if($row && $row['mdsn_q']==!''){
echo  $row['mdsn_q'];
}
else
{
    $r="No Medicine";
    echo $r;
    
}
 ?>
