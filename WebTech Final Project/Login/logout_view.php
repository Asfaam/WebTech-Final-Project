<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['role_id']);
session_destroy();
header("Location: register_view.php");
exit();
?>
