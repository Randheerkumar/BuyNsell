<?php  
 session_start();
 include 'ConnectDB.php';
 $username=$_SESSION['username'];
 $cat=$_SESSION['product_id'];
 $price=$_SESSION['price'];
$balance_c=0;
 //$state_id=$_SESSION['state_id'];
 $buy=0;
 //$state_name="";
$yes="successfully purchased the item";
//$no="invalid Account no";
 ?>
<?php
if(isset($_POST['submit']))
{
     // $usernameErr = $emailErr = $passwordErr="";
     // $loginErr="";
      $bank=$_POST["bank"];
      $account_no=$_POST["account_no"];
      $_SESSION['ac']=$account_no;
      $_SESSION['bnk']=$bank;
      $sql="SELECT * FROM account_Info WHERE account_no='$account_no' AND bank_name='$bank'";
     // $sqll="SELECT * FROM users WHERE userName='$username' AND password='$pass'";      

      $result=mysqli_query($db,$sql);
     // $resultt=mysqli_query($db,$sqll);

      if(mysqli_num_rows($result)==1)
       {
         // $_SESSION['message']="you are now loggged in";
         // $_SESSION['username']=$username; 
          //$_SESSION['password']=$password;
         // $_SESSION['logout']=1;
         while( $row = $result->fetch_array()) 
         {
           $balance=$row['balance'];
           $balance_c=$balance-$price;
         // echo"$balance_c";
           $_SESSION['a']=$balance_c;
           //echo "<h3><font color='green'>".$row['state_name']."</font></h3>";
         }
         if($balance_c>=0)
         {
          $sq="UPDATE account_Info set balance='$balance_c' WHERE account_no='$account_no' AND bank_name='$bank'";
          mysqli_query($db,$sq);
          $sqq="UPDATE account_Info set balance=balance+'$price' WHERE account_no='6069860007072442' AND bank_name='SBI'";
          mysqli_query($db,$sqq);
         // $logut=1;
           $sqqq="UPDATE product set status=1 WHERE product_id='$cat'";
          mysqli_query($db,$sqqq);
         // header("location:homesearch.php");
         
          //echo"you have successfully bought";
          $_SESSION['yes']=$yes;
          $buy=1;
          $no="";
          header("location:abc.php");
         }
        else
         {
          $yes="you have not enough balance";
           $_SESSION['yes']=$yes;
           header("location:abc.php");  

         }
       }
      else
       {
           $yes="invalid account no";
           $_SESSION['yes']=$yes;
           $balance_c=0;
           $_SESSION['a']=$balance_c;
          echo"invalid bank account detail ,try later";
          header("location:abc.php");

       }
   
}

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
                          <th>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font color="green" >BUY IT</font><br>
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <form method="POST" action="buy.php"> 
                         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                         <select class="js-select2" name="bank">
			<option>select bank</option>
                        <option>SBI</option>
			<option>ICICI</option>
                        <option>IOB</option>
                      <!-- <option>Book</option> -->
                        <option>BOI</option>
		        <option>PNB</option>
		    
		        </select> 
                        <br>
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 
                         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                         <input type="text" name="account_no" placeholder="account_no">
                         <br>
                         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input type="submit" name="submit" value="submit">

                          </form>
 







                         </th>
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
                            
                    
                
                    <?php     echo '   <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="140" class="img-thumnail" />'; 


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
