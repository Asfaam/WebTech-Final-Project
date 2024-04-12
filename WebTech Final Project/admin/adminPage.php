<?php
// Include core.php
include '../settings/core.php';

include '../settings/connection.php';

// Check user role
$userRoleID = getUserRoleID();
if ($userRoleID !== false) {
    // Check if the user is not a Lecturer or FI
    if ($userRoleID != 2 && $userRoleID != 1) {
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
    <title>Attendance-MS|Faculty-View</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/adminPage.css">
    <style>
	#txt {
            position: relative;
            display: inline-block;
        }

        #txt:hover::after {
            content: "Acess Granted to Lecturer Only!";
            position: absolute;
            top: 0%; 
            left: 50%;
            transform: translateX(-50%);
            background-color: black;
            color: white;
            padding: 5px;
            border-radius: 5px;
            font-family: 'Goudy Old Style', sans-serif;
            font-size: 18px;
            z-index: 1; /
        }

        .dit{
            width: 200px;
            height: 28px;
            background: gold;
            border: none;
            margin-bottom: 10px;
            margin-left: 20px;
            font-size: 18px;
            border-radius: 20px;
            cursor: pointer;
            transition: .4s ease;
        }

        .dit:hover{
            background-color: #FF6347;
            color: white;
        }


        .lit{
            width: 200px;
            height: 80px;
            background: red;
            border: none;
            margin-bottom: 10px;
            margin-left: 50px;
            font-size: 18px;
            border-radius: 20px;
            cursor: pointer;
            transition: .4s ease;
        }

        .lit:hover{
            background-color: grey;
        }


    </style>
</head>
<body class="bg-gray-100 p-4">
    <section id="sidebar" class="w-64 bg-white shadow h-full fixed left-0 top-0">
        <a href="#" class="brand flex items-center justify-center py-4" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:24px; font-weight:bold;">
            <i class='bx bx-shield'></i>
            <span class="text font-bold text-lg ml-2" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:24px; font-weight:bold;">&reg admin</span>
        </a>

        <ul class="side-menu top mt-10">
            <li class="active">
                <div>
                  <a href="../view/home_view.php">
                    <span><strong><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="font-family:Times New Roman; font-size:15px"><i class='bx bxs-user'></i>&nbsp; GoTo-StudentView</button></strong></span>
                  </a>
                </div>
            </li><br>
            <li>
                <a href="create_class.php"  id="txt"  style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" class="dit">
                    <i class='bx bx-plus-circle' ></i>
                    <spanclass="text font-bold" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;">Create Class</span>
                </a>
            </li>
            <li>
                <a href="take_attendance.php" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" class="dit">
                    <i class='bx bx-user-check' ></i>
                    <span class="text font-bold" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;">Take Attendance</span>
                </a>
            </li>
            <li>
                <a href="view_all.php" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" class="dit">
                    <i class='bx bxs-show' ></i>
                    <span class="text font-bold" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;">View Attendance</span>
                </a>
            </li>
	    <li>
                <a href="manage_users.php" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" class="dit">
                    <i class='bx bxs-wrench' ></i>
                    <span class="text font-bold" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;">Manage Users</span>
                </a>
            </li>
            <li><br><br><br>
                <a href="../Login/logout_view.php" style="color:gold; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" class="lit">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text font-bold" style="color:gold; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;">Logout</span>
		</a>
            </li>
        </ul>
    </section>

    <section id="content" class="ml-64">
       
    <?php include("header.php"); ?>
        <div class="panel panel-default">

            <div class="container p-5 my-5 bg-dark text-white">
		<img src="../img/download.png" alt="Login Image" style="width: 50%; max-width: 200px; height: auto;">
		<h1 style="color:orangered">Empower The Faculty To:</h1>
		<ol style="font-size:30px; font-family:Times New Roman;">
		    <li> Keep track of students' <b style="color:green">attendance</b></li>
		    <li> Casually  <b style="color:gold">chat</b> with students </li>
		    <li> Endorse  <b style="color:#0056b3">absenteeism</b> requests</li>
		    <i class='bx bx-shield bx-spin' style='font-size: 3em;'></i>

		</ol>
            </div>
        </div>
    </section>

        
</body>
</html>
