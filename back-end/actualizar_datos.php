<?php   

/* se comprueba si esta llegando algun dato de regitro o del post */
if(isset($_POST)){
    /*se incluye la conecion la base de datos*/
    include_once("/wamp64/www/blog-php/back-end/conexion.php");
    

    /*se recogen los datosdel formulario de registro  en variables   */
    $nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
    $apellido =isset($_POST['apellido']) ? $_POST['apellido']:false;
    $email =isset($_POST['email']) ? $_POST['email']:false;

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
   
    /*se comprueba que no balla a ver ningun error en el registro antes de guardar en la base de dato*/
    
    if(count($error)==0){
        /* depues de que no halla errores haora si se guardan los datos en bd*/
        /*sacamos el  id del usuario activo para cambiar solo los datos del mismo id */
        $id=$_SESSION["login_usuario"]["id"];
        /**se crea  la colsuta para actualizar los datos nuevos por los antiguos */
        $add_usuario = " UPDATE  usuarios SET
        nombre = '$nombre',
        apellido='$apellido',
        email='$email' WHERE id='$id'"; 
        $actualizar_usurios = mysqli_query($db,$add_usuario);
            
        /* se  comprueba si el registro es corrrecto o fallo y se crea una secion para mostrarla   */
        if($actualizar_usurios){
            /**se actualizan los datos del usuario por que no cambian si no actualizamos los datos  */
            $_SESSION["login_usuario"]["nombre"]=$nombre;
            $_SESSION["login_usuario"]["apellido"]=$apellido;
            $_SESSION["login_usuario"]["email"]=$email;
            /*se crea una secion para mostrar que el usuario se cambio con exito* */
            $_SESSION["usuario_actualizado"] = "el usuario se ha actualizado con exito";
        }else{
            /*y si no se actualiza se crea una secion que  diga que no se actualizo con exito* */
            $_SESSION["error"]["error_actualizado"] =" el usuario no se actualizo";
        }


        
    }else{
        /*se crea una secion para mostrarle al usuario los los errores si hay */
        $_SESSION["error"]= $error ;
        
    }
/* se redireciona  al index para mostrar los errores o seciones  si hay*/   
header("location:/blog-php/includes/mis_datos");

}
?>

