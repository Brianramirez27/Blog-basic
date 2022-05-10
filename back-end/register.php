
<?php 
/* se comprueba si esta llegando algun dato de regitro o del post */
if(isset($_POST)){
    /*se incluye la conecion la base de datos*/
    include_once("../includes/conexion.php");
    

    /*se recogen los datosdel formulario de registro  en variables   */
    $nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
    $apellido =isset($_POST['apellido']) ? $_POST['apellido']:false;
    $email =isset($_POST['email']) ? $_POST['email']:false;
    $password =isset($_POST['password']) ? $_POST['password']:false;



    /* se validan los datos  primero para guardar los despues en la bases de datos */

    /* array de errores de validacion*/
    $error = array();
    /* se validan nombres y apellidos ya que son formato type txt*/
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validate = true;
    }else{ 
        $nombre_validate = false;
        $error["nombre"] = " nombre  incorrecto";    
    }

    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/",$apellido)){
        $apellido_validate = true;
    }else{ 
        $apellido_validate = false;
        $error["apellido"] = " apellido  incorrecto";
        
    }


    /* se validan solo el email  */
    if (!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_validate = True;
    }else{
        $email_validate = False;
        $error["email"] ="  email incorrecto";
        
    }
    /* se validan  la password  */

    if(!empty($password)){
        $password_validate = True;
    }else{
        $password_validate = False;
        $error["password"] =" password vacia";
    }


    /*se comprueba que no balla a ver ningun error en el registro antes de guardar en la base de dato*/
    
    if(count($error)==0){
        /* si no hay errores Se crifra la contrasena*/ 
        $password_segura=password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
        /* depues de que no halla errores haora si se guardan los datos en bd*/
        $add_usuario = "INSERT INTO usuarios  VALUES(NULL,'$nombre','$apellido','$email','$password_segura')"; 
        $guardar_usurios = mysqli_query($db,$add_usuario);
        
        /* se  comprueba si el registro es corrrecto o fallo y se crea una secion para mostrarla   */
        if($guardar_usurios){
            $_SESSION["registro_completo"] = "el registro se ha completado con exito";
        }else{
            $_SESSION["error"]["registro_fallo"] =" el registro  fallo";
        }


        
    }else{
        /*se crea una secion para mostrarle al usuario los los errores si hay */
        $_SESSION["error"]= $error ;
        
    }
    
}
/* se redireciona  al index para mostrar los errores o seciones  si hay*/
header("location: ../index.php");
?>
