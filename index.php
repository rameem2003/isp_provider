<?php

    include './connection/connection.php';
    session_start();

    if(isset($_POST['login'])){
        $admin_user = $_POST['admin_user'];
        $admin_pass = $_POST['admin_pass'];

        $login_query = "SELECT * FROM `admin` WHERE admin_user = '$admin_user' AND admin_pass = '$admin_pass'";

        $run = mysqli_query($conn, $login_query);

        if(mysqli_num_rows($run) > 0){
            $row = mysqli_fetch_assoc($run);
            $_SESSION['admin_id'] = $row['id'];
            header("location:dashboard.php");
        }else{
            echo "<script> alert('Something went wrong Admin!'); </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anika Cable Network || Admin login</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="./icon//browser.png" type="image/x-icon">
</head>
<body>
    <form action="" method="post">
        <h1>Admin Login</h1>
        <input type="text" name="admin_user" id="" placeholder="Enter username">
        <input type="password" name="admin_pass" id="" placeholder="Enter password">
        <input type="submit" name="login" value="Login">

        <span>System developed by: Mahmood Hassan Rameem</span>
    </form>
</body>
</html>