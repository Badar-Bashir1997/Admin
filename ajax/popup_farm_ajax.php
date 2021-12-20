<?php
include("../lib/DBConn.php");
if(isset($_POST['Farm_Name']))
{   
    
    $name = $_POST['Farm_Name'];
    $location = $_POST['Farm_Location'];
    $pone = $_POST['txt_phone'];
    $capacity = $_POST['txt_capacity'];
    $type = $_POST['breed_type'];
    $Query  = "INSERT INTO farm (farm.name,farm.location,farm.Breed_type,farm.phone_no,farm.Status,farm.bird_capacity)
                          values('$name','$location','$type','$pone','Available','$capacity')";
    // echo "<pre>";
    // print_r($Query);
    // die();
    $cnfrm = mysqli_query($conn,$Query);
   if($cnfrm)
   {
    $Query="SELECT * FROM `farm` WHERE farm.name='$name'";
    $result = mysqli_query($conn,$Query);
    $row=mysqli_fetch_array($result);
    echo $row['farm_id'];
   }
   else
   {
    echo "Null";
   }
    
}
?>