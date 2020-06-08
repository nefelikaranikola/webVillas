<?php

//delete record from session
session_start();
unset($_SESSION["user_id"]);
header("Location:login.php");

?>
