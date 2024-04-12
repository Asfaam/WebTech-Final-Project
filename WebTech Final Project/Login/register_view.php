<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Attendance-MS|Login-SignUp</title>
    <link rel="stylesheet" href="../css/register_view.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: Times New Roman, sans-serif;
        }

        button {
        padding: 10px 20px;
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

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="../action/register_user_action.php" method="POST" name="signUpForm" id="signUpForm">
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

            <?php
                // Start the session
                session_start();

                // Check if there is an error message set in the session
                if(isset($_SESSION['assign_error'])) {
                    // Display the error message
                    echo "<div class='error-message'>".$_SESSION['assign_error']."</div>";

                    // Unset the session variable to clear the message
                    unset($_SESSION['assign_error']);
                }
            ?>
        </div>
        <div class="form-container sign-in">
            <form action="../action/login_user_action.php" method="POST" name="loginForm" id="loginForm">
                <h2 style="color:green; font-size:24px; font-family: Goudy Old Style, sans-serif;"><em><strong>Eduventure Attendance</strong></em></h2> 
		<img src="../img/attnlg.jpg" alt="Login Image" style="width: 50%; max-width: 200px; height: auto;">
                <br>
		<h3>Log In</h3> 
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
                <button type="submit" id="btn" onclick="return validateLogin()">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h3>Don't have an account?</h3>
                    <p>Enter your personal details to register ➡️</p>
                    <p>Already have an account?<br><button class="hidden" id="login">Sign In</button></p>

                    <div><br><br>
                    <a href="../index.php">
                    <span style="float:right"><strong><button><i class='bx bx-door-open' style="font-family:Times New Roman; font-size:15px"> GoTo-WelcomePage </i></button></strong></span>
                    </a>
                    </div>
                </div>
                <div class="toggle-panel toggle-right">
                    <h3 style="color:gold; font-size:24px; font-family: Goudy Old Style, sans-serif;"><em>Eduventure Attendance</em></h3>
                    <p>Register with your personal details here ⬇️</p>
                    <button class="hidden" id="register">Sign Up</button>

                    <div><br><br>
                    <a href="../index.php">
                    <span style="float:right"><strong><button><i class='bx bx-door-open' style="font-family:Times New Roman; font-size:15px"> GoTo-WelcomePage </i></button></strong></span>
                    </a>
                    </div>
                </div>
           
            </div>
        </div>
    </div>
    

    <!--     
    <script src="../js/register_view.js"></script>
    -->
    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });

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

        function validateRegistration() {
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const email = document.getElementById('email2').value;
            const phone = document.getElementById('phone').value;
            const password = document.getElementById('pswd').value;
            const confirmPassword = document.getElementById('pswd-repeat').value;
            const genderMale = document.getElementById('male').checked;
            const genderFemale = document.getElementById('female').checked;
            const dob = document.getElementById('dob').value;

            const nameRegex = /^[a-zA-Z\s]*$/;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phoneRegex = /^\d{10}$/;
            const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[^\s]{8,}$/;
            const dobRegex = /^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/;

            if (!nameRegex.test(firstName) || !nameRegex.test(lastName)) {
                alert('Please enter a valid name');
                return false;
            }

            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address');
                return false;
            }

            if (!phoneRegex.test(phone)) {
                alert('Please enter a valid 10-digit phone number');
                return false;
            }

            if (!passwordRegex.test(password)) {
                alert('Please enter a valid password. Hint: The password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, and one number.');
                return false;
            }

            if (password !== confirmPassword) {
                alert('Passwords do not match');
                return false;
            }

            if (!genderMale && !genderFemale) { 
                alert('Please select your Gender');
                return false;
            }

            if (!dobRegex.test(dob)) {
                alert('Please enter a valid date of birth');
                return false;
            }

            const dobDate = new Date(dob);
            const currentDate = new Date();
            if (dobDate >= currentDate) {
                alert('Date of birth should be in the past');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
