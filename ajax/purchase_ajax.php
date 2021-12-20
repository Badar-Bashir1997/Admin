<?php
include("../lib/DBConn.php");
if(isset($_POST['feedName'])&&isset($_POST['feedqnty']) )
{      

    $location = '';
    if( @!empty($_FILES['image']) &&  $_FILES['image'] != 'undefined') {
            $fileinfo       = PATHINFO($_FILES["image"]["name"]);
            $newFilename    = $fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
            move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/Feed/" . $newFilename);
            $location       = "upload/Feed/" . $newFilename; 
    }
    $feedqnty       = $_POST['feedqnty'];
    $txtName        = $_POST['feedName'];
    $txtPrice       = $_POST['txtPrice'];
    $txtDate        = $_POST['txtDate'];
    $total_price    = $txtPrice*$feedqnty;
    $Status         = $_POST['Status'];
    $vendor         = $_POST['vendor'];
    $txtremaning    = $_POST['txtremaning'];
    $txtbalance     = $_POST['txtbalance'];
$Query = "INSERT INTO purchase(name,type,qnty,remaining,price_per_unit,total_price,payment_method,purchase_date,image,v_id) 
        values('Feed','$txtName','$feedqnty','$feedqnty','$txtPrice','$total_price','$Status','$txtDate','$location','$vendor')" ;
 $confirm_status = mysqli_query($conn,$Query);
 $Query1="UPDATE `vendors` SET `balance` = '$txtbalance',`remaining` ='$txtremaning' WHERE `vendors`.`v_id` ='".$vendor."' ";
 $confirm_status1 = mysqli_query($conn,$Query1);

 // $Query2="INSERT INTO blns_rmng_mata(v_b_id,type,mata_key,mata_value,created_at) 
 //        values('$vendor','vendor','')";
if($confirm_status && $confirm_status1)
{
    echo "Feed Successfully Added";
} 
else
{
    echo "no";
}
}


if(isset($_POST['vndr']))
{   
    
    $vendor=$_POST['vndr'];
$Query = "SELECT * FROM vendors WHERE v_id='".$vendor."'" ;
$result= mysqli_query($conn,$Query);
$row=mysqli_fetch_array($result);
$blns=$row['balance'];
$rmng=$row['remaining'];
$return_arr[]=array("blns" => $blns,"rmng" => $rmng);

echo json_encode($return_arr);
    
}
?>