<?php

include_once('controller/controllerHabitacion.php');


$controller = new HabitacionControl();

if(!isset($_REQUEST['ruta'])){
    $controller->home();
} else {
    $peticion = $_REQUEST['ruta'];
    call_user_func(array($controller , $peticion));
}
