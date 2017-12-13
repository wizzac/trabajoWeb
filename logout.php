<?php
session_start();


session_destroy();
setcookie('usuarioId',1,1);
setcookie('rol',1,1);
setcookie('logged',0,1);



header("Location: index.php");

?>