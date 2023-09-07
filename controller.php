<?php
    include 'config/db.php';
    session_start();

    if(isset($_POST['btn'])){
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['pass'];

        $sql = "INSERT INTO tbl_user (username,email,password) VALUE ('$name', '$email', '$password')";
        $result = mysqli_query($conn, $sql);

        if($result == true){
            header("Location: index.php");
        }
    }