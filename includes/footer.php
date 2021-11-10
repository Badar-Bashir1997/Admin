<?php 
include("lib/DBConn.php");
$Query = "SELECT * FROM settings";
$result = mysqli_query($conn, $Query);
$row = mysqli_fetch_array($result);

 ?>
<footer class="main-footer ">
    <div class="pull-right hidden-xs ">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2021 <a href="#"><?php echo $row['name'];  ?></a>.<a href="#"><?php echo $row['phone_no'];  ?></a>.</strong> All rights
    reserved.
  </footer>