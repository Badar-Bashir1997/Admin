<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT flock.remaining FROM flock WHERE flock.flock_id='".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
mysqli_close($conn);
$re=$row['remaining'];
if($re==!''){
echo  $re;
}
else
{
    $r=0;
    echo $r === "" ? "no suggestion" : $r;
    
}
 ?>