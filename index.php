<?php require_once 'includes/conexion.php';?>
<?php require_once 'includes/header.php'; ?> <!--  header y body y html-->
<?php require_once 'funciones/funciones.php';?>

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
            </div> 
            <!--CONTENIDO PRINCIPAL FINAL;--->

        <!--PIE DE PAGINA INICIO--->
        <?php require_once('includes/footter.php');?>
        <!--PIE DE PAGINA  FINAL--->
        

    </body>
</html>


