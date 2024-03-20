<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage | Eduventure-Academy</title>
    <style>
	body {
            margin: 0;
            padding: 0;
            background-color:  slategray;
            background: url(./img/welcomePage.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }

        .container {
            font-family: 'Times New Roman', Times, serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 50px;
            background-color: beige;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            font-family: Times New Roman;
            font-size: 36px;
            margin-bottom: 20px;
            text-align: center;
            color: #000;
        }

        p {
            font-family: Goudy Old Style;
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 40px;
            text-align: center;
            color: red;
            
        }

        #l-r-button {
            float: right;
            display: inline-block;
            background-color: blue;
            color: #fff;
            text-decoration: none;
            padding: 5px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        #l-r-button:hover {
            color: darkgrey;
            background-color: steelblue;
        }

        i {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="./login/register_view.php" id="l-r-button"><b>Login|Signup</b></a>
        <h3>Welcome to <i>Eduventure Academy</i></h3>
        <p>Unlock your potential with smart learning and seamless practice</p>
        <p><strong>Start your journey today!</strong></p>
        
    </div>
</body>
    
</html>