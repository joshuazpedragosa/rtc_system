<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel='stylesheet' type='text/css' href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='main.js'></script>
</head>
<body>
    <div class="card-span">
        <div class="card">
        <form method="POST">
        <h1 id="header">
            RTC login
        </h1>
        <div class="text-span">
           <li class="fa fa-envelope" id="icon"></li> <input class="text" type="text" placeholder="Email" name="email" id="email"><br>
        </div>
        <div class="text-span">
          <li class="fa fa-lock" id="icon"></li> <input class="text" type="password" placeholder="Password" name="pass" id="pass">
        </div>
        <div class="btn-span">
            <input type="submit" value="Log in" name="btn" id="btn">
        </div>
        <a href="register.php" id="register">Register account</a>
    </form>
        <?php
        include 'config/db.php';
        session_start();

            if(isset($_POST['btn'])){
                $email = $_POST['email'];
                $pass = $_POST['pass'];

                $sql = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$pass'";
                $result = mysqli_query($conn, $sql);

                if($result -> num_rows > 0){
                    while($row = $result -> fetch_assoc()){
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['name'] = $row['username'];

                        header("Location: chatview.php");
                    }
                }
            }
        ?>
        </div>
    </div>
</body>
</html>