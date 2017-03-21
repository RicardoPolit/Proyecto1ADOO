<?php
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 17/03/17
 * Time: 4:06 PM
 */
	/*Incluye la conexion a la base de datos*/
    include_once ("connect.php");
    $query = pg_query("SELECT foto FROM Mueble");
    $row = pg_fetch_array($query);
    echo $imagen = pg_unescape_bytea($row);
    header("Content-type : image/png,image/jpeg");
    echo $imagen;
