<?php
$q=$_REQUEST['q'];
$sql = "SELECT Breed_type FROM farm WHERE Farm_id = $q";
echo $q === "" ? "no suggestion" : $q;

 ?>