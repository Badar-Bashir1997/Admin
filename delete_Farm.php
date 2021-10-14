<?php
    include("lib/DBConn.php");
?>
<?php
		$id = $_GET['f_id'];
		//echo $id;
		$SqlCommand = "DELETE FROM farm WHERE f_id = $id ";
		// echo $SqlCommand;
		// die;
		$result = mysqli_query($conn, $SqlCommand);
		if($result)
		{
			echo "Record has been Successfully Deleted";
		}
		else
		{
			echo "Error";
		}
		header("location:view_all_farm.php")	
		
?>