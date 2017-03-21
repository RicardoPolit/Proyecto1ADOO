<?php
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 17/03/17
 * Time: 2:34 PM
 */
    session_start();
    include("connect.php");
    /*
     * Este es un ejemplo por lo qye registramos manualmente los muebles
     *
     * *


    /*
     *  modelo 5 caracteres
     *  nombre hasta 10 caracteres
     *  precio flotante
     *  ancho flotante,
     *  largo flotante
     *  altura flotante
     *  foto
     *  categoria un caracter donde H si es de hogar O si ers de oficina
     *  descripcion 500 lineas
     * */


    $sql = pg_query("SELECT modelo,nombre,precio,foto FROM Mueble;");

    echo "<table id='muebles'>";
    echo "<tr>";
    while ($row = pg_fetch_array($sql)){

            echo "<td>";
            echo "<div id='mueble'>";
                    echo "<div id='modelo'>";
                        echo "<h1>".$row['modelo']."</h1>";
                    echo "</div>";
                    echo "<div id='imagen'>";
                        echo "<img src='display.php?mueble='>";
                    echo "</div>";
                    echo "<div id='descripcion'>";
                        echo "Precio: $".$row['precio']."MXN<br>";
                        echo "Modelo:".$row['nombre'];
                    echo "</div>";
            echo "</div>";
            echo "</td>";
    }
    echo "</tr>";
    echo "</table>";
