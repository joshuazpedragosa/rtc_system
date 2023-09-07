<?php
 include 'config/db.php';
 session_start();

 $sql = "SELECT * FROM tbl_user WHERE username != '".$_SESSION['name']."'";
 $result = mysqli_query($conn, $sql);
 
 if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        ?>
  <li>
    <a href="dm_page.php?a=<?php echo $row['username']; ?>">
            <div class="recent-chat">
                <h6>  
                <?php echo $row['username']; ?>
                <span>hello how are you?</span>
                <b>2:05 pm</b>
                </h6>
            </div>
    </a>
    </li>
        <?php
    }
 }
?>