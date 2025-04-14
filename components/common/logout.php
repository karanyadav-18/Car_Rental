<?php
session_start();
session_unset();
session_destroy();
header("Location: /Car_Rental/Car_Rental/index.php");
exit();
?>
