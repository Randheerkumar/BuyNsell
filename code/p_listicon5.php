<?php  
 session_start();
 include 'ConnectDB.php';
$sort=$_SESSION['sort'];
 if($sort==0)
 {
 $username=$_SESSION['username'];
 $cat=$_GET['id'];
 $state_id=$_SESSION['state_id'];
 $city_id=$_SESSION['city_id'];
 $_SESSION['category']=$cat;
 $state_name="";
 $noresult="no result found";
 }
else
{
$username=$_SESSION['username'];
 //$cat=$_GET['id'];
 $state_id=$_SESSION['state_id'];
 $city_id=$_SESSION['city_id'];
 $cat=$_SESSION['category'];
 $state_name="";
 $noresult="no result found";


}
 //$sort=$_SESSION['sort'];
 ?>

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Insert and Display Images From Mysql Database in PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
          
                <table class="table table-bordered">  
                     <tr>  
                          <th> </th> 
                            <a href="homesearch.php">go to home</a>
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          
                          <a href="p_listicon5.php?id=<?php echo$cat;?>">sort by price ASC</a>
                          <br>
                            
                     </tr>  
                <?php 

                if($sort==0)
                 {
                $q ="SELECT * FROM product WHERE product_id IN(SELECT p_id5 FROM seller_Info INNER JOIN city ON seller_Info.city_name=city.city_name WHERE city.city_id='$city_id') AND category='$cat'";
                 $_SESSION['sort']=1;  
                 }  
                else
                 {
                    $q ="SELECT * FROM product WHERE product_id IN(SELECT p_id5 FROM seller_Info INNER JOIN city ON seller_Info.city_name=city.city_name WHERE city.city_id='$city_id') AND category='$cat' ORDER BY price ASC";

                 }              
                $res = mysqli_query($db, $q);
                
                //$query ="SELECT * FROM product WHERE category='$cat' ";  
                //$result = mysqli_query($db, $query);  
                while($row = mysqli_fetch_array($res)):  
                  ?>
              
              <?php         $name=$city_name=$state_name=$noresult="";
                      $price=$row['price'];
                      $pid=$row['product_id'];
                       $queryy = "SELECT * FROM seller_Info where p_id5=$pid"; 
                       $resultt = mysqli_query($db, $queryy);

                        while($raw = mysqli_fetch_array($resultt))
                          {
                            $name=$raw['name'];
                            $city_name=$raw['city_name'];
                            $state_name=$raw['state_name'];
 

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
                        echo"<br>";


                          ?>
                    
                 <a  href="p_listdetail.php?id=<?php echo $pid;?> "> 
                    <?php     echo '   <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="70" width="50" class="img-thumnail" />  </a>'; 
echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp";echo"&nbsp"; ?>

 
                 </a>
                  
                 <?php echo"<font color='green'>Rs".$price."</font>";?><br><br>	<br><br><br>s
     <?php endwhile  ?>
                   <?php echo"<br><br><br>";?>
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  <?php echo"<font color='green'>".$noresult."</font>";?>
                
                </table>  
           </div>  
      </body>  
 </html>  
