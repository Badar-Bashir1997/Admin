<?php 
                        if(isset($_POST['fname']) && isset($_POST['Location']) && isset($_POST['txtphone']) &&isset($_POST['capacity']) && isset($_POST['Farmid']) && isset($_POST['breedtype']) && isset($_POST['txt_email'])){
                            $fname=$_POST['fname'];
                            $Location=$_POST['Location'];
                            $txtPhone=$_POST['txtphone'];
                            $capacity=$_POST['capacity'];
                            $Farmid=$_POST['Farmid'];
                            $breedtype=$_POST['breedtype'];
                            $txt_email=$_POST['txt_email'];
                            $status="Available";
                             $Query = "INSERT INTO farm(Farm_id,name,location,Breed_type,phone_no,email,Status,bird_capacity) values('$Farmid','$fname','$Location','$breedtype','$txtPhone','txt_email','$status','$capacity')" ;
                                    $confirm_status = mysqli_query($conn,$Query);
                                   if($confirm_status)
                                   {
                                    
                                    echo $Farmid;
                                  
                                }
                                else
                                {
                                echo "string";
                                }
                                    }       
                                     ?> 