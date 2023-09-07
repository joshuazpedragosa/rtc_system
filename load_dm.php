<?php 
include 'config/db.php';
session_start();
$get = $_GET['a'];  
        $sql ="SELECT * FROM tbl_messages WHERE sender ='".$_SESSION['name']."' AND recipient = '$get' OR  sender='$get' AND recipient='".$_SESSION['name']."'";
        $result = mysqli_query($conn,$sql);
        
        if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
                if ($row['sender'] == $get){
                ?>
                <div class="sender-span" style="padding-right: 20px; position: absolute;">
                    <div class="sender">
                        <div>
                           <?php echo $row['message']; ?>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <?php
              }
              elseif($row['sender'] == $_SESSION['name']){
                ?>
                <div class="me-span" style="position: relative;">
                    <div class="me">
                        <div>
                          <?php echo $row['message']; ?>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <?php
              }
        }
      }
    ?>