

    <!--ASIDE O BARRA LATERAL INCIO--->
            <aside id="lateral">
                <!-- inicio PHP se  comprueba si hay un login corecto  pra mostar la secion de login-->
                
                <?php   if(isset($_SESSION["login_usuario"])):?>
                        <div class="bienvenido">
                            <h3>Bienvenido <?php echo $_SESSION["login_usuario"]["nombre"] ." ".$_SESSION["login_usuario"]["apellido"]; ?></h3>

                            <a  class="bienvenido_button red" href="/blog-php/back-end/cerrar_session.php" >cerrar sesion </a>
                            <a  class="bienvenido_button verde "href=" /blog-php/includes/crear_publications.php"> crear publications</a>
                            <a  class="bienvenido_button violet"href="">categoria</a>
                            <a  class="bienvenido_button pick"href="/blog-php/includes/mis_datos.php">mis datos</a>
                        </div>    
                <?php  endif;?> 
                <!--se crea una condicon para que cuando no haya login muestre el registrase y ingresar cieera al final -->
                <?php if(!isset($_SESSION["login_usuario"])):?>
                    <!-- FIN PHP del login correcto  -->
                    <div id="login" class="block" >
                        <h3>Ingresar</h3>
                        <!-- INICIO PHP si comprueba si hay una secion con  al gun error para mostrarla -->
                        <?php if(isset($_SESSION["login_incorrecto"])):?>
                                <div class="alerta_error"><?php echo $_SESSION["login_incorrecto"];?></div>
                        <?php elseif(isset($_SESSION["error_usuario"])):?>
                                <div class="alerta_error"><?php echo $_SESSION["error_usuario"];?></div>
                        <?php endif ?>
                        <!-- FIN PHP DE  errores -->

                        <form action = "back-end/login.php" method="POST">
                            <label  class="label_index"  for="email">Email</label>
                            <input class="input_index" type="email" name="email"/>

                            <label  class="label_index"  for="pasword">Password</label>
                            <input  class="input_index" type="password" name="password"/>
                            
                            <input class="buttom_index" type="submit"  value="Entrar" >    
                        </form>
                    </div>
                    <div id="register" class="block" >    
                        <h3>Registrarse</h3>
                        <!--INICIO PHP se agrega la sesion en este punto para que muestre el completo del registro o el fallo --->
                        <?php   if(isset($_SESSION["registro_completo"])){
                                    echo  "<div class='alerta_completado'>".  $_SESSION["registro_completo"]."</div>";

                                }elseif (isset($_SESSION["error"]["registro_fallo"])) {
                                    echo "<div class='registro_fallo'>" . $_SESSION["error"]["registro_fallo"]."</div>";  
                                }    
                        ?><!-- FINAL PHP DE LA SECION SE MUESTRA EL COMPLETADO O FALLO--->

                        <form action = "back-end/register.php" method="POST">
                            <label class="label_index" for="nombre">nombre</label>
                            <input class="input_index" type="text" name="nombre"/>
                            <!--se muestra error si hay error  --->
                            <?php echo  isset($_SESSION["error"]["nombre"])?"<div class='alerta_error'>".$_SESSION["error"]["nombre"]."</div>" :"";?>                    

                            <label class="label_index" for="apellido">apellido</label>
                            <input class="input_index" type="text" name="apellido"/>
                            <!--se muestra error si hay error  --->
                            <?php echo  isset($_SESSION["error"]["apellido"])?"<div class='alerta_error'>".$_SESSION["error"]["apellido"]."</div>" :"";?>
                            
                            <label class="label_index" for="email">Email</label>
                            <input class="input_index" type="email" name="email"/>
                            <!--se muestra error si hay error  --->
                            <?php echo  isset($_SESSION["error"]["email"])?"<div class='alerta_error'>".$_SESSION["error"]["email"]."</div>" :"";?>
                            

                            <label class="label_index" for="password">password</label>
                            <input class="input_index" type="password" name="password"/>
                            <!--se muestra error si hay error  --->
                            <?php echo  isset($_SESSION["error"]["password"])?"<div class='alerta_error'>".$_SESSION["error"]["password"]."</div>" :"";?>
                            
                            <input class="buttom_index" type="submit"  value="Registro" > 
                        </form>
                        <!--se cierra la secion de errores  cuando actualizen la pagina   --->
                        <?php  unset($_SESSION["error"]);?>
                        <?php  unset($_SESSION["registro_completo"]);?>
                        
                        <?php  unset($_SESSION["login_incorrecto"]);?>
                        <?php  unset($_SESSION["error_usuario"]);?> 
                    </div>
                <?php  endif;?> 
            </aside>
            <!--ASIDE O BARRA LATERAL INCIO--->