<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
$sql = "SELECT IFNULL(SUM(purchase.remaining),0) AS feed_qnty FROM purchase WHERE purchase.remaining>0 AND purchase.name='Feed' AND purchase.type='".$q."'";
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
