<?php 

    // load user by name

    include './connection/connection.php';
    session_start();

    $user_name = $_SESSION['user_name'];

    $load_user = "SELECT * FROM `internet_user` WHERE name = '$user_name'";

    $show_user = mysqli_query($conn, $load_user);

    if(mysqli_num_rows($show_user)){
        $row = mysqli_fetch_assoc($show_user);
    }


    // logout 
    if(isset($_GET['logout'])){
        unset($user_name);
        header("location:dashboard.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['name']; ?> || Anika Cable Network</title>

    <link rel="stylesheet" href="./css/view_user.css">
    <link rel="shortcut icon" href="./icon/browser.png" type="image/x-icon">
</head>
<body>
    <div id="wrapper">
        <section class="user_info">
            <div class="title">
                <h1>Anika Cable Network</h1>
                <h2>Internet Subscriber Details</h2>
            </div>

            <div class="info">
                <h2>Name: <?php echo $row['name']; ?></h2>
                <h2>Phone: <?php echo $row['phone']; ?></h2>
                <h2>Ip Address: <?php echo $row['ip_add']; ?></h2>
                <h2>Ip pass: <?php echo $row['ip_pass']; ?></h2>
                <h2>Speed: <?php echo $row['speed']; ?> mbps</h2>
                <h2>Addreess: <?php echo $row['address']; ?></h2>
            </div>
        </section>

        <section class="bill_info">
            <table style="width: 100%; margin: 20px 0; border-collapse: collapse; border: 1px solid black;">
                <thead>
                    <tr>
                        <td>Date</td>
                        <td>Mounth Bill</td>
                        <td>Due Bill</td>
                        <td>Advance Bill</td>
                        <td>Status</td>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        $load_user = "SELECT * FROM `internet_user` WHERE name = '$user_name'";

                        $show_user = mysqli_query($conn, $load_user);

                        if(mysqli_num_rows($show_user) > 0){
                            while($row = mysqli_fetch_assoc($show_user)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['bill']; ?></td>
                                        <td><?php echo $row['due_bill']; ?></td>
                                        <td><?php echo $row['advance_bill']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                    </tr>
                                <?php
                            }
                        }else{
                            echo "NOT FOUND";
                        }
                    
                    ?>

                    
                </tbody>
            </table>
        </section>

        <section class="btn">
            <a href="update/update_internet_user_by_name.php?update=<?php echo $user_name ?>">Update User Info</a>
            <a href="view_internet_user_by_name.php?logout=<?php echo $user_name ?>">Logout</a>
        </section>
    </div>
</body>
</html>