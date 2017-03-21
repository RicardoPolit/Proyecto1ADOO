<?php
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 20/03/17
 * Time: 1:25 AM
 */
/*Se inicia la sesion*/
session_start();
$usuario = $_SESSION['user'];
$rfc = $_SESSION['rfc'];
/*
* $usuario = el nombre del usuario
* $rfc = el rfc del usuario
*/
include("../scritps/connect.php");
/*
* Incluye la conexion a la base de datos
*/

/*Si la variable eliminar en el url existe entonces elimina la tarjeta*/
if(isset($_GET['eliminar'])) {
    $con = "DELETE FROM Tarjeta WHERE '$_GET[eliminar]'= Tarjeta.num;";
    $res = pg_query($con) or die(pg_last_error());

    if(!empty($res)){
    	/*Cuando se realiza redirecciona a la cuenta del usuario*/
        echo '<script>
                 window.location.assign("../pags/cuenta.php");
            </script>';
    }


}
else
{
	/*Si no se realiza solo redirecciona a la pagina de la cuenta.*/
	echo '<script>
                 window.location.assign("../pags/cuenta.php");
            </script>';
}