<?php
// Include the connection file
include '../settings/connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect form data and assign each to a variable
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Encrypt the password

    // Check if phone number already exists
    $check_phone_query = "SELECT * FROM people WHERE tel = ?";
    $check_phone_stmt = $conn->prepare($check_phone_query);
    $check_phone_stmt->bind_param("s", $tel);
    $check_phone_stmt->execute();
    $check_phone_stmt->store_result();
    $phone_count = $check_phone_stmt->num_rows;
    $check_phone_stmt->close();

    if ($phone_count > 0) {
        // Registration successful, redirect to registration success page
        header("Location: ../Login/no_duplicate_phone_number.php");
        exit();
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM people WHERE email = ?";
    $check_email_stmt = $conn->prepare($check_email_query);
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $check_email_stmt->store_result();
    $email_count = $check_email_stmt->num_rows;
    $check_email_stmt->close();
    
    if ($email_count > 0) {
        // Registration successful, redirect to registration success page
        header("Location: ../Login/no_duplicate_email.php");
        exit();
    } 
    
    // Set default value for rid
    $rid = 3;
    
    // Write your INSERT query using the variables above
    $sql = "INSERT INTO people (rid, fname, lname, gender, dob, tel, email, passwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("isssssss", $rid, $fname, $lname,$gender, $dob, $tel, $email, $hashed_password);
    
    // Execute the query
    if ($stmt->execute()) {
        // Registration successful, redirect to registration success page
        header("Location: ../Login/registration_success.php");
        exit();
    } else {
        // Registration failed, display error on register_view page
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close statement
    $stmt->close();
    
    // Close connection
    $conn->close();
}
?>
