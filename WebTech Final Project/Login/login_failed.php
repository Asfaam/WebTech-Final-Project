<!DOCTYPE html>
<html>
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance-MS|No-Email_Duplicate</title>
    <link rel="stylesheet" href="../css/login_failed.css">
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
            <img src="../img/login_failed.png">
            <h3>Incorrect Password or Email Alert!</h3><br>
            <p>You are not registered or you provided an <b style="color: red">incorrect</b> password or <b style="color: red">incorrect</b>  email.</p>
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
