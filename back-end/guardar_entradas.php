<?php      
/* se comprueba si esta llegando algun dato de regitro o del post */
if(isset($_POST)){
    /**se ase la conecion ala base de datos si esxiste pos*/
     require_once '../includes/conexion.php';
    /*se recogen los datosdel formulario de registro  en variables   */
    $titulo = $_POST["titulo"];
    $descricion = $_POST["descricion"];
    $categoria = $_POST["categorias"];

     /* se validan los datos  primero para guardar los despues en la bases de datos */

    /* array de errores de validacion*/
    $error = array();
    /* se valida  que el titulo no este vacio*/
    if(!empty($titulo)){
        $titulo_validate = true;
    }else{ 
        $titulo_validate = false;
        $error["titulo"] = "Titulo vacio"; 
    }

/* se valida  que la descricion no este vacia*/
    if(!empty($descricion)){
        $descricion_validate = true;
    }else{ 
        $descricion_validate = false;
        $error["descricion"] = "Descricion vacia"; 
    }
    

    /*se comprueba que no balla a ver ningun error en el registro antes de guardar en la base de dato*/
        
    if(count($error)==0){
        /**despues de comprobar que no halla errores se guar el nombre del usuario en una variable */
        $nombre_login = $_SESSION["login_usuario"];
        /**se agregan los datos ala base de datos  con sus datos correspondientes */
        $add_publications="INSERT INTO publications VALUES(NULL,'$nombre_login','$titulo','$descricion','$categoria',CURRENT_TIMESTAMP)";
        $guardar_publications=mysqli_query($db,$add_publications);
        /**despues de guardar los datos se crean la seciones  de si se guardo corectamente o no */
        if($guardar_publications){
            $_SESSION["publicado"]="su publicacion se a realizado con exito";

            
        }else{
            $_SESSION["error_publicado"]="error al publicar";
        }

        /*errores de  campos vacion o general * */
    }else{
        $_SESSION["error"]= $error ;
    }
    /**se redirecionan  las secipoones a  su lugar */
    header("location:../back-end/crear_publications");
}

?>