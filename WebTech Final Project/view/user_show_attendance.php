<?php 

    include("../admin/header.php"); 
    include '../settings/connection.php';


?>


    <div class="panel panel-default">

    <div class="container p-5 my-5 bg-dark text-white">
        <div class="row justify-content-between">
            <div class="col-auto">
                <a class="btn btn-info" href="view_attendance.php">Back</a>
            </div>          
        </div>
        <br>
        <form action="take_attendance.php" method="Post">

        <table class="table table-striped">
        <tr>
        <th>#_Roll</th><th>Student Name</th><th>Student ID</th><th>Attendance Status</th>
        </tr>

        <?php $result = mysqli_query($conn, "SELECT * FROM attendance_records WHERE date='" . $_POST['date'] . "'");
        $serialnumber=0;
        $counter=0;
        while($row = mysqli_fetch_array($result)) 
        {

        $serialnumber++;

        ?>

        <tr>
        <td><?php echo $serialnumber;?></td>
        <td><?php echo $row['student_name'];?>
        </td>
        <td><?php echo $row['student_ID'];?>
        </td>
        <td> 
        <input type="radio" name="attendance_status[<?php echo $counter; ?>]" 
        <?php if($row['attendance_status']=="Present") {
            echo "checked=checked";
        }?>
        value="Present"> <a href="#" style="text-decoration:none; color:green;">Present</a>  
              
        <input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Absent"
        <?php if($row['attendance_status']=="Absent") {
            echo "checked=checked";
        }?>
        >  <a href="#" style="text-decoration:none; color:red;">Absent</a> 
        </td>
        </tr>
        <?php 
        $counter++;
        }

        ?>
        

        </table>


        </form>

    </div>

    </div>