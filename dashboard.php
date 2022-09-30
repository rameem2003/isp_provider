<?php

    include './connection/connection.php';
    session_start();

    // load admin name
    $admin_id = $_SESSION['admin_id'];

    $load_admin_name = "SELECT * FROM `admin` WHERE id = '$admin_id'";

    $run_admin = mysqli_query($conn, $load_admin_name);

    if(mysqli_num_rows($run_admin) > 0){
        $admin_row = mysqli_fetch_assoc($run_admin);
    }


    // admin registration
    if(isset($_POST['admin_reg'])){
        $new_admin_user = $_POST['new_admin_user'];
        $new_admin_pass = $_POST['new_admin_pass'];

        $add_admin_query = "INSERT INTO `admin`(admin_user, admin_pass) VALUES ('$new_admin_user','$new_admin_pass')";

        if(mysqli_query($conn, $add_admin_query)){
            echo '<script> alert("New Admin Added Successfully"); </script>';
        }else{
            echo '<script> alert("Somthing Wrong Admin !!!"); </script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/dashboard.css">
</head>
<body>
    <div id="wrapper">
        <div class="left">
            <div class="head">
                <h2>Welcome</h2>
                <h1><?php echo $admin_row['admin_user'] ?></h1>

                <button id="add_admin">Add Admin</button>
            </div>

            <div class="catagory">
                <h3>Catagory's</h3>

                <div class="options">
                    <button>Internet</button>
                    <button>Cable TV</button>
                </div>
            </div>
        </div>

        <div class="right">
            <div class="internet">
                <div class="title">
                    <h1>Anika Cable Network</h1>
                    <h2>Internet Details</h2>
                    <button id="add_internet_user">Add User</button>
                </div>

                <div class="customers">
                    <div class="search_box">
                        <input type="text" name="search_user" id="" placeholder="Search">
                        <button id="searchBtn" name="searchBtn">Search</button>
                    </div>
                    <table style="width: 100%; margin: 20px 0; border-collapse: collapse; border: 1px solid black;">
                        <thead>
                            <tr>
                                <td>Sl</td>
                                <td>Name</td>
                                <td>Ip</td>
                                <td>Ip Pass</td>
                                <td>Speed</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td>Mounth Bill</td>
                                <td>Date</td>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>Sl</td>
                                <td>Rameem</td>
                                <td>192.168.2.10</td>
                                <td>12345</td>
                                <td>20Mbps</td>
                                <td>01409029641</td>
                                <td>################</td>
                                <td>500</td>
                                <td>11/11/2022</td>
                                <td><i class="fa-solid fa-trash"></i></td>
                                <td><i class="fa-solid fa-pen-to-square"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- admin registration -->
    <section id="admin_regi">
        <form id="reg_form" action="" method="post" enctype="multipart/form-data">
            <h1>Create a new admin</h1>
            <button id="closeBtn"><i class="fa-solid fa-circle-xmark"></i></button>
            <input type="text" name="new_admin_user" id="" placeholder="Create admin user name">
            <input type="text" name="new_admin_pass" id="" placeholder="Create password">
            <input type="submit" name="admin_reg" value="Create Account">
        </form>
    </section>
    <!-- admin registration end-->

    <!-- user data upload -->
    <form id="userForm" action="" method="post" enctype="multipart/form-data">
        <h1>Hello Admin</h1>
        <button id="closeUserFormBtn"><i class="fa-solid fa-circle-xmark"></i></button>

        <input type="text" name="userName" id="name" placeholder="Enter user name: ">

        <input type="number" name="ip_add" id="ip_add" placeholder="Ip address: ">

        <input type="number" name="ip_pass" id="ip_pass" placeholder="Ip password: ">

        <input type="number" name="speed" id="speed" placeholder="Inter net speed: ">

        <input type="text" name="phone" id="" placeholder="Phone number: ">

        <input type="text" name="address" id="" placeholder="Address: ">

        <input type="number" name="bill" id="" placeholder="Amout of bill: ">

        <input type="date" name="date" id="">

        <input type="submit" name="upload" value="Upload">
        <a class="logout" href="admin.php?logout=<?php echo $admin_id ?>">Logout</a>
    </form>
    <!-- user data upload end-->


    
    <script>
        const addAdminBtn = document.getElementById("add_admin");
        const closeBtn = document.getElementById("closeBtn");
        const closeUserFormBtn = document.getElementById("closeUserFormBtn");


        const add_internet_user = document.getElementById("add_internet_user");

        const reg_form = document.getElementById("reg_form");
        const userForm= document.getElementById("userForm");

        addAdminBtn.addEventListener("click", () => {
            const admin_regi = document.getElementById("admin_regi");
            const wrapper = document.getElementById("wrapper");
            admin_regi.classList.toggle("expand");
            wrapper.classList.toggle("blur");
        });

        add_internet_user.addEventListener("click", () => {
            const userForm = document.getElementById("userForm");
            const wrapper = document.getElementById("wrapper");
            userForm.classList.toggle("expand");
            wrapper.classList.toggle("blur");
        })

        closeBtn.addEventListener("click", () => {
            const admin_regi = document.getElementById("admin_regi");
            const wrapper = document.getElementById("wrapper");
            admin_regi.classList.remove("expand");
            wrapper.classList.remove("blur");
        });

        closeUserFormBtn.addEventListener("click", () => {
            const userForm = document.getElementById("userForm");
            const wrapper = document.getElementById("wrapper");
            userForm.classList.remove("expand");
            wrapper.classList.remove("blur");
        })
    </script>
</body>
</html>