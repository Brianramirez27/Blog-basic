<?php 
session_start();
    if(isset($_SESSION["login_usuario"])){
    $_SESSION["login_usuario"]=session_destroy();
    }
    header("location: ../index.php");
?>