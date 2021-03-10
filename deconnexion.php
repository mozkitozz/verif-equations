<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["mdp"]);
unset($_SESSION["type"]);
header("location: index.php");
?>