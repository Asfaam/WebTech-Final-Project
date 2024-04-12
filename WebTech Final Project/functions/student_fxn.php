<?php
// Include the get_all_chores_action.php function
include '../action/get_all_student_names_action.php';


echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">';

// Function to display all chores
function display_all_names() {
    // Call the function to get all chores
    $names = get_all_names();
    
    // Check if chores are retrieved successfully
    if ($names !== false) {
        // Check if any chores exist
        if (!empty($names)) {
            // Display table headers
            echo "<table class='grid-table'>";
            echo "<tr><th>#_Roll</th><th>Student Name</th><th>Actions</th></tr>";
            
            // Initialize a counter for roll numbers
            $rollNumber = 1;
            
            // Loop through each chore and display its details
            foreach ($names as $name) {
                echo "<tr>";
                // Display the roll number
                echo "<td style='border: 1px solid #dddddd;'>" . $rollNumber++ . "</td>";
                // Display the student name
                echo "<td style='border: 1px solid #dddddd;'>" . $name['student_name'] . "</td>";
                // Add edit and delete icons or links here
                echo "<td style='border: 1px solid #dddddd;'>";
                echo "<a href='../admin/edit_student_name.php?attendance_id=" . $name['attendance_id'] . "' class='edit-link' style='color:green;'><i class='fas fa-edit' title='Edit'></i></a>&nbsp;&nbsp;&nbsp;";
                echo "<a href='../action/delete_student_name_action.php?attendance_id=" . $name['attendance_id'] . "' class='edit-link' style='color:red;'><i class='fas fa-trash-alt' title='Remove'></i></a>"; 
                echo "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {

            echo "<tr><td colspan='3' style='color: green; text-align: center; width: 99%;'><strong>No student enrolled !!!</strong></td></tr>";
        }
    } else {
        // Error retrieving chores
        echo "Error retrieving chores.";
    }
}
?>
