<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT IFNULL(SUM(remaining),0) AS misc_q FROM misc WHERE remaining>0 AND name='".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
mysqli_close($conn);
if($row && $row['misc_q']==!''){
echo  $row['misc_q'];
}
else
{
    $r="Nothing";
    echo $r;
    
}
 ?>
