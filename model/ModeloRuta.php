<?php

class ModeloRuta
{

  public function Ruta($ruta)
  {
    switch ($ruta) {
      case 'home':
        $pagina = "view/hotel/" . $ruta . ".php";
        return $pagina;
        break;

      case 'habitacion':
        $pagina = "view/hotel/" . $ruta . ".php";
        return $pagina;
        break;

      case 'habitacionHuesped':
        $pagina = "view/hotel/" . $ruta . ".php";
        return $pagina;
        break;


      case 'infohabitacion':
        $pagina = "view/hotel/" . $ruta . ".php";
        return $pagina;

      case 'habitacionHuesped':
        $pagina = "view/hotel/" . $ruta . ".php";
        return $pagina;


      default:
        $pagina = 'view/hotel/404.php';
        return $pagina;
        break;
    }
  }
}
