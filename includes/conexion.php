<?php 

$db=mysqli_connect('localhost','root','','blog_usuarios');

if ($db ==True){
    echo'conexion exitoso';
}else{
    echo'conecion fallada';
}
session_start(); 
?>