<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href="css/chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<header>
        <h1>
            Chat System <input type="button" id="search_name" value="Search"><input type="text" placeholder="Type name" id="search">
        </h1>
</header>
<body onload="message();  scrollBottom()">
<div class="card">
<div>
    <h2>
        Profile
    </h2>
</div>
<div class="suggested">
     <h4>
     <li class="fa fa-user" id="user"></li>   
     Joshua Pedragosa
    </h4>
    <h5>
        <li class="fa fa-gear" id="other" style="color: #93E6EA;"></li>
        Settings
    </h5>
    <h5>
        <li class="fa fa-file" id="other" style="color: #FF923D;"></li>
        Privacy Policy
    </h5>
    <h5>
    <i class="fa fa-exclamation-triangle" id="other" style="color: #FF0000;"></i>
        Report
    </h5>
    <h5>
    <i class="fa fa-sign-out" id="other" style="color: #B3B3B3;"></i>
        Logout
    </h5>
</div>
</div>
<div class="second-card">
<?php
include 'config/db.php';
session_start();
$get = $_GET['a'];

$sql = "SELECT * FROM tbl_user WHERE username = '$get'";
 $result = mysqli_query($conn, $sql);
 
 if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $name = $row['username'];
    }
 }

 if(isset($_POST['send'])){
    date_default_timezone_set("Asia/Manila");
    $time = date("H:i:s a");
    $sender = $_SESSION['name'];
    $recipient = $_POST['recipient'];
    $message = $_POST['message'];

    if($message != null){
    $sql = "INSERT INTO tbl_messages (sender,recipient,message,time, msg_stat) VALUE ('$sender', '$recipient', '$message', '$time', 'sent')";
    $result = mysqli_query($conn, $sql);

    if($result == true){
        $_POST = array();
    }
}
else{
    ?>
    <script>
    $(function() {
       $('<div class="errmsg" style="color: red;">Message is Empty</div>')
       .insertAfter('#send')
       .delay(6000)
       .fadeOut(function() {
         $(this).remove(); 
       });
   });
   </script>
   <?php
}
 }
?>
<div>
    <h2 id="recipient">
     <a href="chatview.php"><li class="fa fa-arrow-left" id="less"></li> </a>  <?php echo $name; ?>
    </h2>
</div>
<div style="padding-left: 12px;">
<script>

    function message(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
           document.getElementById("messages").innerHTML = this.responseText;

        }
        xhttp.open("GET", "load_dm.php?a=<?php echo $get; ?>", true);
        xhttp.send();
    }
    setInterval(function(){
        message();
        detect();
    }, 1000);

    function scrollBottom(){
        var targetDiv = document.querySelector(".scroll");
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            targetDiv.scrollTop = targetDiv.scrollHeight;
        } 
       xhttp.open("GET", "load_dm.php?a=<?php echo $get; ?>", true);
        xhttp.send();
    }

    function detect(){
    $.ajax({
        url: "detect.php?a=<?php echo $get; ?>",
        method: 'POST',
        cache: false,
        success: function(data){
            if (data != 0){
                scrollBottom();
            }
        }
    });
}
</script>
 <div class="scroll" id="scrollBtm">
     <div id="messages">
        
     </div>
  </div>
</div>
  <form method="POST">
  <div class="text-message">
    <input type="text" name="message" id="text" placeholder="Write a message">
    <input type="text" name="recipient" value="<?php echo $name; ?>" hidden>
    <input type="submit" value="Send" name="send" id="send">
  </div>
  </form>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="load.js" defer></script>
</html>