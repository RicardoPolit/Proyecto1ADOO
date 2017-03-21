<!Doctype html>
<html>
    <head>
        <title>Registro</title>
        <link rel="stylesheet" type="text/css" href="../../css/registrar.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/index.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="../scritps/selector.js"></script>
    </head>
    <body class="cuerpoR">
        <div class="header">
            <div class="content">
                <?php include("../scritps/header.php")?>
            </div>
        </div>
        <div class="containerR">
            <div class="formulario">
                <form action="" method="post">
                    <select  id="tipoCliente" name="tipoCliente" onchange="mostrar(this.value)">
                    <option value="personaFisica" selected>Persona Fisica</option>
                        <option value="personaMoral">Persona Moral</option>
                    </select><br><br></form>

                    <!--Formulario persona Fisica-->
                    <div id="personaFisica" style="display:block">
                            <form id="fpF" action="../scritps/registrapF.php" method="post">


                                <label id="atributos">Nombre(s):</label>
                                <input id="t" type="text" placeholder="Brenda Elena" name="nombres" required/><br>

                                <label id="atributos">Apellido(s):</label>
                                <input id="t" type="text" placeholder="Garcia Diaz" name="apellidos" required/><br>


                                <label id="atributos">RFC</label>
                                <input id="t" type="text" placeholder="XXX0XXX0X00XX" name="rfc" required/><br>

                                <label id="atributos">Telefono</label>
                                <input id="t" type="text" placeholder="5577531553" name="tel" required/><br>


                                <label id="atributos">Correo:</label>
                                <input id="t" type="email" placeholder="tucorreo@aqui.com" name="email" size="6" required/><br>

                                <label id="atributos">Password</label>
                                <input id="t" type="password" placeholder="Debe tener al menos 6 digitos" name="pwd"/><br>

                                <h2 id="titulo">Domicilio</h2><br>

                                <label id="atributos">Ciudad:</label>
                                <input id="t" type="text" name="ciudad" placeholder="Ciudad de Mèxico" required/><br>

                                <label id="atributos">Calle</label>
                                <input id="t" type="text" name="calle" placeholder="San Juan de Aragòn" required/><br>

                                <label id="atributos">CP:</label>
                                <input id="t" type="text" name="cp" placeholder="55280" required/><br>
                                <label id="alert">Si tu domicilio de entregas es diferente del fiscal aprieta el check</label>
                                <input id="check"  type="checkbox" name="dDdF" onchange="showContent();" checked><br>

                                <div id="domFiscalPF"  style="display:none;">
                                    <h2 id="titulo">Domicilio Fiscal</h2><br>

                                    <label id="atributos">Ciudad:</label>
                                    <input id="t" type="text" name="ciudadF" placeholder="Ciudad de Mèxico"/><br>

                                    <label id="atributos">Calle</label>
                                    <input id="t" type="text" name="calleF" placeholder="San Juan de Aragòn"/><br>

                                    <label id="atributos">CP:</label>
                                    <input id="t" type="text" name="cpF" placeholder="55280"/><br><br>
                                </div>
                                <label id="alert" style="float: right">Deseas recibir notificaciones?</label>
                                <input type="checkbox" name="notif" id="notif" style="float: right"/>
                                <input type="submit"   value="Registrarse" style="float: right">

                            </form>

                    </div>

                    <!--Persona Moral-->
                    <div id="personaMoral" style="display: none;">
                        <form id="fpM"  action="../scritps/registrarPM.php" method="post">
                            <label id="atributos">Empresa:</label>
                            <input id="t" type="text" placeholder="Hewlett Packard" name="nombreC" required/><br>

                            <label id="atributos" style="font-size: x-small">Razòn Social:</label>
                            <input id="t" type="text" placeholder="Hewlett Packard Mexico S.A. de C.V." name="rS" required/><br>

                            <label id="atributos">RFC</label>
                            <input id="t" type="text" placeholder="XXX0XXX0X00XX" name="rfcE" required/><br>

                            <label id="atributos">Telefono</label>
                            <input id="t" type="text" placeholder="5577531553" name="telGral" required/><br>

                            <label id="atributos">Password</label>
                            <input id="t" type="password" placeholder="Debe tener al menos 6 digitos" name="pwd"/><br>

                            <h2 id="titulo">Domicilio</h2><br>

                            <label id="atributos">Ciudad:</label>
                            <input id="t" type="text" name="ciudadE" placeholder="Ciudad de Mèxico" required/><br>

                            <label id="atributos">Calle</label>
                            <input id="t" type="text" name="calleE" placeholder="San Juan de Aragòn" required/><br>

                            <label id="atributos">CP:</label>
                            <input id="t" type="text" name="cpE" placeholder="55280" required/><br>
                            <lable id="alertM">Si tu domicilio de entregas es diferente del fiscal aprieta el check</lable>
                            <input type="checkbox" name="dDdM" id="checkM" onchange="showContentM();" checked><br>

                            <div id="domFiscalPM" style="display: none;">
                                <h2 id="tituloF">Domicilio Fiscal</h2><br>

                                <label id="atributos">Ciudad:</label>
                                <input id="t" type="text" name="ciudadFE" placeholder="Ciudad de Mèxico" /><br>

                                <label id="atributos">Calle</label>
                                <input id="t" type="text" name="calleFE" placeholder="San Juan de Aragòn" /><br>

                                <label id="atributos">CP:</label>
                                <input id="t" type="text" name="cpFE" placeholder="55280"/><br><br>
                            </div>
                            <label id="alertM" style="float: right">Deseas recibir notificaciones?</label>
                            <input type="checkbox" name="notif" id="notifM" style="float: right"/>

                            <input type="submit" value="Registrarse" style="float: right"/>
                        </form>
                    </div>
                </form>
            </div>
        </div>
        <div class="footer">
            <div class="pieC">
                <?php include("../scritps/footer.php")?>
            </div>
        </div>
    </body>
</html>