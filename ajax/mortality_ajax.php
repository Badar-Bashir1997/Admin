<?php
include("../lib/DBConn.php");
if(isset($_POST['NumberOfBirds'])&&isset($_POST['flock_id']) )
{ $f_id=$_POST['flock_id'];
    $nob=$_POST['NumberOfBirds'];
$qry="UPDATE flock SET remaining=remaining-'$nob',mortality=mortality+'$nob' WHERE flock_id='".$f_id."'";
$cnfrm= mysqli_query($conn,$qry);
$qry1="INSERT INTO flock_mata(flock_id,mata_key,mata_value)VALUES('".$f_id."','died','".$nob."')";
$cnfrm1= mysqli_query($conn,$qry1);
if($cnfrm && $cnfrm1)
{
echo "ok";
}
else
{
    echo "no";
}
}


if(isset($_POST['NumberOfEggs'])&&isset($_POST['flock_id']))
{
        $Farm=$_POST['farm_id'];
        $Flock=$_POST['flock_id'];
        $e_Date=$_POST['Egg_date'];
        $remain=$no_of_Eggs=$_POST['NumberOfEggs'];
        $Query = "INSERT INTO egg_production(Farm_id,flock_id,e_date,noe_p,remaining) 
        values('".$Farm."','".$Flock."','".$e_Date."','".$no_of_Eggs."','".$remain."')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
        echo "Eggs Successfully Added";
        }
    else
    {
       echo "Eggs Not Added";
    }
}


if(isset($_POST['manure_qnty'])&&isset($_POST['flock_id']))

    {
        $Farm=$_POST['farm_id'];
        $Flock=$_POST['flock_id'];
        $m_Date=$_REQUEST['manure_date'];
        $manure=$_REQUEST['manure_qnty'];
        $Query = "INSERT INTO menure_production(Farm_id,flock_id,m_date,manure_p) 
        values('$Farm','$Flock','$m_Date','$manure')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
        echo "Manure Successfully Added";
        }
    else
    {
       echo "Manure Not Added";
    }
}
 ?>
