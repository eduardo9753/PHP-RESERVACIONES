<?php

class CRuta{
  
    public function PlantillaControl(){
        require_once('view/plantilla.php');
    }
  
    public function RutaC(){
        if(isset($_GET['ruta'])){
            $ruta = $_GET['ruta'];
        }else{
            $ruta = "home";
        }
        $request = new ModeloRuta();
        $page = $request->Ruta($ruta);
        require_once($page);
    }

}