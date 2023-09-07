<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel='stylesheet' type='text/css' href="css/chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='main.js'></script>
</head>
<header>
        <h1>
            Chat System <input type="button" id="search_name" value="Search"><input type="text" placeholder="Type name" id="search">
        </h1>
</header>
<div class="card">
<div>
    <h2>
        Profile
    </h2>
</div>
<div class="suggested">
     <h4>
     <li class="fa fa-user" id="user"></li>   
     <?php echo $_SESSION['name']; ?>
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
    <a href="logout.php">
    <h5>
    <i class="fa fa-sign-out" id="other" style="color: #B3B3B3;"></i>
        Logout
    </h5>
    </a>
</div>
</div>
<div class="second-card">
<div>
    <h2>
         Chats
    </h2>
</div>
<ul id="users">
   
</ul>
</div>
</body>
<script>
setInterval(getUser, 1000);
function getUser(){
    $.ajax({
        url: 'message_user.php',
        method: 'POST',
        cache: false,
        success: function(data){
            $("#users").html(data);
        }
    });
}
</script>
</html>