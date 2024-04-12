<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance-MS|Student-View</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/home_view.css">
    <style>
        .txt:hover::after {
                content: "restricted access except for the Lecturer and FI";
                position: absolute;
                top: calc(100% + 5px); 
                left: calc(50% - 100px); 
            transform: translateX(-50%);
                background-color:  #ffcc00;
                color: red;
                padding: 10px; 
                border-radius: 5px;
                font-family: Goudy Old Style;
                font-size: 18px;
        }

        .dit{
            width: 200px;
            height: 80px;
            background: gold;
            border: none;
            margin-bottom: 10px;
            margin-left: 20px;
            font-size: 18px;
            border-radius: 20px;
            cursor: pointer;
            transition: .4s ease;
            color: #0056b3;
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
        <a href="#" class="brand flex items-center justify-center py-4" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:22px; font-weight:bold;">
            <i class='bx bx-calendar-check'></i>
            <span class="text font-bold text-lg ml-2" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:22px; font-weight:bold;">Attendance `MS`</span>
        </a>

        <ul class="side-menu top mt-10">
            <li class="active">
                <div>
                    <a href="../Login/admin_register_view.php">
                        <span><strong><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="font-family:Times New Roman; font-size:15px"><i class='bx bxs-dashboard'></i>&nbsp; GoTo-FacultyView</button></strong></span>
                    </a>
                </div>
            </li><br>
            <li>
                <a href="../Login/user_register_view.php" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" class="dit">
                    <i class='bx bx-show' ></i>
                    <span class="text font-bold" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" >View Attendance</span>
                </a>
            </li>
            <li>
                <a href="chat_with_lecturer.php" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" class="dit">
                    <i class='bx bx-chat' ></i>
                    <span class="text font-bold" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;">Chat with Lecturer</span>
                </a>
            </li>
            <li>
                <a href="request_absence.php" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" class="dit">
                    <i class='bx bxs-envelope'></i>
                    <span class="text font-bold" style="color:#0056b3; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;">Request Absence</span>
                </a>
            </li>
            <li>
		<br><br>
                <a href="../Login/logout_view.php"  style="color:gold; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" class="lit">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text font-bold" style="color:gold; text-decoration: blink; font-family:Times New Roman; font-size:18px; font-weight:bold;" >Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="content" class="ml-64">

    <?php include("../admin/header.php"); ?>

        <div class="panel panel-default">

            <div class="container p-5 my-5 bg-dark text-white">
		<h1>Platform Purposely To:</h1>
		<ol style="font-size:30px; font-family:Times New Roman;">
		    <li> Check your <b style="color:green">attendance log</b></li>
		    <li> Casually  <b style="color:gold">chat</b> with Lecturer </li>
		    <li> Place request for  <b style="color:red">absenteeism</b> </li>
		</ol>
            </div>
        </div>
    </section>
</body>
</html>
