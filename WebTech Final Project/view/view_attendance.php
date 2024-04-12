<?php
// Include core.php
include("../admin/header.php"); 
include '../settings/core.php';
// Check user role
$userRoleID = getUserRoleID();
if ($userRoleID !== false) {
    // Check if the user is not a student
    if ($userRoleID != 3) {
        // Redirect to main dashboard|user homepage for non-admin users
        header("Location: ../view/home_view.php");
        die();
    }
} else {
    // Redirect to login page if user role is not available
    header("Location: ../Login/register_view.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance-MS|Student-View</title>
    <style>
	
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Times New Roman, sans-serif;
    background-color: #f0f0f0;
}

header, nav, main, footer {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

header {
    background-color: #333;
    color: #fff;
    text-align: center;
}

nav ul {
    list-style-type: none;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
}

main {
    display: flex;
    justify-content: space-between;
}

section {
    width: 45%;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
}

h2 {
    margin-bottom: 10px;
}

.attendance-list, .notification-list {
    list-style-type: none;
}

.attendance-list li, .notification-list li {
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

</style>
</head>
<body>
    <header>
        <h1 style="color:gold;">Check Your Attendance Log Here:</h1>
    </header>

    <nav>
        <ul style="text-align:center;">
            <li><a href="home_view.php" style="color:#0056b3; text-decoration: underline; font-size:23px;">Home</a></li>
            <li><a href="tbc.php" style="color:#0056b3; text-decoration: underline; font-size:23px;">Classes</a></li>
            <li><a href="tbc.php" style="color:#0056b3; text-decoration: underline; font-size:23px;">Notifications</a></li>
            
        </ul>
    </nav>

    <?php 

   
    include '../settings/connection.php';

?>


    <div class="panel panel-default">
        <div class="container p-5 my-5 bg-dark text-white">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <a class="btn btn-info" href="../view/home_view.php">Back</a>
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
                    <form action="user_show_attendance.php" method="POST">
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