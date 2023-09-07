<?php
include 'config/db.php';
session_start();

  $sql ="SELECT * FROM tbl_messages WHERE sender ='".$_SESSION['name']."'";
  $result = mysqli_query($conn,$sql);

  if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        ?>
        <div class="me-span">
            <div class="me">
                <div>
                  <?php echo $row['message']; ?>
                </div>
            </div>
        </div>   
        <?php
    }
  }
?>