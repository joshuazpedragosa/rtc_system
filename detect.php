<?php
include 'config/db.php';
session_start();
$get = $_GET['a'];

 $sql ="SELECT * FROM tbl_messages WHERE sender='$get' AND recipient='".$_SESSION['name']."' AND msg_stat = 'sent'";
 $result = mysqli_query($conn,$sql);
 if($result->num_rows >0){
   while($row = $result->fetch_assoc()){
      echo $row['msg_id'];
   }
 }

 $sql = "UPDATE tbl_messages SET msg_stat = 'received' WHERE sender='$get' AND recipient='".$_SESSION['name']."' AND msg_stat = 'sent'";
 $result = mysqli_query($conn, $sql);
?>