<?php
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 20/03/17
 * Time: 2:30 AM
 */
/*Inicia sesion*/
session_start();
$usuario = $_SESSION['user'];
$rfc = $_SESSION['rfc'];
/*
* $usuario = el nombre del usuario
* $rfc = el rfc del usuario
*/
include("../scritps/connect.php");
/*Incluye el script de conexion*/

/*Realiza la consulta para borrar las tarjetas*/
$con = "DELETE FROM Tarjeta WHERE '$rfc' = rfc";
$res = pg_query($con) or die (pg_last_error());

/*Cuando se realiza se borran todos los registros de tarjetas y redirecciona a la cuenta del usuario*/
echo '<script>
      window.location.assign("../pags/cuenta.php");
      </script>';