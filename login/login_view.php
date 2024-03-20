<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Eduventure-Academy</title>
  <link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet"
  />
  <link href="../css/login_view.css" rel="stylesheet" />

</head>
<body>
  <div class="container">
    <form action="">
      <h1>Login</h1>

      <div class="input-box">
        <input type="text" placeholder="username" required />
        
      </div>
      <div class="input-box">
        <input type="password" placeholder="password" required />
        
      </div>

      <div class="remember-forgot">
        <label><input type="checkbox" /> <b>Remember me</b></label>
        <a href="#">Forgot password?</a>
      </div>

      <button type="submit" class="btn login-button">Login</button>

      <div class="register-link">
        <p><strong>Don't have an account? </strong><a href="register_view.php" style="color:cyan">   Register here</a></p>
      </div>
    </form>
  </div>
</body>
</html>
