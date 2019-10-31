<?php
// define variables and set to empty values
 $emailErr = $usernameErr = $passwordErr=$loginErr="";
 $email = $username = $password="";$userExist="";
$logut="";$logut=0;
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
     if (empty($_POST["email"])) 
      {
         $emailErr = "Email is required";      
      } 
     else
     {
         $email = test_input($_POST["email"]);
         // check if e-mail address is well-formed
         if (!filter_var($email, FILTER_VALIDATE_EMAIL))
          {
            $emailErr = "Invalid email format";
          }
     }

    if (empty($_POST["username"]))
     {
        $usernameErr = "username is required";
     } 
     else 
     {
         $username = test_input($_POST["user"]);
   
     } 
     if (empty($_POST["password"])) 
      {
        $passwordErr = "passsword is required";
      } 
     else 
      {
        $password = test_input($_POST["password"]);
      }   

 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<?php 
session_start();
include 'ConnectDB.php';

?>


<?php

if(isset($_POST['sign_up']))
{
      $email=$_POST["email"];
      $username=$_POST["username"];
      $password=$_POST["password"];
      //echo $username; 
      $sqll="SELECT * FROM user WHERE username='$username'";
      $result=mysqli_query($db,$sqll);
   if(mysqli_num_rows($result)==1)
    {
         $userExist="username already exists";
         //echo"hiii";
    }
    
   else
    {
     
       $sql="INSERT INTO user(username,email,password) VALUES('$username','$email','$password')";

       $db->query($sql);
       //$_SESSION['message']="you are now loggged in";
       $_SESSION['username']=$username;
      // $_SESSION['pass']=$password;
       $_SESSION['logout']=1;
       
          header("location:homesearch.php");

   }
}



if(isset($_POST['login']))
{
      $usernameErr = $emailErr = $passwordErr="";
      $loginErr="";
      $username=$_POST["username"];
      $password=$_POST["password"];

      $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
     // $sqll="SELECT * FROM users WHERE userName='$username' AND password='$pass'";      

      $result=mysqli_query($db,$sql);
     // $resultt=mysqli_query($db,$sqll);

      if(mysqli_num_rows($result)==1)
       {
         // $_SESSION['message']="you are now loggged in";
          $_SESSION['username']=$username; 
          //$_SESSION['password']=$password;
          $_SESSION['logout']=1;
         // $sq="UPDATE users set status=1 WHERE userName='$username' AND password='$pass'";
         // mysqli_query($db,$sq);
         // $logut=1;
          header("location:homesearch.php");
         
      
       }
      else
       {
          $loginErr="either username or password is incorrect";

       }
   
}

?>




<html>
<title>
BUY & SELL
</title>

<head>
<link type="text/css" rel="stylesheet" href="style/style_index.css" />


<script>
var d=new Date();
document.getElementById("demo").innerHTML="hiiii";
</script>

</head>

<body>
<div class="headerx">
</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="headerx"> 
<div class="header">
<div id="form1" class="header">Username <br>
<input type="text" name="username" placeholder="Username" value=""> <br>
</div>
<div id="form2" class="header">Password <br>
<input placeholder="Password" type="password" name="password" value="" > <br>
</div>
<span class="error" id="fu"><strong><?php echo $loginErr;?></strong></span>
<input type="submit" class="submit1" value="login" name="login">

</div>

</form>
<div class="bodyx">
<div id="intro1" class="bodyx"> <strong>India's largest market-place<br>Buy and Sell your product any time </strong></div>
<div id="tag"><strong>BUY & SELL</strong></div>
<div id="intro2" class="bodyx"><strong>Create new account</strong></div>
</div>
<div id="form3" class="bodyx">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input placeholder="Username" type="text" id="mailbox" name="username" value=""> <span class="error">* <?php echo $usernameErr;?></span><span class="error"><?php echo $userExist;?><br>

<input placeholder="E-mail" type="text" id="mailbox" name="email" > <span class="error" value=" ">* <?php echo $emailErr;?></span><br>
<input placeholder="Password" type="password" id="mailbox" name="password" value=""> <span class="error">* <?php echo $passwordErr;?></span> <br>

<input type="submit" class="button2" value="sign_up" name="sign_up">
</div>

</div>
</form>



<?php

 $loggg=$_SESSION['logout'];
if($loggg==1)
{
 $log=$_GET['log'];
 $logg="logout";
  if($log==$logg)
    {
        $use=$_SESSION['username'];
        $paa=$_SESSION['pass'];
        $sq="UPDATE users set status=0 WHERE userName='$use' AND password='$paa'";
        mysqli_query($db,$sq);
        session_destroy();
    }
}
?>


</body>

</html>
