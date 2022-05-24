<link rel="stylesheet"  href="/blog-php/css/crear_publications.css">
<?php require_once ("/wamp64/www/blog-php/includes/header.php");?> 
<?php require_once '/wamp64/www/blog-php/funciones/funciones.php';?>
<?php require_once '/wamp64/www/blog-php/back-end/conexion.php';?>
<!--se asen los includes de  las mismas rutas que el indixe por que solo queremos canbiar el contenido del container-->

<!-- ASIDE O BARRA LATERAL INCIO -->
<?php require_once '/wamp64/www/blog-php/includes/lateral.php'; ?>
<!--ASIDE O BARRA LATERAL FINAL--->

<!-- inicio ,se trae el div principal para agregarle otro contenido diferente--->            
<div id="principal">
    <h1>Crear Publicacion<h1> 
    <!-- inicio ,se agregan las seciones de  error de publicado  de php-->
    <?php echo  isset($_SESSION["error_publicado"])?"<div class='alerta_error error_publications '>".$_SESSION["error_publicado"]."</div>" :"";?>
    <!-- fin de ,se agregan las seciones de  publicado y error de publicado  de php-->

    <!--INICIO de la estrutura que llevara el formulario de la publicacion-->
    <form id="publications" action="/blog-php/back-end/guardar_publications.php" method="POST">
        <!-- INICIO de ,se agrega el titulo con su secion de php que muestra el error -->
        <label class="label_crear_publications" for="titulo">Titulo</label>
        <input class="input_crear_publications" type="text" name="titulo"/>
        <?php echo  isset($_SESSION["error"]["titulo"])?"<div class='alerta_error error_publications'>".$_SESSION["error"]["titulo"]."</div>" :"";?>                 
        
        <!-- FIN de ,se agrega el titulo con su secion de php que muestra el error -->

        <!--INICIO de , se agrega descricion  con su error de php-->
        <label class="label_crear_publications" for="descricion">Descricion</label>
        <?php echo isset($_SESSION["error"]["descricion"])?"<div class ='alerta_error error_publications'>".$_SESSION["error"]["descricion"]."</div>" :"";?><br>
        <textarea  class="descritions"type="text" name="descricion"></textarea>
        <!--FIN de , se agrega descricion  con su error de php-->
        
        
        <!--INICIO de ,SE AGREGA SECION CON LAS OPCIONES DE CATEGORIA -->
        <label class="label_crear_publications" for="categorias">Categorias</label>
        <select  class="categorias" name="categorias" >    
            <option >HERO</option>
            <option>YAMAHA</option>
            <option>HONDA</option>
            <option>KTM</option>
            <option>SUZUKY</option>
            <option>PULSAR</option>
        </select>
        <!--INICIO de ,SE AGREGA SECION CON LAS OPCIONES DE CATEGORIA -->
        <!-- BOTON DE ENVIAR EL FORMULARIO-->
        
        <input  class="buttom_crear_publications"input="input_crear_publications" type="submit" name="guardar" value="GUARDAR">
    </form>
    <!--FINde, de la estrutura que llevara el formulario de la publicacion-->
</div> 
<!-- FIN de ,se trae el div principal para agregarle otro contenido diferente--->  
<!-- se cierran las secciones  de los errores o publicaciones despues de actualizar la pagina-->
<?php  unset($_SESSION["error"]);?>
<?php  unset($_SESSION["publicado"]);?>
<?php  unset($_SESSION["error_publicado"]);?>
<!--CONTENIDO PRINCIPAL FINAL;--->

<!--PIE DE PAGINA INICIO--->
<?php require_once('../includes/footter.php');?>
<!--PIE DE PAGINA  FINAL--->


