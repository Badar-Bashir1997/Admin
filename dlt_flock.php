<?php
include("lib/DBConn.php");
$q      = $_REQUEST['q'];
$dt=date("y-m-d");
$qrey="SELECT Farm_id FROM flock WHERE flock_id='".$q."'";
$result=mysqli_query($conn,$qrey);
$row=mysqli_fetch_array($result);
$q1=$row['Farm_id'];
$qr="UPDATE farm SET farm.Status='Available' WHERE farm.Farm_id='".$q1."'";
 mysqli_query($conn,$qr);
$qry    = "UPDATE flock SET flock.Status='Delete', flock.closed_date='$dt' WHERE flock.flock_id='".$q."'";
 
if( mysqli_query($conn,$qry) ) {

    echo "ok"; 
} else {
    echo "ok";
} 








?>