<?php
include 'config/db.php';
session_start();

$sql ="SELECT * FROM tbl_messages WHERE sender ='".$_SESSION['name']."'";
$result = mysqli_query($conn,$sql);

if($result->num_rows >0){
while($row = $result->fetch_assoc()){
  $me = $row['sender'];
  $recipient =$row['recipient'];

  echo $me;
  echo $recipient;
}
}
  $sql ="SELECT * FROM tbl_messages WHERE recipient ='".$_SESSION['name']."'";
  $result = mysqli_query($conn,$sql);

  if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
      $reciever = $row['recipient'];
    }
  }

  $sql ="SELECT * FROM tbl_messages WHERE sender ='$me' AND ";
  $result = mysqli_query($conn,$sql);

  
?>