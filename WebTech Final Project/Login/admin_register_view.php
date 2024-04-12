<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Attendance-MS|Admin-SignIn</title>
    <link rel="stylesheet" href="../css/admin_register_view.css">
    <link rel="stylesheet" href="../css/register_popup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
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
<body onload="openPopup()">
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="../action/admin_login_user_action.php" method="POST" name="signUpForm" id="signUpForm">
                <h3>Create Account</h3>
                <input type="text" placeholder="Enter First Name" name="fname" id="firstName" required>
                <input type="text" placeholder="Enter Last Name" name="lname" id="lastName" required>
                
                <input type="email" placeholder="Enter Email" name="email" id="email2" required>
                <button>
                    <label for="gender"><b>Dob | Sex</b></label><br>
                    <input type="date" placeholder="Enter Date of Birth" name="dob" id="dob" required>
                    <div class="row" required>
                        <div class="gender-radio">
                            <input type="radio" name="gender" id="male" value="male"> Male</div>
                        <div class="gender-radio">
                            <input type="radio" name="gender" id="female" value="female"> Female</div> 
                    </div>
                </button>
                <input type="tel" placeholder="Enter Phone Number" name="tel" id="phone" required>
                <input type="password" placeholder="Enter Password" name="password" id="pswd" required>
                <input type="password" placeholder="Confirm Password" name="password_confirm" id="pswd-repeat" required>
                <button type="submit" class="registerbtn" id="register2" onclick="return validateRegistration()">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="../action/admin_login_user_action.php" method="POST" name="loginForm" id="loginForm">
                <div class="containerrr">
                    <img src="../img/user-icn.png" alt="Login Image" style="width: 80%; max-width: 500px; height: auto;">
                
                    <div class="popup" id="popup">
                        <img src="../img/images.png">
                        <h3>!Restricted Access Alert</h3>
                        <p><b>Except for the Lecturer and FI</b></p>
                        <button type="button" onclick="closePopup()" style="color:beige; background-color:red;">OK</button>
                    </div>
                </div>
		
                
		<h3 style="font-family: Times New Roman, sans-serif;">SignIn Here:</h3> 
		<br>
		<br>
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <input type="email" placeholder="Email" name="email" id="email1" required>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" placeholder="Password" name="password" id="psw" required>  
                </div>
                <button type="submit" id="btn" onclick="return validateLogin()" style="font-family:Times New Roman; font-size:20px; font-weight:bold;">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
              
                <div class="toggle-panel toggle-right">
                    <h3 style="color:beige;font-size:30px; font-family: Times New Roman, sans-serif;"><em>Eduventure Attendance</em></h3>
		            <div>

                    <a href="../view/home_view.php">
                    <span style="float:right"><strong><button><i class='bx bx-user' style="font-family:Times New Roman; font-size:15px"> GoTo-StudentView </i></button></strong></span>
                    </a>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    
  
    <script>

        function validateLogin() {
            const email = document.getElementById('email1').value;
            const password = document.getElementById('psw').value;

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[^\s]{8,}$/;
        
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address');
                return false;
            }
        
            if (!passwordRegex.test(password)) {
                alert('Please enter a valid password. Password must contain at least 8 characters');
                return false;
            }
            return true;
        }

        let popup = document.getElementById("popup");

        function openPopup() {
            popup.classList.add("open-popup");
        }

        function closePopup() {
            popup.classList.remove("open-popup");
        }


    </script>
</body>
</html>
