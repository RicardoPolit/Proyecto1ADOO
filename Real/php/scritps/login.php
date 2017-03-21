<?php
session_start();


include_once ("connect.php");

$usuario = $_POST['usuario'];



/*Obtenemos el usuario*/
    $query ="SELECT Cliente.rfc,nombre,pwd FROM Cliente,personaFisica WHERE (Cliente.rfc='$usuario' OR correo='$usuario');";
    $result = pg_query($query)or die(pg_last_error());

    $row = pg_fetch_array($result);
    if(!$row[0] || !$row[1]){
        echo '<script>
            alert("Usted no se ha registrado!");
            window.location.assign("../pags/registrar.php");
            </script>';

    }
    else {

        /*Codigo proporcionado por PHP Manual y https://www.youtube.com/watch?v=ZHg-h7bZhbo*/

        /*Obtenemos la contraseña de la consulta*/
        $pwdDB = $row[2];
        /*Obtenemos la contraseña ingresada por formulario*/
        $pwdUser = $_POST['pwd'];

        /*Aplicamos la funcion verificar*/
        $verificar= password_verify($pwdUser,$pwdDB);
        if($verificar){
            $_SESSION['user'] = $row[1];
            $_SESSION['pwd'] = $pwdDB;
            echo '<script>
                 window.location.assign("../pags/index.php");
            </script>';
        }
        else
            session_destroy();
    }