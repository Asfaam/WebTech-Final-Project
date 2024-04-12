<?php

$_POST['attendance_id'];

include '../settings/connection.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $attendance_id = $_POST['attendance_id'];
    $student_name = $_POST['student_name'];
    $student_ID = $_POST['student_ID'];

    // Add more fields if needed
    
    // Write UPDATE query to update chore in the database
    $sql = "UPDATE attendance SET student_name = ? WHERE attendance_id = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("si", $student_name, $attendance_id);
        
        // Execute the query
        if ($stmt->execute()) {
            // Chore updated successfully, redirect to chore control view page
            header("Location: ../admin/create_class.php");
            exit();
        } else {
            // Error executing query
            echo "Error: Unable to update the chore.";
        }
        
        // Close statement
        $stmt->close();
    } else {
        // Error preparing statement
        echo "Error: Unable to prepare the update statement.";
    }
} else {
    // Form not submitted, redirect back to chore control view page
    header("Location: ../admin/create_class.php");
    exit();
}
?>
