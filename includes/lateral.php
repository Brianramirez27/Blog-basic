

    <!--ASIDE O BARRA LATERAL INCIO--->
            <aside id="lateral">
                <div id="login" class="block" >
                    <h3>IDENTIFICATE</h3>
                    <?php   if(isset($_SESSION["secion_abierta"])){
                                echo $_SESSION["secion_abierta"];
                            }elseif(isset ($_SESSION["secion_error"])){
                                echo $_SESSION["secion_error"];
                                
                            }
                    ?>
                    <form action = "back-end/login.php" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email"/>

                        <label for="pasword">Password</label>
                        <input type="password" name="password"/>
                        
                        <input type="submit"  value="Entrar" >    
                    </form>
                </div>
                <div id="register" class="block" >    
                    <h3>REGISTRATE</h3>
                    <!--se agrega la sesion en este punto para que muestre el completo del registro o el fallo INICIO--->
                    <?php   if(isset($_SESSION["registro_completo"])){
                                echo  "<div class='registro_completo'>".  $_SESSION["registro_completo"]."</div>";

                            }elseif (isset($_SESSION["error"]["registro_fallo"])) {
                                echo "<div class='registro_fallo'>" . $_SESSION["error"]["registro_fallo"]."</div>";  
                            }    
                    ?><!-- FINAL DE LA SECION SE QUESTRA EL COMPLETADO O FINAL--->

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
                    
                </div>
            </aside>
            <!--ASIDE O BARRA LATERAL INCIO--->