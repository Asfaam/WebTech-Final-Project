<?php 

        include("header.php"); 
        include '../settings/connection.php';

        // Start session
        session_start();

        // Function to check for login
        function isLoggedIn(){
            return isset($_SESSION['user_id']);
        }


        // Check if the user is logged in, else redirect to login page
        if(!isLoggedIn()){
            header("Location: ../Login/register_view.php");
            die();
        }

        // Function to get the user's role ID
        function getUserRoleID() {
            if (isset($_SESSION['role_id'])) {
                return $_SESSION['role_id'];
            } else {
                return false;
            }
        }

        // Check if there is an error message set in the session
        if(isset($_SESSION['assign_error'])) {
            // Display the error message
            echo "<h2 style='color: red; text-align: center; font-family: Times New Roman'>".$_SESSION['assign_error']."</h2>";

            // Unset the session variable to clear the message
            unset($_SESSION['assign_error']);
        }

        // Check user role
        $userRoleID = getUserRoleID();
        if ($userRoleID !== false) {
            // Check if the user is not a Lecturer or FI
            if ($userRoleID != 2 && $userRoleID != 1) {
                // Redirect to main dashboard|user homepage for non-admin users
                header("Location: adminPage.php");
                die();
            }
        } else {
            // Redirect to login page if user role is not available
            header("Location: ../Login/register_view.php");
            die();
        }

        $flag = 0;
        
        if(isset($_POST['submit']))
        { 
            // Check if any attendance status is not selected for any student
            $attendanceStatus = $_POST['attendance_status'] ?? array();
            if(count($attendanceStatus) !== count($_POST['student_name'])) {
                // Set an error message
                $_SESSION['assign_error'] = "Please select attendance status for all students.";
                // Redirect back to the same page to display the error message
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            }
            
            foreach($_POST['attendance_status'] as $id=>$attendance_status)
            {
                $student_name = $_POST['student_name'][$id];
                $student_ID = $_POST['student_ID'][$id];
                $date = date("Y-m-d  H:i:s");

                $result = mysqli_query($conn, "INSERT INTO attendance_records (student_name, student_ID, attendance_status, date) VALUES ('$student_name', '$student_ID', '$attendance_status', '$date')");

                if($result)
                {
                    $flag=1;
                }
            }
            
        }
?>


    <div class="panel panel-default">

    <div class="container p-5 my-5 bg-dark text-white">
        <div class="row justify-content-between">
            <div class="col-auto">
                <a class="btn btn-success" href="create_class.php">Add student</a>
            </div>
            <div class="col-auto">
                <a class="btn btn-info" href="view_all.php">View All</a>
            </div>
            <div class="col-auto">
                <a class="btn btn-info" href="adminPage.php">Back</a>
            </div>            
        </div>
        <br>

        <?php  if($flag) { ?>
        <div class="alert alert-success">
        Attendance Date Inserted Successfully
        </div>
        <?php } ?>

        <h3><div class="container p-2 my-2 border" style="background-color:beige; color:#0056b3; font-weight: bold; font-family: 'Times New Roman', Times, serif;"><div class="well text-center">Date: <?php $date = new DateTime(); echo $date->format('l, jS F Y'); ?></div></div>
        <div class="panel-body"></h3>

        <form action="take_attendance.php" method="Post">

        <table class="table table-striped">
        <tr>
        <th>#_Roll</th><th>Student Name</th><th>Student ID</th><th>Attendance Status</th>
        </tr>

        <?php $result = mysqli_query($conn, "SELECT * FROM attendance");
        $serialnumber=0;
        $counter=0;
        while($row = mysqli_fetch_array($result)) 
        {

        $serialnumber++;

        ?>

        <tr>
        <td><?php echo $serialnumber;?></td>
        <td><?php echo $row['student_name'];?>
        <input type="hidden" name="student_name[]" value="<?php echo $row['student_name'];?>">
        </td>
        <td><?php echo $row['student_ID'];?>
        <input type="hidden" name="student_ID[]" value="<?php echo $row['student_ID'];?>">
        </td>
        <td> 
        <input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Present" > Present
        <input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Absent" > Absent
        </td>
        </tr>
        <?php 
        $counter++;
        }

        ?>
        

        </table>

        <input type="submit" name="submit" value="Submit" class="btn btn-primary" required>

        </form>

    </div>

    </div>