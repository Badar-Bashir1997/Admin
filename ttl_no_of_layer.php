<?php
include("lib/DBConn.php");
$q=$_REQUEST['q'];
  $sql = "SELECT IFNULL(SUM(flock.nob),0)AS nob FROM flock WHERE  flock.Breed_type='Layer' AND flock.Status='ongoing' AND flock.flock_id='".$q."'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $qry="SELECT IFNULL(SUM(layer_sales.nob_sale),0)AS bs FROM layer_sales WHERE layer_sales.flock_id='".$q."'";
  $result1 = mysqli_query($conn,$qry);
  $row1 = mysqli_fetch_array($result1);
  mysqli_close($conn);
  $r=$row['nob'];
  $r1=$row1['bs'];
  $re=$r-$r1;
  if($re==!''){
  echo  $re;
  }
  else
  {
      $r="No Production";
      echo $r === "" ? "no suggestion" : $r;
      
  }
   ?>