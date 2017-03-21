<?php
/**
 * Created by PhpStorm.
 * User: franciscomera
 * Date: 16/03/17
 * Time: 1:31 PM
 */
session_start();
if(!empty($_SESSION)){

    session_destroy();
    unset($_SESSION);
    echo '<script>
                alert("Vuelva pronto :)");
                 window.location.assign("../pags/index.php");
            </script>';

}