<?php
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 16/03/17
 * Time: 4:31 PM
 */

include_once ("connect.php");

function notificaciones()
{
    if (!isset($_POST['notif']))
        return 'f';
    else
        return 't';
}

$nombreE = $_POST['nombreC'];
$rS = $_POST['rS'];
$rfc = $_POST['rfcE'];
$bool = notificaciones();
$tel = $_POST['telGral'];
$pwd = password_hash($_POST['pwd'],PASSWORD_DEFAULT,['cost' => 12]);

$consulta = "INSERT INTO Cliente VALUES ('$nombreE','$rfc','$tel','$bool','$pwd');";
$consulta .= "INSERT INTO personaMoral VALUES('$rfc','$rS');";
if(isset($_POST['dDdM'])&&($_POST['dDdM'] == 'on')) {
    $domicilio = [
        "cp" => $_POST['cpE'],
        "calle" => $_POST['calleE'],
        "ciudad" => $_POST['ciudadE'],
        "tipo" => "EF"

    ];
    $consulta .= "INSERT INTO Domicilio VALUES ('$rfc','$domicilio[cp]','$domicilio[calle]','$domicilio[ciudad]','$domicilio[tipo]')";
    $query = pg_query($consulta)or die(pg_last_error());
    if ($query) {
        unset($_POST);
        echo '<script type="text/javascript">
            alert("Bienvenido a Muebles Quetzal.");
            window.location.assign("../pags/logeo.php");
            </script>';
    }

}
//DOME != DF
if(!isset($_POST['dDdM'])||($_POST['dDdM']!= 'on')) {
    $domF = [
        "cpF" => $_POST['cpFE'],
        "calleF" => $_POST['calleFE'],
        "ciudadF" => $_POST['ciudadFE'],
        "tipo" => "F"

    ];
    $domicilio = [
        "cp" => $_POST['cpE'],
        "calle" => $_POST['calleE'],
        "ciudad" => $_POST['ciudadE'],
        "tipo" => "E"

    ];
    $consulta .= "INSERT INTO Domicilio VALUES ('$rfc','$domicilio[cp]','$domicilio[calle]','$domicilio[ciudad]','$domicilio[tipo]');";
    $consulta .= "INSERT INTO Domicilio VALUES ('$rfc','$domF[cpF]','$domF[calleF]','$domF[ciudadF]','$domF[tipo]')";
    $query = pg_query($consulta);
    if ($query) {
        pg_close();
        unset($_POST);
        echo '<script type="text/javascript">
            alert("Bienvenido a Muebles Quetzal.");
            window.location.assign("../pags/logeo.php");
            </script>';
    }

}