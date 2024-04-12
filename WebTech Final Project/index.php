<!DOCTYPE html>
<html lang="en">
<head>
    <title>Attendance-MS|Welcome-Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha512-MgCqF+/fvFJ2b5yJQNvZ6zZ4htIK+WjT88h3JDy+/Qjtf8iJbvjhJ7KB4q5/+M3P0sx+W6QvUkLfEfEp/DyQw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

body {
    font-family: Times New Roman, sans-serif;
    text-align:center;
}

*{
    margin: 0;
    padding: 0;
}

.main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(img/wlc.jpg);
    background-position: center;
    background-size: cover;
    height: 100vh;
}

.navbar{
    width: 1200px;
    height: 75px;
    margin: auto;
}




.btn{
    width: 100px;
    height: 40px;
    background: #ff7200;
    border: 2px solid #ff7200;
    margin-top: 13px;
    color: #fff;
    font-size: 15px;
    border-bottom-right-radius: 5px;
    border-bottom-right-radius: 5px;
    transition: 0.2s ease;
    cursor: pointer;
}
.btn:hover{
    color: #000;
}

.btn:focus{
    outline: none;
}

.srch:focus{
    outline: none;
}

.content{
    width: 1200px;
    height: auto;
    margin: auto;
    color: #fff;
    position: relative;
}

.content .par{
    padding-left: 20px;
    padding-bottom: 25px;
    font-family: Arial;
    letter-spacing: 1.2px;
    line-height: 30px;
}

.content h1{
    font-family: 'Times New Roman';
    font-size: 50px;
    padding-left: 20px;
    margin-top: 9%;
    letter-spacing: 2px;
}

.content .cn{
    width: 160px;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-bottom: 10px;
    margin-left: 20px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    transition: .4s ease;
    
}

.content .cn a{
    text-decoration: none;
    color: white;
    transition: .3s ease;
}

.cn:hover{
    background-color: #FF6347;
}

.content span{
    color: #ff7200;
    font-size: 65px
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px;
}

header h1 {
    font-size: 2em;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

p {
 color:cyan;
}

.timeh1{
   text-shadow: 1px 1px 4px rgba(0, 0, 0, 1);
  color: #000;
 
}
    </style>
    
</head>
<body>
    <header>
        <h1 style="color:#ffcc00">WELCOME TO <h2 style="color:#ffcc00; font-family: Goudy Old Style, sans-serif;"><em>EDUVENTURE ATTENDANCE MANAGEMENT</em></h2></h1>
      
    </header>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"></h2>
            </div>
        </div> 
        <div class="content">
            <h1>Student Attendance Log To<br><span>Empower Faculty</span></h1><br>

                <button class="cn" style="font-family: Times New Roman, sans-serif"><a href="Login/register_view.php">LOGIN</a></button>
	        <button class="cn" style="font-family: Times New Roman, sans-serif"><a href="Login/register_view.php">SIGNUP</a></button>
        </div><br>

	<div style="background-color: black; color:beige; font-family: Goudy Old Style, sans-serif; font-size:25px; margin: 0 auto; padding: 0; max-width:500px; align-items:center;"> 
            <span id="tick2" class="timeh1" style="background-color: black; color:cyan; font-family: Goudy Old Style, sans-serif; font-size:25px;">
            </span>  
	    &nbsp;&nbsp;
            <?php
                $date = new DateTime();
                echo $date->format('l jS F, Y'); 
            ?>
                         
       </div>
    </div>
    <footer>
        <p>&copy; 2024 Eduventure Attendance. All rights reserved.</p>
    </footer>
<script>
// <!--/. tells about the time  -->
function show2(){
if (!document.all&&!document.getElementById)
return
thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var dn="PM"
if (hours<12)
dn="AM"
if (hours>12)
hours=hours-12
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
var ctime=hours+":"+minutes+":"+seconds+" "+dn
thelement.innerHTML=ctime
setTimeout("show2()",1000)
}
window.onload=show2
//-->

</script>  

    
</body>
</html>