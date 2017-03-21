<?php
session_start();
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 16/03/17
 * Time: 12:27 PM
 */

echo "<img  id='icono' src='../../img/logo.png'/>";
echo "<a href='../pags/index.php' id='lab'><div id='texto'>Productos</div></a>";
echo "<div id='search'><input type='text' placeholder='Busca un producto' id='dentroB'></div>" ;

if(empty($_SESSION)){
    echo "<a href='../pags/logeo.php' id='lab'><div id='texto'>Login</div></a>";
    echo "<a href='../pags/registrar.php' id='lab'><div id='texto'>Registro</div></a>";
}
else{
    echo "<a href='../pags/cuenta.php' id='lab'><div id='texto'>$_SESSION[usuario]</div></a>";
    echo "<a href='../pags/logout.php' id='lab'><div id='texto'>Log Out</div></a>";

}