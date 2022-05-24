<link rel="stylesheet"  href="/blog-php/css/td_entradas.css">
<?php require_once "/wamp64/www/blog-php/back-end/conexion.php";?>
<?php require_once "/wamp64/www/blog-php/includes/header.php"; ?> <!--  header y body y html-->
<?php require_once "/wamp64/www/blog-php/funciones/funciones.php";?>

            <!--ASIDE O BARRA LATERAL INCIO--->
            <?php require_once "/wamp64/www/blog-php/includes/lateral.php"; ?>
            <!--ASIDE O BARRA LATERAL FINAL--->

            <!--CONTENIDO PRINCIPAL INICIO td entradas--->            
            <div id="principal_td_entradas">
                <h1>Todas Las Entradas<h1>
                <!-- se  guardan en una variable la funcion que  ase la consulta todas las entradas-->
                <?php   $entradas= td_entradas($db)?>
                <!--INICIO se ase un bluce para que por cada entrada imprima lo que pedimos de informacion -->
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
            </div> 
            <!--CONTENIDO PRINCIPAL FINAL td entradas;--->

           

        <!--PIE DE PAGINA INICIO--->
        <?php require_once("/wamp64/www/blog-php/includes/footter.php");?>
        <!--PIE DE PAGINA  FINAL--->
        

    </body>
</html>