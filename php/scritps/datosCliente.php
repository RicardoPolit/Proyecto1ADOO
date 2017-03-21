<?php
    /*Inicia sesion*/
    session_start();
    /*Se conecta con la base de datos*/
    require_once ("connect.php");;
    $usuario = $_SESSION['user'];
    $rfc = $_SESSION['rfc'];
    /*
    * $usuario = el nombre del usuario
    * $rfc = el rfc del usuario
    */

    /*Si el cliente es persona fisica regresa pF si no pM*/
    function tipoCliente($rfc)
    {
        /*Realizamos Consulta*/
        $con = "SELECT nombre FROM Cliente,personaFisica WHERE '$rfc'=Cliente.rfc AND '$rfc'=personaFisica.rfc";
        $res = pg_query($con) or die(pg_last_error());
        $array = pg_fetch_array($res);
        if (!empty($array)) {
            return 'pF';
        } else {
            return 'pM';
        }
    }

    /*Funcion para ocultar el numero de una tarjeta*/
    function ocultar($numero){
        $subA = "**** **** **** ";
        $subB = substr($numero,12,16);
        return $subA.$subB;
    }

    /*imprime Tabla de datos personales*/
    function imprimirDatosPersonales($rfc)
    {
        /*Obtenemos el tipo de cliente*/
        if (tipoCliente($rfc) == 'pF')
            $con = "SELECT tipo FROM Domicilio,Cliente,personaFisica WHERE '$rfc' = Cliente.rfc AND '$rfc' = personaFisica.rfc AND '$rfc'= Domicilio.rfc;";
        else
            $con = "SELECT tipo FROM Domicilio,Cliente,personaMoral WHERE '$rfc' = Cliente.rfc AND '$rfc' =personaMoral.rfc AND '$rfc'=Domicilio.rfc";
        $res = pg_query($con) or die(pg_last_error());
        $array = pg_fetch_array($res) or die(pg_last_error());
        if($array['tipo'] =='EF')
            imprimirEF($rfc);
        else
            imprimirF($rfc);

    }

    /*Imprime la tabla de domicilios donde Fiscal y Entregas son iguales*/
    function imprimirEF($rfc){
        if(tipoCliente($rfc) == 'pF')
            $con = "SELECT nombre,apellidos,tel,email,notif,cp,calle,ciudad FROM Cliente,personaFisica,Domicilio WHERE '$rfc' = Cliente.rfc AND '$rfc' = Domicilio.rfc AND '$rfc'=personaFisica.rfc;";
        else
            $con = "SELECT nombre,rS,tel,notif,cp,calle,ciudad FROM Cliente,personaMoral,Domicilio WHERE '$rfc'=Cliente.rfc AND '$rfc' = Domicilio.rfc AND '$rfc'= personaMoral.rfc;";
        $res = pg_query($con) or die(pg_last_error());
        $array = pg_fetch_array($res);
        if(tipoCliente($rfc) == 'pF')
            $nombreCompleto = $array['nombre'].$array['apellidos'];
        else
            $nombreCompleto = $array['rs'];
            echo "<table>";
                echo "<tr>
                        <th colspan='3'>Datos Personales</th>
                      </tr>";
                echo "<tr>
                        <td id='tL'>Usuario:</td>
                        <td colspan='2'>".$nombreCompleto."</td>
                    </tr>";
                echo "<tr>
                        <td id='tL'>Telefono de Contacto:</td>
                        <td>".$array['tel']."</td>
                        <td><input type='button' value='Modificar'></td>
                    </tr>";
                if(tipoCliente($rfc)=='pF') {
                    echo "<tr>
                            <td id ='tL'>Correo:</td>
                            <td>" . $array['email'] . "</td>
                            <td><input type='button' value='Modificar'</td>
                        </tr>";
                }
                    echo "<tr>
                        <th colspan='3'>Domicilio</th>
                    </tr>";
                echo "<tr>
                        <td id='tL'>Ciudad:</td>
                        <td>".$array['ciudad']."</td>
                        <td><input type='button' value='Modificar'</td>
                    </tr>";
                echo "<tr>
                        <td id='tL'>Calle:</td>
                        <td>".$array['calle']."</td>
                        <td><input type='button' value='Modificar'</td>
                    </tr>";
                echo "<tr>
                        <td id='tL'>Codigo Postal</td>
                        <td>".$array['cp']."</td>
                        <td><input type='button' value='Modificar'></td>
                    </tr>";
            echo "</table>";

    }

    /*Funcion para imprimir las tablas de domicilio fiscal y de entregas*/
    function imprimirF($rfc){
        if(tipoCliente($rfc) == 'pF')
            $con = "SELECT nombre,apellidos,tel,email,notif FROM Cliente,personaFisica WHERE '$rfc' = Cliente.rfc AND '$rfc'=personaFisica.rfc;";
        else
            $con = "SELECT nombre,rS,tel,notif FROM Cliente,personaMoral,Domicilio WHERE '$rfc'=Cliente.rfc AND '$rfc'= personaMoral.rfc;";

        $res = pg_query($con) or die(pg_last_error());
        $array = pg_fetch_array($res);

        if(tipoCliente($rfc) == 'pF')
            $nombreCompleto = $array['nombre'].$array['apellidos'];
        else
            $nombreCompleto = $array['rs'];


        /*Datos personales*/

        echo "<table>";
        echo "<tr>
                        <th colspan='3'>Datos Personales</th>
                      </tr>";
        echo "<tr>
                        <td id='tL'>Usuario:</td>
                        <td colspan='2'>".$nombreCompleto."</td>
                    </tr>";
        echo "<tr>
                        <td id='tL'>Telefono de Contacto:</td>
                        <td>".$array['tel']."</td>
                        <td><input type='button' value='Modificar'></td>
                    </tr>";
        if(tipoCliente($rfc)=='pF') {
            echo "<tr>
                            <td id ='tL'>Correo:</td>
                            <td>" . $array['email'] . "</td>
                            <td><input type='button' value='Modificar'</td>
                        </tr>";
        }
        echo "</table>";

        /*Tablas de domicilio*/
        $con = "SELECT ciudad,calle,cp,tipo FROM Domicilio WHERE '$rfc' = Domicilio.rfc";

        $res = pg_query($con) or die(pg_last_error());

        echo "<table>";
        echo "<tr><th colspan='3'>Domicilios</th></tr>";
        while ($row = pg_fetch_row($res)){
            $dom = "Domicilio";
            if($row[3] == 'E ')
                echo "<tr><th colspan='3'>Domicilio de entregas</th></tr>";
            else
                echo "<tr><th colspan='3'>Domicilio fiscal</th></tr>";
            echo "<tr><td id='tL'>Ciudad:</td><td>".$row[0]."</td><td><input type='button' value='Modificar'</td></tr>";
            echo "<tr><td id='tL'>Calle:</td><td>".$row[1]."</td><td><input type='button' value='Modificar'</td></tr>";
            echo "<tr><td id='tL'>Codigo Postal:</td><td>".$row[2]."</td><td><input type='button' value='Modificar' ></td></tr>";
        }
        echo "</table>";
    }

    /*Imprime la informacion de las tarjetas*/
    function imprimirTarjetas($rfc){
        $con = "SELECT num,marca,tipo FROM Tarjeta WHERE '$rfc' = Tarjeta.rfc";
        $res = pg_query($con) or die (pg_last_error());
        echo "<table>";
        echo "<tr><th colspan='4'>Tarjetas Asociadas</th></tr>";
        $arreglo = pg_fetch_array($res);
        if(empty($arreglo)){
            echo "<tr><td colspan='2' id='tL'>No tienes tarjetas Asociadas</td><td><input type='button' value='Agregar' onclick='agregarTarjeta()'></td></tr>";
        }
        else{
            $res = pg_query($con) or die(pg_last_error());
            echo "<tr><td id='tL'>Numero de Tarjeta</td><td id='tL'>Marca</td><td id='tL'>Tipo</td><td id='tL'><input type='button' value='Borrar Todas' onclick='deleteAll()'></td></tr>";
            while($row = pg_fetch_array($res)) {
                $id = $row['num'];
                if($row['tipo'] == 'D ')
                    $tarjeta = 'Debito';
                else
                    $tarjeta = 'Credito';
                if(substr($row['marca'],0,4) == 'VISA')
                    $icono= "<img src='../../img/visa.png' width='50' height='50'>";
                if(substr($row['marca'],0,10) == 'MASTERCARD')
                    $icono = "<img src='../../img/mc.png' width='50' height='50'>";

                echo "<tr><td id='num'>".ocultar($row['num'])."</td><td>".$icono."</td><td>".$tarjeta."</td><td><input type='button' value='Borrar' onclick='ask(".$id.")' ></td></tr>";
            }
            echo "<tr><td colspan='4'><input type='button' value='Agregar' onclick='modificar()' style='float:right;width:100%;'></td>";
        }
        echo "</table>";
    }

    /*Imprime los datos personales del cliente*/
    imprimirDatosPersonales($rfc);
    /*Imprime los datos de las tarjetas del cliente*/
    imprimirTarjetas($rfc);