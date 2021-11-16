<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT IFNULL(SUM(manure_p),0) AS manure FROM menure_production WHERE flock_id ='".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
mysqli_close($conn);
if($row && $row['manure']==!''){
echo $row['manure'] === "" ? "no suggestion" : $row['manure'];
}
else
{
    $r=0;
    echo $r === "" ? "no suggestion" : $r;
    
}
 ?>
