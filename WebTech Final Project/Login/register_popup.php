<!DOCTYPE html>
<html>
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop-Up</title>
    <link rel="stylesheet" href="../css/register_popup.css">
</head>
<body>
    <div class="container">
        <button type="submit" class="btnnn" onclick="openPopup()">Submit</button>
        <div class="popup" id="popup">
            <img src="../img/images.png">
            <h2>Thank you</h2>
            <p>Details submitted successfully!</p>
            <button type="button" onclick="closePopup()">OK</button>
        </div>
    </div>

<script>
let popup = document.getElementById("popup");

function openPopup() {
    popup.classList.add("open-popup");
}

function closePopup() {
    popup.classList.remove("open-popup");
}

</script>
</body>
</head>
</html> 