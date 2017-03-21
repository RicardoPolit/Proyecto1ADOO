
<!Doctype html>
<html>
    <header>
        <?php echo "<title>Cuenta de".$_SESSION['user']."</title>"?>
        <title>Cuenta de</title>
        <link rel="stylesheet" type="text/css" href="../../css/index.css">
        <link rel="stylesheet" type="text/css" href="../../css/cuenta.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="../scritps/datos.js"></script>

    </header>
    <body class="cuerpoC">
        <div class="header">
            <div class="content">
                <?php include_once("../scritps/header.php")?>
            </div>
        </div>
        <div class="containerC">
            <div class="datos">
                <?php include("../scritps/datosCliente.php")?>
            </div>
            <div id="idF">
                <div>
                    <h1 id="tL">Agregar una nueva Tarjeta</h1>
                    <form action="../scritps/agregarTarjeta.php" id="nTarjeta" method="post">
                        <label id="nLabel">Numero de Tarjeta:</label><input id="nInput" type="text" name="num" pattern="[0-9]{16}" size="16" placeholder="1234 5678 9123 2345" required/><br><br>
                        <label id="nLabel">CVV:</label><input id="nInput" type="password" pattern="[0-9]{3}" size="3" name ="sec" required/><br><br>
                        <label id="nLabel">Fecha de expiro:</label>
                       <select name ="mes" id="mes">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select><label>/</label>
                        <select name ="anio" id="anio">
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select><br><br><br>
                        <label id="nLabel">Tipo</label>
                        <select name="tipo" id="tipo">
                            <option value="C">Crèdito</option>
                            <option value="D">Debito</option>
                        </select>
                        <input type="submit" value="Agregar">
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
