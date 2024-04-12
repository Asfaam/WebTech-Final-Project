<?php

include("header.php"); 
include '../settings/connection.php';


echo '<link rel="stylesheet" type="text/css" href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css">';

// Include the get_a_chore_action.php file
include '../action/get_a_student_name_action.php';


session_start();

// Function to check for login
function isLoggedIn(){
    return isset($_SESSION['user_id']);
}

// Function to get the user's role ID
function getUserRoleID() {
    if (isset($_SESSION['role_id'])) {
        return $_SESSION['role_id'];
    } else {
        return false;
    }
}

// Check if the user is logged in, else redirect to login page
if(!isLoggedIn()){
    header("Location: ../Login/register_view.php");
    die();
}


// Check if chore ID is provided in the URL
if (isset($_GET['attendance_id'])) {
    // Retrieve chore ID from URL
    $attendance_id = $_GET['attendance_id'];

    // Call the function to get the chore by ID
    $names = get_names_by_id($attendance_id);

    // Check if chore is found
    if ($names) {
        // Display the form for editing the chore
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Attendance-MS|Edit-StudentName</title>
              <style>
        	body {
            	    max-width: 100%;
		    font-family: Times New Roman;
 		    background-color: beige;   
        	}
            
        	h1{
            	    color: blue;
        	}

        	form {
            	    margin-bottom: 20px;
        	}

        	label {
            	    display: block;
            	    margin-bottom: 5px;
        	}

        	input[type="text"] {
            	    width: 300px;
            	    padding: 8px;
            	    font-size: 16px;
            	    border: 1px solid #ccc;
            	    border-radius: 4px;
        	}

        	    button {
            	    padding: 10px 20px;
            	    font-size: 16px;
            	    border: none;
            	    border-radius: 4px;
            	    cursor: pointer;
            	    background-color: #007bff;
            	    color: #fff;
        	}

            footer {
                background-color: #333;
                color: #fff;
                text-align: center;
                padding: 20px;
                position: absolute;
                bottom: 0;
                width: 80%;
            }

            p {
                color:cyan;
            }

        	button:hover {
            	    background-color: #0056b3;
        	}

    	</style>
        </head>
        <body>
        <div class="container p-2 my-2 border">
            <h1 style="color:#007bff">Edit Student Name</h1>
            <form action="../action/edit_student_name_action.php" method="POST" >
                <input type="hidden" name="attendance_id" value="<?php echo $names['attendance_id']; ?>">
                <label for="chore_name">Student Name:</label>
                <input type="text" name="student_name" id="student_name" value="<?php echo $names['student_name']; ?>" required title="Please enter a valid name" pattern="[A-Za-z\s]{2,}">
                
                <button type="submit" name="submit">Update Name</button>
            </form>
            <div>
	        <a href="create_class.php">
                    <span style="float:right"><strong><button><i class='bx bx-chevron-left'> Back </i></button></strong></span>
	        </a>
            </div>
            <footer>
            <p>&copy; 2024 Eduventure Attendance. All rights reserved.</p>
            </footer>
        </div>
        </body>
        </html>
        <?php
    } else {
        // Chore not found, redirect to chore control view page
        header("Location: take_attendance.php");
        exit();
    }
} else {
    echo "Error: Attendance ID not provided.";
    exit();
}
?>
