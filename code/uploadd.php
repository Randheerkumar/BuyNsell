<?php  
 session_start();
 include 'ConnectDB.php';
 $pid="";
 if(isset($_POST["submit"]))  
 {  
      $title=$_POST["title"];
      $category=$_POST["category"];
      $price=$_POST["price"];
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
      $description=$_POST["description"];
      $date= date("Y/m/d");
     // $query = "INSERT INTO tbl_images(name) VALUES ('$file')"; 
       $sql="INSERT INTO product(title,category,description,price,date,image) VALUES          ('$title','$category','$description','$price','$date','$file')";
     $db->query($sql); 

     $name=$_POST["name"];
     $username=$_SESSION["username"];
     $contactno=$_POST["contact_no"];
     $state_name=$_POST["state_name"];
     $city_name=$_POST["city_name"];
     $pid="";
     $sqll="SELECT * FROM product ORDER BY product_id DESC LIMIT 1";
     $ran=$db->query($sqll);

    while( $row = $ran->fetch_array())
     {

       $pid=$row['product_id'];
     }

      $sqlll="INSERT INTO seller_Info(name,username,city_name,state_name,contactno,p_id5) VALUES          ('$name','$username','$city_name','$state_name','$contactno','$pid')";

    $db->query($sqlll);
    //echo $pid;

header("location:homesearch.php");
  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           <link type="text/css" rel="stylesheet" href="style/style_upload.css" />
           <title>upload</title>  
          
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

   <style>
 body
{
  
  position:fixed; 
  
  background-image: url("http://www.voyagerbpo.com/images/Tour-Data-Upload-and-Management.jpg");
  

  font-family: Arial, Helvetica, sans-serif;
}
.container
{
 position:fixed;
 margin-left:500px;
 font-color:black;
}

.container11
{
    margin-left:1275px;
 margin-top:5px;

}


</style>

      </head>  
      <body>  
          <!-- <br /><br />  --> 
           <div class="container" style="width:500px;">  
                <h3 align="center">upload</h3>
                 &nbsp &nbsp  &nbsp &nbsp  
    		<div id="ans">
                 <a href="homesearch.php" ><h4><font color="black">go to homepage</font> </h4></a>    
                <br />  
		</div>
                
<tr>          <font color="black">
                 product info</font>
                </tr>
                <form method="post" enctype="multipart/form-data" id="textarea"> 
                     <tr>
                      <input type="text" name="title" placeholder="title">
                      &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp   
                     </tr>
                   
                     <tr>

 			<select class="js-select2" name="category">
			
                        <option>Camera</option>
			<option>Car</option>
                       <option>Mobile</option>
                      <!-- <option>Book</option> -->
                       <option>Cycle</option>
		       <option>TV</option>
		       <option>Computer</option>
			<option>Refrigerator</option>
		       <!--<option>Motorcycle</option> -->
			
		
					    
			
		      </select> 

                       &nbsp &nbsp  






                      
                     </tr>
                     <br> <br>
                       <tr>
                       <input type="number" name="price" placeholder="price" step="0.01" min="0" max="1000000"> <br>
                       &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp 
                      </tr>
                       
                       <tr>
                     <input type="file" name="image" id="image">
                      </tr>  <br>
                     <tr>
                      <textarea name="description" rows="4" cols="50" form="textarea"> description </textarea>
                     </tr>
                 
                      <hr>


                     <tr> <font color="black"> personal info</font></tr><br><br>
                     <tr>      
                      <input type="text" name="name" placeholder="name">
                     </tr>
                      &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp 
                     <tr>      
                      <input type="text" name="contact_no" placeholder="contact_no"><br><br>
                     </tr>
                     <tr>      
                      <input type="text" name="state_name" placeholder="state_name">
                     </tr>
                       &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp 
                     <tr>      
                      <input type="text" name="city_name" placeholder="city_name"><br><br>
                     </tr>
                     <input type="submit" name="submit" id="submit" value="submit" class="btn btn-info" />  
                </form>  
                <br />  
                <br/>  
          
           </div>  

   <div class="container11">
      
     
        <a href="index.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span>Log out
        </a>
      
    </div>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#submit').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
