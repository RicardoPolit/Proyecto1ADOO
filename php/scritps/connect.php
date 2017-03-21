<?php
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 16/03/17
 * Time: 4:28 PM
 */
/*Realiza la conexion a la base de datos*/
$con = pg_connect("host=localhost port=5432 dbname=mueblesquetzal user=postgres password=root");
if(!empty($con)){
    return $con;
    /*Si no existe un error devuelve la conexion*/
}
else{
	/*Si existe un error devuelve nulo y una alerta*/
    echo '<script>
                 alert("No hay conexion con el servidor.");
                 window.location.assign("../pags/logeo.php");
            </script>';
    return null;
}