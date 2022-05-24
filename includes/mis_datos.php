
<link rel="stylesheet"  href="/blog-php/css/mis_datos">
<?php require_once ("/wamp64/www/blog-php/includes/header.php");?> 
<?php require_once '/wamp64/www/blog-php/funciones/funciones.php';?>
<?php require_once '/wamp64/www/blog-php/back-end/conexion.php';?>
<!--se asen los includes de  las mismas rutas que el indixe por que solo queremos canbiar el contenido del container-->


<!-- ASIDE O BARRA LATERAL INCIO -->
<?php require_once '/wamp64/www/blog-php/includes/lateral.php'; ?>
<!--ASIDE O BARRA LATERAL FINAL--->



<div id="principal">
    <?php  if(isset($_SESSION["usuario_actualizado"])):?>
        <div class="alerta_completado"> <?php echo $_SESSION["usuario_actualizado"];?></div>
    <?php elseif (isset( $_SESSION["error"]["error_actualizado"])):?>
        <div class="alerta_error"> <?php echo $_SESSION["error"]["error_actualizado"];?></div>
            
    <?php endif ?>

    <h1>Mis datos</h1> 

    <form  Id="mis_datos" action = "/blog-php/back-end/actualizar_datos" method="POST">
        <label class="label_mis_datos" for="nombre">nombre</label>
        <input class="input_mis_datos" type="text" name="nombre" value="<?php echo $_SESSION["login_usuario"]["nombre"]; ?>"/>
        <?php echo  isset($_SESSION["error"]["nombre"])?"<div class='alerta_error'>".$_SESSION["error"]["nombre"]."</div>" :"";?>
        <!--se muestra error si hay error  --->
        

        <label class="label_mis_datos" for="apellido">apellido</label>
        <input class="input_mis_datos" type="text" name="apellido"value="<?php echo $_SESSION["login_usuario"]["apellido"]; ?>"/>
        <?php echo  isset($_SESSION["error"]["apellido"])?"<div class='alerta_error'>".$_SESSION["error"]["apellido"]."</div>" :"";?>
        <!--se muestra error si hay error  --->
        
        
        <label class="label_mis_datos" for="email">Email</label>
        <input class="input_mis_datos" type="email" name="email" value="<?php echo $_SESSION["login_usuario"]["email"]; ?>"/>
        <?php echo  isset($_SESSION["error"]["email"])?"<div class='alerta_error'>".$_SESSION["error"]["email"]."</div>" :"";?>
        <!--se muestra error si hay error  --->
        <input class="buttom_actualizar" type="submit"  value="Actualizar">
                            
</div>                    
<?php unset($_SESSION["error"]);?>
<?php unset( $_SESSION["usuario_actualizado"]);?>
<?php unset( $_SESSION["error"]["error_actualizado"]);?>



<!--PIE DE PAGINA INICIO--->
<?php require_once('/wamp64/www/blog-php/includes/footter.php');?>
<!--PIE DE PAGINA  FINAL--->