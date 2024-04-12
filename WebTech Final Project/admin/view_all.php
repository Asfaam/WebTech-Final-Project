<?php 

    include("header.php"); 
    include '../settings/connection.php';

?>


    <div class="panel panel-default">
        <div class="container p-5 my-5 bg-dark text-white">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <a class="btn btn-success" href="create_class.php">Add student</a>
                </div>
                <div class="col-auto">
                    <a class="btn btn-info" href="adminPage.php">Back</a>
                </div>            
            </div>
            <br>
                <table class="table table-striped">
                <tr>
                <th>#_Roll</th><th>Dates</th><th>Show Attendance</th>
                </tr>
                <?php $result = mysqli_query($conn, "SELECT distinct date FROM attendance_records");
                $serialnumber=0;
                while($row = mysqli_fetch_array($result)) 
                {
                $serialnumber++;
                ?>
                <tr>
                <td><?php echo $serialnumber;?></td>
                <td><?php echo $row['date'];?>
                </td>
                <td>
                    <form action="show_attendance.php" method="POST">
                        <input type="hidden" value=<?php echo $row['date']?> name="date">
                        <input type="submit" value="Show Attendance" class="btn btn-primary">
                    </form>
                </td>
                </tr>
                <?php 
                }
                ?>
                </table>
            </form>
        </div>
    </div>