
<?php
session_start();
include 'ConnectDB.php';
$_SESSION['sort']=0;

?>


<!DOCTYPE html>
<html>
<head>
<!--<link type="text/css" rel="stylesheet" href="style/style_search.css" />-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  position:fixed; 
  
  background-image: url("https://i.pinimg.com/originals/f7/94/89/f79489b27551709bf89884b374294214.jpg");
  

  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
  
  position:fixed;
  
}

.topnav a
 {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
   
  position:fixed;
  
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
 
  position:fixed;
  
}

#myBtn
{  margin-left:900px;
  font-size: 20px;
  margin-top: 20px;

  position:fixed;
  

}
.ct
{
     margin-bottom:120px;
  margin-left:1170px;
  font-size: 30px;
  background-color:DodgerBlue;


}
.topnav a.active {
  background-color: #2196F3;

  position:fixed;
    
color: white;
}

.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 10px;
  margin-right: 16px;
  border: none;
  font-size: 17px;

  position:fixed;
  
}

@media screen and (max-width: 600px)
 {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
	
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }
}

.icon
{
  margin-top: 200px;
  margin-left: 490px;
}
.active2
{
 background-color:pink;
 margin-left:120px;opacity:0.7;
 
}



.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.container
{
 margin-left:1265px;
 margin-top:-520px;

}


</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="uploadd.php">Upload</a>
  <a class="active2" href="see_uploadd.php">See Your Uploads</a>
  
  <input type="text"  placeholder="Search.." name="search"  id="myBtn">

</div>

<!--</div> -->

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>All india 

    
 
   <?php
       

       $query="SELECT * FROM state"; 
       $run=$db->query($query);
       while( $row = $run->fetch_array()) :
       

   ?>


     <div id="chat_data">

       <!-- <span id="hr"> <font size="4"><?php echo  $row['state_name'];?></font></span> -->


       <a href="homecity.php?id=<?php echo $row['state_id'];?>"> <font size="4"><?php echo $row['state_name'];?> </font></a>      

     </div> 
   
    <?php endwhile;?>      


    </p>
  </div>

</div>




<submit style="blue" class="ct"><i class="material-icons">search</i></submits>


<div class="icon">

 <a href="p_listicon.php?id=Camera">
 <button style="font-size:24px"> <i class="material-icons">local_see</i></button>
</a>  
 &nbsp&nbsp&nbsp&nbsp&nbsp
<a href="p_listicon.php?id=Car">
<button style="font-size:24px"> <i class="material-icons">directions_car</i></button>
</a>
&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="p_listicon.php?id=Mobile">
<button style="font-size:24px"><i class="material-icons">stay_primary_portrait</i></button>
</a>
&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="p_listicon.php?id=Refrigerator">
<button style="font-size:24px;"> <i class="material-icons">kitchen</i></button><br><br><br>
</a>
&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="p_listicon.php?id=Cycle">
<button style="font-size:24px"> <i class="material-icons">directions_bike</i></button>
</a>
&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="p_listicon.php?id=Computer">
<button style="font-size:24px"><i class="material-icons">computer</i></button>
</a>
&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="p_listicon.php?id=TV">
<button style="font-size:24px"> <i class="material-icons">desktop_windows</i></button>
</a>
&nbsp&nbsp&nbsp&nbsp&nbsp
<br>
<br>
&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp

</a>
</div>

<div class="container">
      
     
        <a href="index.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
      
    </div>


<script type="text/javascript" src="javascript/modal.js">   </script>
</body>
</html>

