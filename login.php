<?php
	session_start();
    include("lib/DBConn.php");
	if (isset($_REQUEST['BtnSave']))
	{
		$a = $_REQUEST['TxtEmail'];
		$b = $_REQUEST['TxtPassword'];
		if ($dbname != null)
		{
			$query = " SELECT * FROM admin WHERE Email = '$a' AND Password = '$b'";
			
			$result = mysqli_query($conn,$query);
			if (mysqli_num_rows($result) > 0)
			{
				$mem = mysqli_fetch_object($result);
        		$_SESSION['SESS_ID'] = $mem->id;
				$_SESSION['SESS_Name'] = $mem->Email;
				$_SESSION['SESS_img'] = $mem->image;
				header("Location: index.php");
				exit();
				//echo "Success";
			}
			else
			{
				echo "<span style='color:red;'>"."Username or Password Incorrect". "</span>";
				die ;
			}
		}
	}
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background:#222d32;">

<section>
	<br><br><br><br><br>
	<div class="container col-md-5" >
	<div class="card " style="padding: 30px;">
<form role="form" method="post">
	 <center>
		<h4 class="header-title m-t-0">Admin Login Area</h4><br>
	</center>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  name="TxtEmail" aria-describedby="emailHelp" placeholder="Enter email">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="TxtPassword" placeholder="Password">
  </div>
  <center>
  <button type="submit" class="btn btn-primary" name="BtnSave">Login</button>
</center>
</form>
</div>
</div>

</section>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>