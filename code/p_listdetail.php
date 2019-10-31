<?php  
 session_start();
 include 'ConnectDB.php';
 $username=$_SESSION['username'];
 $cat=$_GET['id'];
 //$state_id=$_SESSION['state_id'];
 //$state_name="";
$_SESSION['product_id']=$cat;
 ?>

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>product_detail</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
          
                <table class="table table-bordered">  
                     <tr>  
                          <th> </th>
                              <a href="homesearch.php">go to home page</a>
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          
                           <br>
                           <br>

                         
                     </tr>  
                <?php 

                 
                $query ="SELECT * FROM product WHERE product_id='$cat' ";  
                $result = mysqli_query($db, $query);  
                while($row = mysqli_fetch_array($result)):  
                  ?>
              
              <?php       
                      $name=$city_name=$state_name="";
                      $pid=$row['product_id'];
                      $price=$row['price'];
                      $_SESSION['price']=$price;
                      $description=$row['description'];
                       $queryy = "SELECT * FROM seller_Info where p_id5=$pid"; 
                       $resultt = mysqli_query($db, $queryy);

                        while($raw = mysqli_fetch_array($resultt))
                          {
                            $name=$raw['name'];
                            $city_name=$raw['city_name'];
                            $state_name=$raw['state_name'];
                            $phone_no=$raw['contactno'];
 
                            $_SESSION['p_id']=$pid;
                          }
                  ?>                       
                    <?php  echo"&nbsp";echo"&nbsp"; echo"<font color='purple'><p>".$row['title']."</p></font>";echo"&nbsp";echo"&nbsp";
                       // echo $name;
                        echo "  <font color='blue'>  ".$city_name." </font>";
                        echo"&nbsp";
 			echo"&nbsp";
			echo"&nbsp";
			echo"&nbsp";
			echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";
                        echo "  <font color='blue'>  ".$state_name." </font>";
                        echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";
                        echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";
                        echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";
                        echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";
                        echo"<font color='voilet'>contact:</font> ";
                        echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";
                        echo$name;
                        echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";
                        echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";
                        echo"<font color='pink'>phone_no:</font> ";
                        echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";
                        echo$phone_no;
                        echo"<br>";


                          ?>
                    
                      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            
                    
                
                    <?php     echo '   <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="400" width="300" class="img-thumnail" />'; 


      echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";
                        //echo$price;
 ?>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                 <?php echo"Rs".$price;?>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                
                <?php

                  echo"<a href='buy.php'> buy now</a>";
                ?>
                
               <!-- <a href="buy.php?id=<?php echo$pid;?>"-->
                   <?php
                    echo"<br><br>";
                    ?>
                  <?php echo"<font color='green'>".$description."</font>";?>
                  <!--= echo '<img src="'.$image.'" />'; 
                   
                   echo"<hr>"; 
                     
                }  
                ?>  -->
     <?php endwhile  ?>
                </table>  
           </div>  
      </body>  
 </html>  
