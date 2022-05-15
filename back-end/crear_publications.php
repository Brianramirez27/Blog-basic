
<link rel="stylesheet"  href="../css/index.css">
<link rel="stylesheet"  href="../css/crear_publications.css">
<?php require_once '../includes/header.php'; ?> 
<?php require_once '../funciones/funciones.php';?>
<?php session_start(); ?>
<!--se asen los includes de  las mismas rutas que el indixe por que solo queremos canbiar el contenido del container-->

            <!-- LATERAL INICIOno se ase el include de la barra lateral por que las rutas de los botones cambian por eso se trae el codigo--->
            <aside id="lateral">
                <?php   if(isset($_SESSION["login_usuario"])):?>
                        <div class="bienvenido">
                            <h3>Bienvenido <?php echo $_SESSION["login_usuario"]; ?></h3>
                            <a  class="bienvenido_button red" href="cerrar_session.php" >cerrar sesion </a>
                            <a  class="bienvenido_button verde "href="../back-end/crear_publications.php"> crear publications</a>
                            <a  class="bienvenido_button violet"href="">categoria</a>
                            <a  class="bienvenido_button pick"href="">mis datos</a>
                        </div>    
                <?php  endif;?> 
            </aside>    
            <!--ASIDE O BARRA LATERAL FINAL--->

            <!-- inicio ,se trae el div principal para agregarle otro contenido diferente--->            
            <div id="principal">
                <h1>Crear Publicacion<h1> 
                <!-- inicio ,se agregan las seciones de  publicado y error de publicado  de php-->
                <?php echo  isset($_SESSION["publicado"])?"<div class='registro_completo'>".$_SESSION["publicado"]."</div>" :"";?>
                <?php echo  isset($_SESSION["error_publicado"])?"<div class='alerta'>".$_SESSION["error_publicado"]."</div>" :"";?>
                <!-- fin de ,se agregan las seciones de  publicado y error de publicado  de php-->

                <!--INICIO de la estrutura que llevara el formulario de la publicacion-->
                <form id="publications" action="guardar_entradas.php" method="POST">
                    <!-- INICIO de ,se agrega el titulo con su secion de php que muestra el error -->
                    <LAbel for="titulo">Titulo</LAbel>
                    <?php echo  isset($_SESSION["error"]["titulo"])?"<div class='alerta'>".$_SESSION["error"]["titulo"]."</div>" :"";?>                 
                    <input class="titulo" type="text" name="titulo">
                    <!-- FIN de ,se agrega el titulo con su secion de php que muestra el error -->

                    <!--INICIO de , se agrega descricion  con su error de php-->
                    <LAbel for="descricion">Descricion</LAbel>
                    <?php echo isset($_SESSION["error"]["descricion"])?"<div class='alerta'>".$_SESSION["error"]["descricion"]."</div>" :"";?><br>
                    <textarea type="text" name="descricion"></textarea>
                    <!--FIN de , se agrega descricion  con su error de php-->
                    
                    
                    <!--INICIO de ,SE AGREGA SECION CON LAS OPCIONES DE CATEGORIA -->
                    <LAbel for="categorias">Categorias</LAbel>
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
                    <label for="guardar"></label>
                    <input id="buttom_guardar" type="submit" name="guardar" value="GUARDAR">
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
        

