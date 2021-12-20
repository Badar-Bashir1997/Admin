<?php
include("../lib/DBConn.php");

if(isset($_POST['bird_qnty'])&&isset($_POST['bird_price']))

    {
        $Flock=$_POST['flock_id'];
        $m_Date=$_POST['bird_date'];
        $bird_qnty=$_POST['bird_qnty'];
        $bird_price=$_POST['bird_price'];
        $Status=$_POST['Status'];
        $type=$_POST['bird_sale_type'];
        $driver=$_POST['driver'];
        $broker=$_POST['broker'];
        $txtamount=$_POST['txtamount'];
        $txtbalance=$_POST['txtbalance'];
        $txtremaning=$_POST['txtremaning'];
        $tp=$bird_qnty*$bird_price;
        $rmng=0;
        $blns=0;
        if($txtamount>$tp)
        {
            $GLOBALS['blns']=$txtamount-$tp;
        }
        if($txtamount<$tp)
        {
           $GLOBALS['rmng']=$tp-$txtamount;
        }
        if($type=="per_bird")
        {
           $Query1="UPDATE flock SET remaining=remaining-'$bird_qnty' WHERE flock.flock_id='$Flock'";
 $confirm_status1 = mysqli_query($conn,$Query1); 
        }
        
        
        $Query = "INSERT INTO sales(flock_id,sale_name,sale_type, sale_qnty,price_per_unit,total_price,remaining,balance,   recived_amount, payment_method,sale_date,b_id,d_id) 
        values('$Flock','Bird','$type','$bird_qnty','$bird_price','$tp','$rmng','$blns','$txtamount','$Status','$m_Date','$broker','$driver')";
 $confirm_status = mysqli_query($conn,$Query);

 $Query2="UPDATE broker SET remaining='$txtremaning',balance='$txtbalance' WHERE broker.b_id='$broker' ";
 $confirm_status2 = mysqli_query($conn,$Query2);
       if($confirm_status&& $confirm_status2)
       {
        echo "Birds Successfully Sold";
        }
        else
        {
           echo "Birds Sale Not Added";
        }
}




if(isset($_POST['brkr']))
{   
    
    $broker_id = $_POST['brkr'];
    $Query  = "SELECT * FROM broker WHERE b_id='".$broker_id."'" ;
    // echo "<pre>";
    // print_r($Query);
    // die();
    $result = mysqli_query($conn,$Query);
    $row    = mysqli_fetch_array($result);
    $blns   = $row['balance'];
    $rmng   = $row['remaining'];
    echo json_encode( array("blns" => $blns,"rmng" => $rmng) );
    
}



// egg sale
if(isset($_POST['NumberOfEggs_sale'])&&isset($_POST['egg_price']))

    {
        $Flock=$_POST['flock_id'];
        $m_Date=$_POST['Egg_sale_date'];
        $egg_q=$_POST['NumberOfEggs_sale'];
        $egg_price=$_POST['egg_price'];
        $Status=$_POST['Status'];
        $type=$_POST['egg_sale_type'];
        $driver=$_POST['driver'];
        $broker=$_POST['broker'];
        $txtamount=$_POST['txtamount'];
        $txtbalance=$_POST['txtbalance'];
        $txtremaning=$_POST['txtremaning'];
        $tp=$egg_q*$egg_price;
        $rmng=0;
        $blns=0;
        if($txtamount>$tp)
        {
            $GLOBALS['blns']=$txtamount-$tp;
        }
        if($txtamount<$tp)
        {
           $GLOBALS['rmng']=$tp-$txtamount;
        }
        if($type=="per_crate")
        {
            $GLOBALS['egg_qnty']=$egg_q*360;
        }
        if($type=="per_tray")
        {
            $GLOBALS['egg_qnty']=$egg_q*30;
        }
        if($type=="per_egg")
        {
            $GLOBALS['egg_qnty']=$egg_q;
        }
        $Query1="UPDATE production SET remaining=remaining-'$egg_qnty' WHERE production.flock_id='$Flock' AND production.p_name='Egg'";
 $confirm_status1 = mysqli_query($conn,$Query1);
        $Query = "INSERT INTO sales(flock_id,sale_name,sale_type, sale_qnty,price_per_unit,total_price,remaining,balance,   recived_amount, payment_method,sale_date,b_id,d_id) 
        values('$Flock','Egg','$type','$egg_q','$egg_price','$tp','$rmng','$blns','$txtamount','$Status','$m_Date','$broker','$driver')";
 $confirm_status = mysqli_query($conn,$Query);

 $Query2="UPDATE broker SET remaining='$txtremaning',balance='$txtbalance' WHERE broker.b_id='$broker' ";
 $confirm_status1 = mysqli_query($conn,$Query1);
       if($confirm_status&&  $confirm_status1)
       {
        echo "Eggs Successfully Sold";
        }
        else
        {
           echo "Eggs Sale Not Added";
        }
}

