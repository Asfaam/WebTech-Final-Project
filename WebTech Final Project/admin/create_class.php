<?php

include("header.php");
include '../settings/connection.php';
include '../functions/student_fxn.php';

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
    // Check if the user is not a Lecturer
    if ($userRoleID != 1) {
        // Redirect to main dashboard|user homepage for non-admin users
        header("Location: adminPage.php");
        die();
    }
} else {
    // Redirect to login page if user role is not available
    header("Location: ../Login/register_view.php");
    die();
}

function assign_error($error_message) {
    $_SESSION['assign_error'] = $error_message;
}
$flag=0;
if(isset($_POST['submit'])) {
    // Collect form data
    $pid = $_POST['name'] ?? '';
    $ID = $_POST['ID'] ?? '';

    // Check if all fields are filled
    if(empty($pid) || empty($ID)) {
        // Set an error message
        assign_error("Please fill out all fields.");
        // Redirect back to the form page to display the error message
        header("Location: ../admin/create_class.php");
        exit();
    }

    // Fetch the full name based on the selected PID
    $full_name = get_full_name_from_pid($pid);

    if($full_name) {
        // Check if the student ID already exists in the database
        $check_query = "SELECT * FROM attendance WHERE student_ID = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("s", $ID);
        $check_stmt->execute();
        $check_stmt->store_result();
        $count = $check_stmt->num_rows;
        $check_stmt->close();

        if($count > 0) {
            // Student ID already exists, set an error message
            assign_error("The student ID you provided already exists");
            // Redirect back to the form page to display the error message
            header("Location: ../admin/create_class.php");
            exit();
        }

    
            // Check if the student name already exists in the database
            $check_name_query = "SELECT * FROM attendance WHERE student_name = ?";
            $check_name_stmt = $conn->prepare($check_name_query);
            $check_name_stmt->bind_param("s", $full_name);
            $check_name_stmt->execute();
            $check_name_stmt->store_result();
            $count_name = $check_name_stmt->num_rows;
            $check_name_stmt->close();
    
            if($count_name > 0) {
                // Student name already exists, set an error message
                assign_error("This student has been enrolled into the class already");
                // Redirect back to the form page to display the error message
                header("Location: ../admin/create_class.php");
                exit();
            }

        // Insert the full name and student ID into the database
        $result = mysqli_query($conn, "INSERT INTO attendance (student_name, student_ID) VALUES ('$full_name', '$ID')");
        
        if($result) {
            $flag=1;
        } else {
            // Error inserting into the database, set an error message
            assign_error("Error inserting data into the database");
            // Redirect back to the form page to display the error message
            header("Location: ../admin/create_class.php");
            exit();
        }
    } else {
        // Error fetching full name, set an error message
        assign_error("Error fetching full name from database");
        // Redirect back to the form page to display the error message
        header("Location: ../admin/create_class.php");
        exit();
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance-MS | Create-Class</title>
    <style>
        table {
            width: 70%;
            margin-top: 20px;
            margin-left: auto; 
            margin-right: auto; 
        }

        th {
            padding: 5px; /* reduce padding */
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th:first-child {
            width: 50%; 
        }

        th:nth-child(2) {
            width: 50%;
        }

    </style>
</head>

<div class="panel panel-default">
    <div class="container p-5 my-5 bg-dark text-white">
        <?php if($flag) { ?>
            <div class="alert alert-success">
                <strong>Success!</strong> student added to class successfully
            </div>
        <?php } ?>

        <div class="row justify-content-between">
            <div class="col-auto">
                <a class="btn btn-success" href="create_class.php" style="color:black">Add student</a>
            </div>
            <div class="col-auto">
                <a class="btn btn-info" href="adminPage.php">Back</a>
            </div>
        </div>

        <br>

        <div class="panel-body">
            <form action="create_class.php" method="POST">
                <div class="form-group">
                    <label for="assignUser">Student Name:</label>
                    <select name="name" id="name" required style="display: inline-block; width: 200px;">
                        <?php
                        $standardUsers = get_standard_users(); 
                        if(!empty($standardUsers)) {
                            foreach($standardUsers as $user) {
                                echo "<option value='".$user['pid']."'>".$user['fname']." ".$user['lname']."</option>";
                            }
                        }
                        ?>
                    </select>
                    <br>
                </div>
                <br>
                <div class="form-group">
                    <label for="ID">Student ID:</label>
                    <input type="text" name="ID" id="ID" class="form-control" required style="display: inline-block; width: 200px;">
                </div>

                <br>

                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary" required>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container p-2 my-2 border">
    <h1 style="font-family:Times New Roman, san-serif; text-align:center;">Students Enrolled In Class</h1>
    <table id="choreTable" style="font-family:Times New Roman">
        <thead>
          
        </thead>
        <tbody>
            <!-- Call the function to display all chores -->
            <?php display_all_names(); ?>
        </tbody>
    </table>
</div>

<?php

// Function to get the full name from PID
function get_full_name_from_pid($pid) {
    global $conn; // Assuming $conn is your database connection object

    // SQL query to retrieve the full name based on PID
    $query = "SELECT CONCAT(fname, ' ', lname) AS full_name FROM people WHERE pid = ?";
    
    // Prepare the query
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        return false;
    }

    // Bind the parameter
    $stmt->bind_param("i", $pid);

    // Execute the query
    $stmt->execute();

    // Bind the result
    $stmt->bind_result($full_name);

    // Fetch the result
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    return $full_name;
}

// Function to retrieve all standard users
function get_standard_users() {
    global $conn;

    // Initialize an empty array to store standard users
    $standardUsers = array();

    // Write the SELECT query to fetch standard users
    $query = "SELECT * FROM people WHERE rid = 3"; 
    
    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Check if any records were returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch rows from the result set
            while ($row = mysqli_fetch_assoc($result)) {
                // Add each standard user to the array
                $standardUsers[] = $row;
            }
        }

        // Free result set
        mysqli_free_result($result);
    }

    // Return the array of standard users
    return $standardUsers;
}

?>
