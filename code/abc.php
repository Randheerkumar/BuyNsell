<!DOCTYPE>
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

</div>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<a href="homesearch.php"> go to home page </a>
<?
session_start();
 include 'ConnectDB.php';
$price=$_SESSION['a'];
$yes=$_SESSION['yes'];
echo"<br>";
echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";
                        echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";
echo$yes;
echo"<br>";
echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";
                        echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";echo"&emsp;";
if($price>=0)
{
echo"your current balance is".$price;
}

?>
<br>
</div>


</body>

</html>
 
