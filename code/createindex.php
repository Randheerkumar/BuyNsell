<?php
include 'ConnectDB.php';


$sql="CREATE INDEX idex
ON product (product_id,price)";
     $db->query($sql);

$sqll="CREATE INDEX idx
ON seller_Info (state_name,city_name,p_id5)";
     $db->query($sql);
     echo"index created";
   
?>
