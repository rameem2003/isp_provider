<?php

    include './connection/connection.php';

    echo $_GET['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <link rel="stylesheet" href="./css/update_user.css">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">

        <h1>Upadate User Info</h1>


        <label for="update_name">Name</label>
        <input type="text" name="update_name" id="update_name">

        <label for="new_ip">IP Address: </label>
        <input type="text" name="new_ip" id="new_ip">

        <label for="new_ip_pass">IP Password: </label>
        <input type="text" name="new_ip_pass" id="new_ip_pass">

        <label for="new_speed">Speed: </label>
        <input type="text" name="new_speed" id="new_speed">

        <label for="new_phone">Phone: </label>
        <input type="text" name="new_phone" id="new_phone">

        <label for="new_address">Address: </label>
        <input type="text" name="new_address" id="new_address">

        <label for="new_bill">Bill: </label>
        <input type="text" name="new_bill" id="new_bill">

        <label for="new_date">Date: </label>
        <input type="date" name="new_date" id="new_date">

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>