<?php 

    include './connection/connection.php';
    session_start();

    // load admin name
    $admin_id = $_SESSION['admin_id'];

    // update admin_info
    if(isset($_POST['update'])){
        $update_user = $_POST['admin_user'];
        $update_pass = $_POST['admin_pass'];

        $update_admin_query = "UPDATE `admin` SET admin_user = '$update_user', admin_pass = '$update_pass' WHERE id = '$admin_id'";

        if(mysqli_query($conn, $update_admin_query)){
            header("location:index.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <form action="" method="post">
        <h1>Admin update</h1>

        <?php 

            // load admin info in form
            $load_admin_info_query = "SELECT * FROM `admin` WHERE id = '$admin_id'";
            $load_admin_info = mysqli_query($conn, $load_admin_info_query);

            if(mysqli_num_rows($load_admin_info) > 0){
                $row = mysqli_fetch_assoc($load_admin_info);
            }

        ?>

        <input type="text" name="admin_user" id="" placeholder="Enter username" value="<?php echo $row['admin_user'] ?>" required>
        <input type="text" name="admin_pass" id="" placeholder="Enter password" value="<?php echo $row['admin_pass'] ?>" required>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>