// Eggg sale
if(isset($_POST['manure_qnty_sale'])&&isset($_POST['manure_sale_date']))

    {
        $Flock=$_POST['flock_id'];
        $m_Date=$_POST['manure_sale_date'];
        $manure=$_POST['manure_qnty_sale'];
        $manure_price=$_POST['manure_price'];
        $Status=$_POST['Status'];
        $tp=$manure*$manure_price;
        $Query1="UPDATE production SET remaining=remaining-'$manure' WHERE production.flock_id='$Flock' AND production.p_name='Manure'";
 $confirm_status1 = mysqli_query($conn,$Query1);
        $Query = "INSERT INTO sales(flock_id,sale_name, sale_qnty,price_per_unit,total_price,remaining,balance,   recived_amount, payment_method,sale_date) 
        values('$Flock','Manure','$manure','$manure_price','$tp','0','0','$tp','$Status','$m_Date')";
 $confirm_status = mysqli_query($conn,$Query);
 
       if($confirm_status&&  $confirm_status1)
       {
        echo "Manure Successfully Sold";
        }
        else
        {
           echo "Manure Sale Not Added";
        }
}



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
        $Flock=$_POST['flock_id'];
        $e_Date=$_POST['Egg_date'];
        $remain=$no_of_Eggs=$_POST['NumberOfEggs'];
        $Query = "INSERT INTO production(flock_id,p_name,p_date,qnty,remaining) 
        values('".$Flock."','Egg','".$e_Date."','".$no_of_Eggs."','".$remain."')" ;
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
        $Flock=$_POST['flock_id'];
        $m_Date=$_REQUEST['manure_date'];
        $manure=$_REQUEST['manure_qnty'];
        $Query = "INSERT INTO production(flock_id,p_name,p_date,qnty,remaining) 
        values('$Flock','Manure','$m_Date','$manure','$manure')" ;
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




