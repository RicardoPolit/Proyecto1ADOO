<?php
session_start();

/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 16/03/17
 * Time: 12:27 PM
 */


/*
 * Sesion de Usuario : user
 * Sesion de contraseña: pwd
 * */

/*Header de las paginas*/
echo "<img  id='icono' src='../../img/logo.png'/>";
echo "<a href='../pags/inventario.php' id='lab'><div id='texto'>Producto</div></a>";
echo "<div id='search'><input type='text' placeholder='Busca un producto' id='dentroB'></div>" ;
/*Si una sesion esta iniciada muestra los datos del cliente*/
if(empty($_SESSION)){
    echo "<a href='../pags/logeo.php' id='lab'><div id='texto'>Login</div></a>";
    echo "<a href='../pags/registrar.php' id='lab'><div id='texto'>Registro</div></a>";
}/*Si no muestra las opciones de login y registro*/
else{
    echo "<a href='../pags/cuenta.php' id='lab'><div id='texto'>".$_SESSION['user']."</div></a>";
    echo "<a href='../pags/logout.php' id='lab'><div id='texto'>Log Out</div></a>";

}