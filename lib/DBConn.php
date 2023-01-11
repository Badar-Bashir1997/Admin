<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "poultry_farm";
 $conn = mysqli_connect($servername, $username, $password,$dbname);
 if (!$conn)
 	{
    die("Connection failed: " . mysqli_connect_error());
	}
 else
 {
 $Query = "SELECT * FROM settings";
            $result1 = mysqli_query($conn, $Query);
            $row = mysqli_fetch_array($result1);
            $logo=$row['logo']	;
            $favicon=$row['favicon']   ;
 }


// $servername = "localhost";
//  $username = "axcelwor_poultry";
//  $password = "L&1U+zvf.i~.";
//  $dbname = "axcelwor_poultry";
//  $conn = mysqli_connect($servername, $username, $password,$dbname);
//  if (!$conn)
//    {
//     die("Connection failed: " . mysqli_connect_error());
//    }
//  else
//  {
//  //echo "Connected successfully";   
//  }


?>