if(isset($_POST['txtqnty']))
    {
      $Price=0;
      $Farm=$_POST['farm_id'];
        $Flock=$_POST['flock_id'];
        $e_Date=$_POST['txtDate'];
        $Qty=$qnty_of_feed=$_POST['txtqnty'];
        $f_name=$_POST['txtName'];
        $q1="SELECT purchase.id,purchase.remaining,purchase.price_per_unit FROM purchase WHERE purchase.name='Feed' AND purchase.remaining>0 ORDER BY `purchase`.`id` ASC";
        $result1 = mysqli_query($conn,$q1);

        while($row1=mysqli_fetch_array($result1))
        {
          $used=0;
          $d_id=$row1['id'];
          $d_q=$row1['remaining'];
          $p=$row1['price_per_unit'];
          if($GLOBALS['Qty']<=0)
          {
            
          }
          elseif($GLOBALS['Qty']>=$d_q)
          {
            $remaning_qnty=$GLOBALS['Qty'];
            $GLOBALS['Qty']=$GLOBALS['Qty']-$d_q;
            $used=$remaning_qnty-$GLOBALS['Qty'];
            $GLOBALS['Price']=$GLOBALS['Price']+$used*$p;
            $qry2="UPDATE purchase SET purchase.remaining=0 WHERE purchase.id='$d_id'";
            mysqli_query($conn,$qry2);
          }
          elseif($GLOBALS['Qty']<$d_q && $GLOBALS['Qty']>0 )
          {

            $GLOBALS['Price']=$GLOBALS['Price']+$GLOBALS['Qty']*$p;
            $Qnty=$d_q-$GLOBALS['Qty'];
            $GLOBALS['Qty']=0;
            $qry2="UPDATE purchase SET purchase.remaining='$Qnty' WHERE purchase.id='$d_id'";
            mysqli_query($conn,$qry2);
          }
        }
        $tp=$GLOBALS['Price'];
        $Query = "INSERT INTO expences(Farm_id,flock_id,e_name,sub_type,e_qnty,price,e_date) 
        values('$Farm','$Flock','Feed','$f_name','$qnty_of_feed','$tp','$e_Date')" ;
        
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
        echo "Feed Successfully Added";
    }
    else
    {
      
        echo "Feed Not Added";
    }
}



if(isset($_POST['qnty_of_dsl']))
    {
      
      $Price=0;
      $Farm=$_POST['farm_id'];
        $Flock=$_POST['flock_id'];
        $e_Date=$_POST['d_Date'];
        $Qty=$qnty_of_dsl=$_POST['qnty_of_dsl'];
        $q1="SELECT id,remaining,price_per_unit FROM purchase WHERE remaining>0 AND name='Diesel' AND type='Diesel' ORDER BY id ASC";
        $result1 = mysqli_query($conn,$q1);

        while($row1=mysqli_fetch_array($result1))
        {
          $used=0;
          $d_id=$row1['id'];
          $d_q=$row1['remaining'];
          $p=$row1['price_per_unit'];
          if($GLOBALS['Qty']<=0)
          {
            
          }
          elseif($GLOBALS['Qty']>=$d_q)
          {
            $remaning_qnty=$GLOBALS['Qty'];
            $GLOBALS['Qty']=$GLOBALS['Qty']-$d_q;
            $used=$remaning_qnty-$GLOBALS['Qty'];
            $GLOBALS['Price']=$GLOBALS['Price']+$used*$p;
            $qry2="UPDATE purchase SET remaining=0 WHERE id='$d_id'";
            mysqli_query($conn,$qry2);
          }
          elseif($GLOBALS['Qty']<$d_q && $GLOBALS['Qty']>0 )
          {

            $GLOBALS['Price']=$GLOBALS['Price']+$GLOBALS['Qty']*$p;
            $Qnty=$d_q-$GLOBALS['Qty'];
            $GLOBALS['Qty']=0;
            $qry2="UPDATE purchase SET remaining='$Qnty' WHERE id='$d_id'";
            mysqli_query($conn,$qry2);
          }
        }
        $tp=$GLOBALS['Price'];
        $Query = "INSERT INTO expences(Farm_id,flock_id,e_name,sub_type,e_qnty,price,e_date) 
        values('$Farm','$Flock','Desiel','No','$qnty_of_dsl','$tp','$e_Date')" ;
        
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
        echo "Diesel Successfully Added";
    }
    else
    {
       echo "Diesel Not Added";
    }
}



