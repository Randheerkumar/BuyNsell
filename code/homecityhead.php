
<html>
<head>

</head>
<style>
.baby
{
 text-color:blue;
 color:solid black;
 text-font:
}
#hr
{
  color:black;
}
#hi
{
  color:blue;
}
</style>
<body>
<?php
       include 'ConnectDB.php';
       session_start();
      
       $state_id=$_SESSION['state_id'];
      // $query="SELECT * FROM chatting where (fromUser='$fuser' AND toUser='$tuser') OR (fromUser='$tuser' AND toUser='$fuser') ORDER BY id "; 
       $queryy="SELECT * FROM state WHERE state_id='$state_id'";
       $run=$db->query($queryy);
       while( $row = $run->fetch_array()) 
        {

           echo "<h3><font color='green'>".$row['state_name']."</font></h3>";
           echo"<br>";

        }



       $query="SELECT * FROM city WHERE state_id='$state_id'";
       $ran=$db->query($query);
       while( $row = $ran->fetch_array()) :
      

   ?>


     <div id="chat_data">
     <a href="p_listicon4.php?id=<?php echo $row['city_id'];?>"> <font size="4"><?php echo $row['city_name'];?> </font></a> 
     </div> 
     <div>
    
    <?php endwhile;?>

</body>
</html>
