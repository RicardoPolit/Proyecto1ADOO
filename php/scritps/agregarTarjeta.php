<?php
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 19/03/17
 * Time: 11:41 PM
 */
/*Iniciamos la sesion*/
session_start();
$usuario = $_SESSION['user'];
$rfc = $_SESSION['rfc'];
/*
*   $usuario = nombre de usuario
*   $rfc = el rfc del usuario
*/
include_once ("connect.php");
/*El archivo de conexion*/



    /*Variable para ingresar la fecha según el standard de POSTGRESQL*/
    $fecha = $_POST['anio']."-".$_POST['mes']."-01";

    if(substr($_POST['num'],0,1) == '4')
        $marca = 'VISA';
    else if((substr($_POST['num'],0,2) == '51')||(substr($_POST['num'],0,2) == '52')||(substr($_POST['num'],0,2) == '53')||(substr($_POST['num'],0,2) == '54')||(substr($_POST['num'],0,2) == '55'))
        $marca = 'MASTERCARD';
    /*
    * $ marca, imprime la imagen de la marca de la tarjeta de acuerdo a:
    *       VISA: Inicia con 4
    *       MASTERCARD: Inicia con 51,52,53,54 o 55
    */


    /*Se realiza la consulta a la tabla Tarjeta*/
    $con = "INSERT INTO Tarjeta VALUES('$rfc','$_POST[sec]','$_POST[num]','$fecha','$marca','$_POST[tipo]')";
    $res = pg_query($con) or die(pg_last_error());

        if(!empty($res)){
        echo '<script>
                 alert("Se agrego correctamente la tarjeta.");
                 window.location.assign("../pags/cuenta.php");
            </script>';
            /*
            * Si se agregó correctamente, imprime una alerta.
            */
        }
        else{
            echo '<script>
                 alert("Algo fue mal.");
                 window.location.assign("../pags/cuenta.php");
            </script>';
            /*
            * Si no se pudo realizar la consulta manda una alerta y *redirecciona a la cuenta.
            */
        }
