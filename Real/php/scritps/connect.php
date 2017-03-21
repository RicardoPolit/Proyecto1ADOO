<?php
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 16/03/17
 * Time: 4:28 PM
 */
$con = pg_connect("host=localhost port=5432 dbname=mueblesQuetzal user=postgres password=root");
if(isset($con)){
    return $con;
}
else{
    echo "<script>";
    echo "alert('No se ha podido conectar con el servidor');";
    echo "</script>";
    return null;
}