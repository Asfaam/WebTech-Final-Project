<?php
// Include the connection file
include("../admin/header.php");
include '../settings/connection.php';
include '../functions/student_fxn.php';
// Check if the attendance ID is provided in the GET request
if (isset($_GET['attendance_id'])) {
    // Retrieve the attendance ID from the GET parameter and sanitize it
    $attendance_id = intval($_GET['attendance_id']);

    // Prepare and execute the delete query only if the ID is valid
    if ($attendance_id > 0) {
        // Write the DELETE query to delete the attendance record from the database
        $sql = "DELETE FROM attendance WHERE attendance_id = ?";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Check if the statement was prepared successfully
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("i", $attendance_id);

            // Execute the query
            if ($stmt->execute()) {
                // Attendance record deleted successfully, redirect to appropriate page
                header("Location: ../admin/create_class.php");
                exit();
            } else {
                // Error executing query
                echo "Error: Unable to execute the delete query.";
            }

            // Close statement
            $stmt->close();
        } else {
            // Error preparing statement
            echo "Error: Unable to prepare the delete statement.";
        }
    } else {
        // Invalid attendance ID provided
        echo "Error: Invalid attendance ID.";
    }
} else {
    // Attendance ID not provided
    echo "Error: Attendance ID not provided.";
}

// Close connection
$conn->close();
?>
