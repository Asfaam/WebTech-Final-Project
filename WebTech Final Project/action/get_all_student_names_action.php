<?php
// Include the connection file
include '../settings/connection.php';

// Function to get all chores
function get_all_names() {
    global $conn;
    
    // Write the SELECT query to get all chores
    $sql = "SELECT * FROM attendance";
    
    // Execute the query
    $result = $conn->query($sql);
    
    // Check if execution worked
    if ($result) {
        // Check if any record was returned
        if ($result->num_rows > 0) {
            // Fetch records and store them in an array
            $names = array();
            while ($row = $result->fetch_assoc()) {
                $names[] = $row;
            }
            return $names;
        } else {
            return array(); // Return an empty array if no records found
        }
    } else {
        // Return false if query execution failed
        return false;
    }
}

