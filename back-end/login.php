
<?php  

if(isset($_POST)){
    /* se inicia la conecion ala base de datos si hay post*/
    require_once("../includes/conexion.php");

    /* se recojen los datos que estan llegando del post y se guardan en variables */
    $email = $_POST['email'];
    $password = $_POST['password'];
    /* se ase la consulta para verificar que el imail este en la based e datos o verificar las credenciales */
    $pedir="SELECT * FROM usuarios WHERE email='$email'";
    $login = mysqli_query($db,$pedir);
    /* si la colsutal es  positaiva entramo al condiconal */
    if($login ==TRUE){
        /* mostramos los datos de la colsulta del usuario */
        $usuario =mysqli_fetch_assoc($login);
        /* verificamos que la contrasena sea la misma */
        $very_password = password_verify($password,$usuario["pasword"]);
        /* si la contrasena es la misma  entramos ala condicion*/
        if($very_password){
            /* se crea una secion para mostrar el nombre y apellido  despues de comprovar credenciales */
            $_SESSION["login_correcto"] = $usuario["nombre"] ." ".$usuario["apellido"]; 
        /* si  la contrasena no es la misma se crea una  secion y  muestra un error  */    
        }else{
            $_SESSION["login_incorrecto"] = "error contraseña incorrecta";
            unset( $_SESSION["login_incorecto"]);
        }
    }else{
        $_SESSION["error_login_general"] = "error debes registrarte";
        unset( $_SESSION["secion_abierta"]);
    }
header("location: ../index.php");
}
?>