if(isset($_POST['qnty_of_wood']))
    {
      $Price=0;
      $Farm=$_POST['farm_id'];
        $Flock=$_POST['flock_id'];
        $e_Date=$_POST['d_Date'];
        $Qty=$qnty_of_wood=$_POST['qnty_of_wood'];
        $q1="SELECT id,remaining,price_per_unit FROM purchase WHERE remaining>0 AND name='Wood' AND type='Wood' ORDER BY id ASC";
        $result1 = mysqli_query($conn,$q1);

        while($row1=mysqli_fetch_array($result1))
        {
          $used=0;
          $d_id=$row1['id'];
          $d_q=$row1['remaining'];
          $p=$row1['price_per_unit'];
          if($GLOBALS['Qty']<=0)
          {
            
          }
          elseif($GLOBALS['Qty']>=$d_q)
          {
            $remaning_qnty=$GLOBALS['Qty'];
            $GLOBALS['Qty']=$GLOBALS['Qty']-$d_q;
            $used=$remaning_qnty-$GLOBALS['Qty'];
            $GLOBALS['Price']=$GLOBALS['Price']+$used*$p;
            $qry2="UPDATE purchase SET remaining=0 WHERE id='$d_id'";
            mysqli_query($conn,$qry2);
          }
          elseif($GLOBALS['Qty']<$d_q && $GLOBALS['Qty']>0)
          {

            $GLOBALS['Price']=$GLOBALS['Price']+$GLOBALS['Qty']*$p;
            $Qnty=$d_q-$GLOBALS['Qty'];
            $GLOBALS['Qty']=0;
            $qry2="UPDATE purchase SET remaining='$Qnty' WHERE id='$d_id'";
            mysqli_query($conn,$qry2);
          }
        }
        $tp=$GLOBALS['Price'];
        $Query = "INSERT INTO expences(Farm_id,flock_id,e_name,sub_type,e_qnty,price,e_date) 
        values('$Farm','$Flock','Wood','Wood','$qnty_of_wood','$tp','$e_Date')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
        echo "Wood Successfully Added";
    }
    else
    {
       echo "Wood Not Added";
    }
}



 if(isset($_POST['mdsnqnty']))
    {
      $Price=0;
      $Farm=$_POST['farm_id'];
        $Flock=$_POST['flock_id'];
        $m_name=$_POST['txtName'];
        $e_Date=$_POST['d_Date'];
        $Qty=$qnty_of_mdsn=$_POST['mdsnqnty'];
        $q1="SELECT id,remaining,price_per_unit FROM purchase WHERE remaining>0 AND type='$m_name' AND name='Medicine' ORDER BY id ASC";
        $result1 = mysqli_query($conn,$q1);

        while($row1=mysqli_fetch_array($result1))
        {
          $used=0;
          $d_id=$row1['id'];
          $d_q=$row1['remaining'];
          $p=$row1['price_per_unit'];
          if($GLOBALS['Qty']<=0)
          {
            
          }
          elseif($GLOBALS['Qty']>=$d_q)
          {
            $remaning_qnty=$GLOBALS['Qty'];
            $GLOBALS['Qty']=$GLOBALS['Qty']-$d_q;
            $used=$remaning_qnty-$GLOBALS['Qty'];
            $GLOBALS['Price']=$GLOBALS['Price']+$used*$p;
            $qry2="UPDATE purchase SET remaining=0 WHERE id='$d_id'";
            mysqli_query($conn,$qry2);
          }
          elseif($GLOBALS['Qty']<$d_q && $GLOBALS['Qty']>0 )
          {

            $GLOBALS['Price']=$GLOBALS['Price']+$GLOBALS['Qty']*$p;
            $Qnty=$d_q-$GLOBALS['Qty'];
            $GLOBALS['Qty']=0;
            $qry2="UPDATE purchase SET remaining='$Qnty' WHERE id='$d_id'";
            mysqli_query($conn,$qry2);
          }
        }
        $tp=$GLOBALS['Price'];
        $Query = "INSERT INTO expences(Farm_id,flock_id,e_name,sub_type,e_qnty,price,e_date) 
        values('$Farm','$Flock','Medicine','$m_name','$qnty_of_mdsn','$tp','$e_Date')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
        echo "Medicine Successfully Added";
    }
    else
    {
       echo "Medicine Not Added";
    }
}
 ?>
