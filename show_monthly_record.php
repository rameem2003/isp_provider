<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Monthly Record</title>

    <link rel="stylesheet" href="./css/show_record.css">
</head>
<body>
    <div id="wrapper">
        <div class="title">
            <h1>Anika Cable Network</h1>
            <h2>Internet Subcriber Monthly Details</h2>
        </div>

        <div class="search_box">
            <form class="search_box" method="POST">
                <label for="">From: </label>
                <input type="date" name="from_date" id="">
                <label for="">To: </label>
                <input type="date" name="to_date" id="">
                <input class="search_btn" name="searchBtn" type="submit" value="Search">
            </form>
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
                    <td>Due Bill</td>
                    <td>Advance Bill</td>
                    <td>Status</td>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </thead>

            <tbody>

                <?php   
                    include './connection/connection.php';

                    if(isset($_POST['searchBtn'])){
                        $from_date = $_POST['from_date'];
                        $to_date = $_POST['to_date'];

                        if($from_date == "" || $to_date == ""){
                            echo '<script> alert("Please fill up date fields"); </script>';
                        }
                
                        $month_record = "SELECT * FROM `internet_user` WHERE date BETWEEN '$from_date' AND '$to_date'";
                
                        $run_month_record = mysqli_query($conn, $month_record);

                        if(mysqli_num_rows($run_month_record) > 0){
                            while($record_row = mysqli_fetch_assoc($run_month_record)){
                                ?>
                                    <tr>
                                        <td><?php echo $record_row['id'] ?></td>
                                        <td><?php echo $record_row['name'] ?></td>
                                        <td><?php echo $record_row['ip_add'] ?></td>
                                        <td><?php echo $record_row['ip_pass'] ?></td>
                                        <td><?php echo $record_row['speed'] ?></td>
                                        <td><?php echo $record_row['phone'] ?></td>
                                        <td><?php echo $record_row['address'] ?></td>
                                        <td><?php echo $record_row['bill'] ?></td>
                                        <td><?php echo $record_row['due_bill'] ?></td>
                                        <td><?php echo $record_row['advance_bill'] ?></td>
                                        <td><?php echo $record_row['status'] ?></td>
                                        <td><?php echo $record_row['date'] ?></td>
                                        <td><?php echo $record_row['signature'] ?></td>
                                    </tr>
                                <?php 
                            }
                        }else{
                            echo "NO DATA FOUND";
                        }
                    }

                    
                                
                ?>
            </tbody>
        </table>
    </div>


    <!-- <script>
        const form = document.querySelector("form");

        form.addEventListener("click", e => {
            e.preventDefault();
        })
    </script> -->
</body>
</html>