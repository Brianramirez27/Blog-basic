

    <!--ASIDE O BARRA LATERAL INCIO--->
          
            <aside id="lateral">
                <!-- inicio PHP se  comprueba si hay un login corecto  pra mostar la secion de login-->
                
                <?php   if(isset($_SESSION["login_usuario"])):?>
                        <div class="bienvenido">
                            <h3>Bienvenido <?php echo $_SESSION["login_usuario"]; ?></h3>

                            <a  class="bienvenido_button red" href="back-end/cerrar_session.php" >cerrar sesion </a>
                            <a  class="bienvenido_button verde "href=" back-end/crear_publications.php"> crear publications</a>
                            <a  class="bienvenido_button violet"href="">categoria</a>
                            <a  class="bienvenido_button pick"href="">mis datos</a>
                        </div>    
                <?php  endif;?> 
                <!--se crea una condicon para que cuando no haya login muestre el registrase y ingresar cieera al final -->
                <?php if(!isset($_SESSION["login_usuario"])):?>
                    <!-- FIN PHP del login correcto  -->
                    <div id="login" class="block" >
                        <h3>Ingresar</h3>
                        <!-- INICIO PHP si comprueba si hay una secion con  al gun error para mostrarla -->
                        <?php if(isset($_SESSION["login_incorrecto"])):?>
                                <div class="alerta"><?php echo $_SESSION["login_incorrecto"];?></div>
                        <?php elseif(isset($_SESSION["error_usuario"])):?>
                                <div class="alerta"><?php echo $_SESSION["error_usuario"];?></div>
                        <?php endif ?>
                        <!-- FIN PHP DE  errores -->

                        <form action = "back-end/login.php" method="POST">
                            <label for="email">Email</label>
                            <input type="email" name="email"/>

                            <label for="pasword">Password</label>
                            <input type="password" name="password"/>
                            
                            <input type="submit"  value="Entrar" >    
                        </form>
                    </div>
                    <div id="register" class="block" >    
                        <h3>Registrarse</h3>
                        <!--INICIO PHP se agrega la sesion en este punto para que muestre el completo del registro o el fallo --->
                        <?php   if(isset($_SESSION["registro_completo"])){
                                    echo  "<div class='registro_completo'>".  $_SESSION["registro_completo"]."</div>";

                                }elseif (isset($_SESSION["error"]["registro_fallo"])) {
                                    echo "<div class='registro_fallo'>" . $_SESSION["error"]["registro_fallo"]."</div>";  
                                }    
                        ?><!-- FINAL PHP DE LA SECION SE MUESTRA EL COMPLETADO O FALLO--->

                        <form action = "back-end/register.php" method="POST">
                            <label for="nombre">nombre</label>
                            <input type="text" name="nombre"/>
                            <!--se muestra error si hay error  --->
                            <?php echo  isset($_SESSION["error"]["nombre"])?"<div class='alerta'>".$_SESSION["error"]["nombre"]."</div>" :"";?>                    

                            <label for="apellido">apellido</label>
                            <input type="text" name="apellido"/>
                            <!--se muestra error si hay error  --->
                            <?php echo  isset($_SESSION["error"]["apellido"])?"<div class='alerta'>".$_SESSION["error"]["apellido"]."</div>" :"";?>
                            
                            <label for="email">Email</label>
                            <input type="email" name="email"/>
                            <!--se muestra error si hay error  --->
                            <?php echo  isset($_SESSION["error"]["email"])?"<div class='alerta'>".$_SESSION["error"]["email"]."</div>" :"";?>
                            

                            <label for="password">password</label>
                            <input type="password" name="password"/>
                            <!--se muestra error si hay error  --->
                            <?php echo  isset($_SESSION["error"]["password"])?"<div class='alerta'>".$_SESSION["error"]["password"]."</div>" :"";?>
                            
                            <input type="submit"  value="Registro" > 
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