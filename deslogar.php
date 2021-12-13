<?php
session_start();
 
$_SESSION['logado'] = false;
session_unset();
 
echo"<script language='javascript' type='text/javascript'> window.location.href='index.php'</script>";
?>