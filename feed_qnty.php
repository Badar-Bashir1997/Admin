<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT IFNULL(SUM(feed.remaining),0) AS feed_qnty FROM feed WHERE feed.remaining>0 AND feed.name='".$q."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
mysqli_close($conn);
if($row && $row['feed_qnty']==!''){
echo  $row['feed_qnty'];
}
else
{
    $r="No feed";
    echo $r;
    
}
 ?>
