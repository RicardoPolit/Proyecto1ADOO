<?php
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 16/03/17
 * Time: 4:27 PM
 */
include_once ("connect.php");
/*
 *  Registramos persona fisica
 * */

print_r($_POST);

/*Verificamos que el usuario desee recibir notificaciones*/
function notificaciones()
{
    if (!isset($_POST['notif']))
        return 'f';
    else
        return 't';
}

$bool = notificaciones();
$nombres = $_POST['nombres'];
$apellidos = $_POST["apellidos"];
$email = $_POST['email'];
$rfc = $_POST['rfc'];
$tel = $_POST['tel'];


$pwd = password_hash($_POST['pwd'],PASSWORD_DEFAULT,['cost' => 12]);

$consulta = "INSERT INTO Cliente VALUES ('$nombres','$rfc','$tel','$bool','$pwd');";
$consulta .= "INSERT INTO personaFisica VALUES('$rfc','$apellidos','$email');";
//DOME = DOMF
if(isset($_POST['dDdF'])&&($_POST['dDdF'] == 'on')) {
    $domicilio = [
        "cp" => $_POST['cp'],
        "calle" => $_POST['calle'],
        "ciudad" => $_POST['ciudad'],
        "tipo" => "EF",

    ];
    $consulta .= "INSERT INTO Domicilio VALUES ('$rfc','$domicilio[cp]','$domicilio[calle]','$domicilio[ciudad]','$domicilio[tipo]')";
    $query = pg_query($consulta) or die(pg_last_error());
    if ($query) {
        unset($_POST);
        echo '<script type="text/javascript">
            alert("Bienvenido a Muebles Quetzal.");
            window.location.assign("../pags/logeo.php");
            </script>';
    }

}

//DOME != DF
if(!isset($_POST['dDdF'])||($_POST['dDdF']!= 'on')){
    $domF = [
        "cpF" => $_POST['cpF'],
        "calleF" => $_POST['calleF'],
        "ciudadF" =>$_POST['ciudadF'],
        "tipo" => "F"

    ];
    $domicilio = [
        "cp" => $_POST['cp'],
        "calle" => $_POST['calle'],
        "ciudad" => $_POST['ciudad'],
        "tipo" => "E",

    ];
    $consulta .= "INSERT INTO Domicilio VALUES ('$rfc','$domicilio[cp]','$domicilio[calle]','$domicilio[ciudad]','$domicilio[tipo]');";
    $consulta .= "INSERT INTO Domicilio VALUES ('$rfc','$domF[cpF]','$domF[calleF]','$domF[ciudadF]','$domF[tipo]')";
    $query = pg_query($consulta) or die(pg_last_error());
    if($query){
        pg_close();
        unset($_POST);
        echo '<script type="text/javascript">
            alert("Bienvenido a Muebles Quetzal.");
            window.location.assign("../pags/index.php");
            </script>';
    }

}