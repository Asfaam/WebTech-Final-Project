<!DOCTYPE html>
<html>
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance-MS|Registration-Success</title>
    <link rel="stylesheet" href="../css/registration_success.css">
    <style>
        body{
            background-color: khaki;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="popup" id="popup">
            <img src="../img/tick_popup.png">
            <h2>Thank you</h2>
            <p>You have registered successfully!</p>
            <button type="button" onclick="redirect()">OK</button>
        </div>
    </div>

<script>
let popup = document.getElementById("popup");

// Automatically open the popup
window.onload = function() {
    popup.classList.add("open-popup");
}

// Redirect function
function redirect() {
    // Redirect to the login view
    window.location.href = "../Login/register_view.php";
}
</script>
</body>
</html> 
