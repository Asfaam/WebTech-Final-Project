<?php 

   include("../admin/header.php"); 

?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Under Development</title>
<style>
.loader-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 10vh; 
}

.loader {
  border: 8px solid #f3f3f3; 
  border-top: 8px solid #3498db;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>
</head>
<body>
    <div class="container p-5 my-5 bg-dark text-white" style="text-align:center">	
    	<h1>This page is currently under development</h1>
    	<p>We are working hard to bring you the best experience possible. Please check back soon for updates.</p>
	<div class="loader-container">
  	    <div class="loader"></div>
	</div><br>
	<div class="col-auto">
            <a class="btn btn-info" href="home_view.php">Back</a>
        </div>

    </div>
</body>
</html>
