
<?php include 'ConnectDB.php';?>
<?php  

session_start();
$username=$_SESSION['username'];
$id=$_GET['id'];
//$_SESSION['state_id']=$id;
$_SESSION['city_id']=$id;
$_SESSION['sort']=0;
//$idd=$_SESSION['iid'];
//$pos="how are u";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
body {
    background-image:url("http://wallpaperget.com/images/light-grey-background-wallpaper-19.jpg");
}
#overflowTest {

    color: black;
    padding: 15px;
    width: 20%;
    height: 400px;
    margin-top:-750px;
    overflow: scroll;
    border: 1px solid black;


}

.icon
{
  margin-top: 200px;
  margin-left: 490px;


}
.state
{
  padding:240px; 
margin-bottom:-120px;
}
</style>

</head>
<body">



<div class="icon">

<a href="p_listicon5.php?id=Camera">
<button style="font-size:24px"> <i class="material-icons">local_see</i></button>
</a>
&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="p_listicon5.php?id=Car">
<button style="font-size:24px"> <i class="material-icons">directions_car</i></button>
</a>
&nbsp&nbsp
<a href="p_listicon5.php?id=Mobile">
<button style="font-size:24px"><i class="material-icons">stay_primary_portrait</i></button>
</a>
&nbsp&nbsp
<a href="p_listicon5.php?id=Refrigerator">
<button style="font-size:24px;"> <i class="material-icons">kitchen</i></button><br><br><br>
</a>
&nbsp&nbsp
<a href="p_listicon5.php?id=Cycle">
<button style="font-size:24px"> <i class="material-icons">directions_bike</i></button>
</a>
&nbsp&nbsp&nbsp
<a href="p_listicon5.php?id=Computer">
<button style="font-size:24px"><i class="material-icons">computer</i></button>
</a>
&nbsp&nbsp
<a href="p_listicon5.php?id=TV">
<button style="font-size:24px"> <i class="material-icons">desktop_windows</i></button>
</a>


</div>

<div class="state">

<a href="homesearch.php"><font color="green">go to homepage</font></a>

<!--<?php
     
      
       //$state_id=$_['id'];
      // $query="SELECT * FROM chatting where (fromUser='$fuser' AND toUser='$tuser') OR (fromUser='$tuser' AND toUser='$fuser') ORDER BY id "; 
      // $query="SELECT * FROM state WHERE state_id='$id'";
      // $ran=$db->query($query);
      // while( $row = $ran->fetch_array()) :
      

   ?>


    
    <!-- <font size="4"><?php echo $row['state_name'];?> </font> -->
     
    
 
</div>
<!<div id="overflowTest">-->



</div>


</body>
</html>

