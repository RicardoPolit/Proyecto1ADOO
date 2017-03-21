<!Doctype html>
<html>
    <head>
        <title>Registro</title>
            <link rel="stylesheet" type="text/css" href="../../css/logeo.css"/>
            <link rel="stylesheet" type="text/css" href="../../css/index.css"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <body class="cuerpoL">
        <div class="header">
            <div class="content">
                <?php include("../scritps/header.php")?>
            </div>
        </div>
        <div class="containerL">
            <div class="form">
                <h1>Log In</h1>
                <form action="../scritps/login.php" method="post">
                    <label id="at">RFC o Correo:</label>
                    <input id="te" type="text" name="usuario" placeholder="Tu Usuario" required/><br><br><br><br><br>
                    <label id="at">Contraseña</label>
                    <input id="te"type="password" name="pwd" placeholder="Contraseña" required/><br><br><br>
                    <input type="submit" value="Log In" style="float:right">
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