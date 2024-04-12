<!DOCTYPE html>
<html>
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance-MS|No-Phone_Number_Duplicate</title>
    <link rel="stylesheet" href="../css/no_duplicate_phone_number.css">
<style>
        body {
            background-color: khaki;
            font-family: Times New Roman, sans-serif;
        }

    .btnnn{
        padding: 10px 60px;
        background: #fff;
        border: 0;
        outline: none;
        cursor: pointer;
        font-size: 22px;
        font-weight: 500;
        border-radius: 30px;
    }

	 button {
        padding: 10px 15px;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        background-color: #ff7200;
        color: #fff;
        }

        button:hover {
            background-color: beige;
            color: maroon;  
        }
        
    </style>

</head>
<body>
    <div class="container">
        <div class="popup" id="popup">
            <img src="../img/no_duplicate_phone_number.png">
            <h3>Duplicate Phone Number Alert!</h3><br>
            <p>The phone number you provided already exists.</p>
            <button type="button" onclick="redirect()" style="color: beige; background-color: red;">OK</button>
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
