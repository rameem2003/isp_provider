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

    // logout admin
    if(isset($_GET['logout'])){
        session_destroy();
        unset($admin_id);
        header("location:index.php");
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


    // add new user
    if(isset($_POST['internet_upload'])){
        $user_name = $_POST['userName'];
        $ip_address = $_POST['ip_add'];
        $ip_password = $_POST['ip_pass'];
        $speed = $_POST['speed'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $bill = $_POST['bill'];
        $due_bill = $_POST['due_bill'];
        $advance_bill = $_POST['advance_bill'];
        $status = $_POST['status'];
        $date = $_POST['date'];
        $signature = $_POST['signature'];


        $upload_user = "INSERT INTO `internet_user`(name, ip_add, ip_pass, speed, phone, address, bill, due_bill, advance_bill, status, date, signature) VALUES ('$user_name','$ip_address','$ip_password','$speed','$phone','$address','$bill', '$due_bill', '$advance_bill', '$status', '$date', '$signature')";


        if(mysqli_query($conn, $upload_user)){
            echo '<script> alert("New Bill Entry Successfull"); </script>';
        }else{
            echo '<script> alert("Somthing Wrong Admin !!!"); </script>';
        }
    }

    // delete user data
    if(isset($_GET['dl'])){
        $delete_internet_user = $_GET['dl'];
        $delete_query = "DELETE FROM `internet_user` WHERE id='$delete_internet_user'";
        mysqli_query($conn, $delete_query);
        header("location:dashboard.php");
    }

    // search_function

    if(isset($_POST['searchBtn'])){

        $search_op = $_POST['search_op'];
        
        if($search_op == "user_name"){
            $search_box = $_POST['search_user'];
            $search_query = "SELECT * FROM `internet_user` WHERE name = '$search_box'";

            $run_search = mysqli_query($conn, $search_query);


            if(mysqli_num_rows($run_search) > 0){
                $search_user = mysqli_fetch_assoc($run_search);
                $_SESSION['user_name'] = $search_user['name'];
                header("location:view_internet_user_by_name.php");
            }else{
                echo "<script> alert('No user found'); </script>";
            }

        }

        elseif($search_op == "user_ip"){
            $search_box = $_POST['search_user'];
            $search_query = "SELECT * FROM `internet_user` WHERE ip_add = '$search_box'";

            $run_search = mysqli_query($conn, $search_query);


            if(mysqli_num_rows($run_search) > 0){
                $search_user = mysqli_fetch_assoc($run_search);
                $_SESSION['user_ip'] = $search_user['ip_add'];
                header("location:view_internet_user_by_ip.php");
            }else{
                echo "<script> alert('No user found'); </script>";
            }
        }


        elseif($search_op == "user_phone"){
            $search_box = $_POST['search_user'];
            $search_query = "SELECT * FROM `internet_user` WHERE phone = '$search_box'";

            $run_search = mysqli_query($conn, $search_query);


            if(mysqli_num_rows($run_search) > 0){
                $search_user = mysqli_fetch_assoc($run_search);
                $_SESSION['user_phone'] = $search_user['phone'];
                header("location:view_internet_user_by_phone.php");
            }else{
                echo "<script> alert('No user found'); </script>";
            }
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
    <link rel="shortcut icon" href="./icon/browser.png" type="image/x-icon">
</head>
<body>
    <div id="wrapper">
        <div class="left">
            <div class="head">
                <h2>Welcome</h2>
                <h1><?php echo $admin_row['admin_user'] ?></h1>

                <button id="add_admin">Add Admin</button>
                <a id="update_admin" href="./update_admin.php">Edit Admin</a>
                <a id="admin_logout" href="dashboard.php?logout=<?php echo $admin_id ?>">Logout</a>
            </div>

            <div class="catagory">
                <h3>Catagory's</h3>

                <div class="options">
                    <!-- <button>Internet</button>
                    <button>Cable TV</button> -->
                </div>
            </div>
        </div>

        <div class="right">
            <div class="internet">
                <div class="title">
                    <h1>Anika Cable Network</h1>
                    <h2>Internet Details</h2>

                    <span id="clock">08 : 05 : 00 pm || 06 অক্টোবর ২০২২ || শুক্রবার</span>
                    <button id="add_internet_user">Bill entry</button>
                    <a href="./show_monthly_record.php" target="_blank" id="show_monthly_record">Show Monthly Record</a>
                </div>

                <div class="customers">
                    <form class="search_box" method="POST">
                        <select name="search_op" id="select">
                            <option value="user_name">User Name</option>
                            <option value="user_ip">IP Address</option>
                            <option value="user_phone">Phone Number</option>
                        </select>
                        <input type="text" name="search_user" id="" placeholder="Search user by ip address.....">
                        <input class="search_btn" name="searchBtn" type="submit" value="Search">
                    </form>

                    <div class="table">
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
                                    <td>Due Bill</td>
                                    <td>Advance Bill</td>
                                    <td>Status</td>
                                    <td>Date</td>
                                    <td>Signature</td>
                                </tr>
                            </thead>

                            <tbody>

                                <?php   
                                    
                                    $interner_user_list = "SELECT * FROM `internet_user`";

                                    $load_internet_user = mysqli_query($conn, $interner_user_list);

                                    if(mysqli_num_rows($load_internet_user) > 0){
                                        while($internet_row = mysqli_fetch_assoc($load_internet_user)){
                                            ?>
                                                <tr>
                                                    <td><?php echo $internet_row['id'] ?></td>
                                                    <td><?php echo $internet_row['name'] ?></td>
                                                    <td><?php echo $internet_row['ip_add'] ?></td>
                                                    <td><?php echo $internet_row['ip_pass'] ?></td>
                                                    <td><?php echo $internet_row['speed'] ?> Mbps</td>
                                                    <td><?php echo $internet_row['phone'] ?></td>
                                                    <td><?php echo $internet_row['address'] ?></td>
                                                    <td><?php echo $internet_row['bill'] ?> ৳</td>
                                                    <td><?php echo $internet_row['due_bill'] ?> ৳</td>
                                                    <td><?php echo $internet_row['advance_bill'] ?> ৳</td>
                                                    <td><?php echo $internet_row['status'] ?></td>
                                                    <td><?php echo $internet_row['date'] ?></td>
                                                    <td><?php echo $internet_row['signature'] ?></td>
                                                    <td><a href="dashboard.php?dl=<?php echo $internet_row['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                                                </tr>
                                            <?php 
                                        }
                                    }else{
                                        echo "NO DATA FOUND";
                                    }
                                    
                                ?>
                            </tbody>
                        </table>
                    </div>
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

        <input type="text" name="ip_add" id="ip_add" placeholder="Ip address: ">

        <input type="text" name="ip_pass" id="ip_pass" placeholder="Ip password: ">

        <input type="number" name="speed" id="speed" placeholder="Internet speed: ">

        <input type="text" name="phone" id="phone" placeholder="Phone number: ">

        <input type="text" name="address" id="address" placeholder="Address: ">

        <input type="number" name="bill" id="bill" placeholder="Amout of bill: ">

        <input type="number" name="due_bill" id="due_bill" placeholder="Deu bill: ">

        <input type="number" name="advance_bill" id="due_bill" placeholder="Advance bill: ">

        <input type="text" name="status" id="" placeholder="Pay Status">
        
        <input type="date" name="date" id="">

        <input type="text" name="signature" id="signature" placeholder="Signature: ">

        <input type="submit" name="internet_upload" value="Upload">
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


        // clock function
        const clock = () => {
            const d = new Date();

            h = d.getHours();
            m = d.getMinutes();
            s = d.getSeconds();

            day = d.getDay();
            date = d.getDate();
            month = d.getMonth();
            year = d.getFullYear();
            var ampm = "pm"

            const arrayOfMounth = ["জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর"];

            const arrayOfDay = ["রবিবার", "সোমবার", "মঙ্গলবার", "বুধবার", "বৃহস্পতিবার", "শুক্রবার", "শনিবার"];

            if(h >= 12){
                ampm = "pm";
            }else{
                ampm = "am";
            }

            if(h > 12){
                h = h - 12;
            }

            if(h < 10){
                h = `0${h}`;
            }

            if(m < 10){
                m = `0${m}`;
            }

            if(s < 10){
                s = `0${s}`;
            }


            document.getElementById("clock").innerHTML = `${h} : ${m} : ${s} ${ampm} || ${date} ${arrayOfMounth[month]} ${year} || ${arrayOfDay[day]}`;

            setInterval(clock, 1000);
        }

        clock();
    </script>
</body>
</html>