<?php
// Include the connection file
include '../settings/connection.php';


// Function to get a single chore by ID
function get_names_by_id($attendance_id) {
    global $conn;

    // Write SELECT query to retrieve chore by ID
    $sql = "SELECT * FROM attendance WHERE attendance_id = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("i", $attendance_id);
        
        // Execute the query
        if ($stmt->execute()) {
            // Attendance retrieved successfully
            $result = $stmt->get_result();

            // Check if any record was returned
            if ($result->num_rows > 0) {
                // Fetch the record and assign to variable
                $names = $result->fetch_assoc();
                return $names;
            } else {
                // No attendance found with the given ID
                return null;
            }
        } else {
            // Error executing query
            return null;
        }
        
        // Close statement
    } else {
        // Error preparing statement
        return null;
    }
}
?>
