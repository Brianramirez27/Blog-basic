
<?php  

if(isset($_POST)){
    /* se inicia la conecion ala base de datos si hay post*/
    require_once("../includes/conexion.php");

    /* se recojen los datos que estan llegando del post y se guardan en variables */
    $email = $_POST['email'];
    $password = $_POST['password'];
    /* se ase la consulta para verificar que el imail este en la based e datos o verificar las credenciales */
    $consulta="SELECT * FROM usuarios WHERE email ='$email'";
    $very_usuario =  mysqli_query($db,$consulta);
    /*se crea un objecto para poder  entrar a un if si el imail  es igual a imeil ingresado  si no no se entra */
    $datos_usuario = mysqli_fetch_assoc($very_usuario);
    /* si el imail  es el mismo entramos   al condiconal */
    if( $datos_usuario["email"]== $email ){
        /* verificamos que la contrasena sea la misma */
        $very_password = password_verify($password,$datos_usuario["pasword"]);
        /* si la contrasena es la misma  entramos ala condicion*/
        if($very_password){
            /* se crea una secion para mostrar el nombre y apellido  despues de comprovar credenciales */
            $_SESSION["login_usuario"] = $datos_usuario["nombre"] ." ".$datos_usuario["apellido"]; 
        /* si  la contrasena no es la misma se crea una  secion y  muestra un error  */    
        }else{
            $_SESSION["login_incorrecto"] = "error contraseña incorrecta";
            
        }
    /* si el correo no es el mismo mostarmos un error con una secion*/    
    }else{
        
        $_SESSION["error_usuario"] = "correo incorrecto o no registrado";
    }
    
}
/* re direcionamos todas las secionaes al index  */
header("location: ../index.php");
?>