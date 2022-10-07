<?php

    include '../connection/connection.php';

    session_start();

    // load user data in edit form
    $user_name = $_SESSION['user_name'];

    $load_user_in_edit_query = "SELECT * FROM `internet_user` WHERE name = '$user_name'";

    $run_user_query = mysqli_query($conn, $load_user_in_edit_query);

    if(mysqli_num_rows($run_user_query) > 0){
        $row = mysqli_fetch_assoc($run_user_query);
    }

    // update user data
    if(isset($_POST['update_user'])){
        $update_name = $_POST['new_name'];
        $update_ip = $_POST['new_ip'];
        $update_ip_pass = $_POST['new_ip_pass'];
        $update_speed = $_POST['new_speed'];
        $update_phone = $_POST['new_phone'];
        $update_address = $_POST['new_address'];


        $update_query = "UPDATE `internet_user` SET name = '$update_name', ip_add = '$update_ip', ip_pass = '$update_ip_pass', speed = '$update_speed', phone = '$update_phone', address = '$update_address' WHERE name = '$user_name'";

        if(mysqli_query($conn, $update_query)){
            echo '<script> alert("Update Successfull!"); </script>';
            header("location:../dashboard.php");
        }else{
            echo '<script> alert("Something went wrong Admin!"); </script>';
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['name'] ?> || Anika Cable Network</title>

    <link rel="stylesheet" href="../css/update_user.css">
    <link rel="shortcut icon" href="./icon/browser.png" type="image/x-icon">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">

        <h1>Upadate Info of <?php echo $row['name'] ?></h1>


        <label for="update_name">Name</label>
        <input type="text" name="new_name" id="update_name" value="<?php echo $row['name'] ?>">

        <label for="new_ip">IP Address: </label>
        <input type="text" name="new_ip" id="new_ip" value="<?php echo $row['ip_add'] ?>">

        <label for="new_ip_pass">IP Password: </label>
        <input type="text" name="new_ip_pass" id="new_ip_pass" value="<?php echo $row['ip_pass'] ?>">

        <label for="new_speed">Speed: </label>
        <input type="text" name="new_speed" id="new_speed" value="<?php echo $row['speed'] ?>">

        <label for="new_phone">Phone: </label>
        <input type="text" name="new_phone" id="new_phone" value="<?php echo $row['phone'] ?>">

        <label for="new_address">Address: </label>
        <input type="text" name="new_address" id="new_address" value="<?php echo $row['address'] ?>">

        <input type="submit" name="update_user" value="Update">
    </form>
</body>
</html>