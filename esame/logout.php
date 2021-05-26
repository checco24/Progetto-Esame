<?php
session_start();
unset($_SESSION["pwd"]);
unset($_SESSION["email"]);
unset($_SESSION["adm"]);
unset($_SESSION["id"]);
session_destroy();
header('Location:http://localhost/esame/index.php');

?>
