<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='main.js'></script>
</head>
<style>
    body{
    background-color: #303D44;
}
.card-span{
    padding-left: 40%;
    padding-top: 10%;
}
.card{
    background-color: black;
    text-align: center;
    width: 40%;
    border-radius: 20px;
    height: 350px;
    border: 1px solid #FFF;
}
form{
    padding: 20px;
}
#header{
    color: #FFF;
}
.text{
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    background: transparent;
    border-bottom: 1px solid #FFF;
    padding: 10px;
    color: #FFF;
}
.text-span{
    padding-bottom: 10px;
}
.btn-span{
    padding-top: 20px;
    padding-bottom: 10px;
}
#icon{
    color: #FFF;
    font-size: 30px;
}
#btn{
    border-radius: 20px;
    font-size: 20px;
    padding: 5px;
    font-weight: bold;
    width: 30%;
}
#register{
    color: #FFF;
}
</style>
<body>
    <div class="card-span">
        <div class="card">
        <form method="POST" action="controller.php">
        <h1 id="header">
            RTC Register
        </h1>
        <div class="text-span">
           <li class="fa fa-user" id="icon"></li> <input class="text" type="text" placeholder="Username" name="username" id="email"><br>
        </div>
        <div class="text-span">
           <li class="fa fa-envelope" id="icon"></li> <input class="text" type="text" placeholder="Email" name="email" id="email"><br>
        </div>
        <div class="text-span">
          <li class="fa fa-lock" id="icon"></li> <input class="text" type="password" placeholder="Password" name="pass" id="pass">
        </div>
        <div class="btn-span">
            <input type="submit" value="Register" name="btn" id="btn">
        </div>
        <a href="index.php" id="register">Log in</a>
    </form>
        </div>
    </div>
</body>
</html>