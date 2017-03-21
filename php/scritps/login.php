<?php
/*Incluye la conexion a la base de datos*/
include_once ("connect.php");
/*$ Usuario es lo que el cliente ingreso en la caja de texto*/
$usuario = $_POST['usuario'];



/*Obtenemos el usuario*/
    $query = "SELECT Cliente.nombre,Cliente.pwd,Cliente.rfc FROM Cliente,personaFisica WHERE ('$usuario'=Cliente.rfc OR '$usuario'=personaFisica.email );";
    $res = pg_query($query)or die(pg_last_error());

    $arreglo = pg_fetch_array($res);
        if(empty($arreglo)){
            /*Mensaje de error*/
            echo '<script>
                 alert("Usuario incorrecto.");
                 window.location.assign("../pags/logeo.php");
            </script>';

        }
        else{
            /*Procedemos a verificar la Contraseña*/
            $pwdDB = $arreglo[1];
            $pwdUser = $_POST['pwd'];
            if(password_verify($pwdUser,$pwdDB)){
                session_start();
                $_SESSION['rfc'] = $arreglo[2];
                $_SESSION['user'] = $arreglo[0];
                $_SESSION['pwd'] = $arreglo[1];
                echo '<script>
                     window.location.assign("../pags/cuenta.php");
                    </script>';
            }
            else{
                echo '<script>
                 alert("Contraseña incorrecta.");
                 window.location.assign("../pags/logeo.php");
            </script>';
            }

        }