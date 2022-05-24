
<?php require_once "/wamp64/www/blog-php/back-end/conexion.php";?>
<?php require_once "/wamp64/www/blog-php/includes/header.php"; ?> <!--  header y body y html-->
<?php require_once "/wamp64/www/blog-php/funciones/funciones.php";?>

            <!--ASIDE O BARRA LATERAL INCIO--->
            <?php require_once 'includes/lateral.php'; ?>
            <!--ASIDE O BARRA LATERAL FINAL--->

            <!--CONTENIDO PRINCIPAL INICIO--->            
            <div id="principal">
                <h1>Ultimas entradas<h1>
                <!-- se  guardan en una variable la funcion que  ase la consulta de las ultimas entradas-->
                <?php   $entradas= ultimas_entradas($db)?>
                <!--INICIO se ase un bluce para que por cada entrada imprima lo que pedimos ed informacion -->
                <?php while($entrada = mysqli_fetch_assoc($entradas)):?>
                        <article class="entradas" > 
                            <h2><?php  echo $entrada["TITULO"];?><h2>
                            <P>Publicado por <?php echo $entrada["NOMBRE_USUARIO"]."<br>".$entrada["FECHA"]."<br> ".$entrada["CATEGORIA"]?></P><br>
                            <p>
                                <?php echo substr($entrada["DESCRICION"],0,350). "..." ;?>
                            </p>
                        </article>
                        <?php endwhile ;?>
                <!-- FIN bucle while  --> 

                <!--se agrega un if para que el boton solo se muestre si hay login-->
                <?php if(isset($_SESSION["login_usuario"])) :?>
                    <div id="td_entradas">
                    <a href="/blog-php/includes/td_entradas">
                        Todas las entradas
                    </a>
                    </div>  
                <?php endif;  ?>
            </div> 
            <!--CONTENIDO PRINCIPAL FINAL;--->

           

        <!--PIE DE PAGINA INICIO--->
        <?php require_once('includes/footter.php');?>
        <!--PIE DE PAGINA  FINAL--->
        

    </body>
</html>


