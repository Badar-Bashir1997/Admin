<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];

$sql = "SELECT flock.nob FROM flock WHERE  flock.Breed_type='Broiler' AND Status='ongoing' AND flock.flock_id='".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$qry="SELECT IFNULL(SUM(broiler_sales.nob_sale),0)AS bs FROM broiler_sales WHERE broiler_sales.flock_id='".$q."'";
$result1 = mysqli_query($conn,$qry);
$row1 = mysqli_fetch_array($result1);
mysqli_close($conn);
$re=$row['nob']-$row1['bs'];
if($re==!''){
echo  $re;
}
else
{
    $r="No Production";
    echo $r === "" ? "no suggestion" : $r;
    
}
 ?>