<?php

class Habitacion{

    private $idhabitacion;
    private $costo;
    private $area;
    private $numeroPersonas;

    public function __construct()
    {
        $this->idhabitacion=0;
        $this->costo=0;
        $this->area="";
        $this->numeroPersonas=0;
    }

    function SetIdhabitacion($idhabitacion){
        $this->idhabitacion = $idhabitacion;
    }
    function GetIdhabitacion(){
        return $this->idhabitacion;
    }


    function SetCosto($costo){
        $this->costo = $costo;
    }
    function GetCosto(){
        return $this->costo;
    }


    function SetArea($area){
        $this->area = $area;
    }
    function GetArea(){
        return $this->area;
    }


    function SetNumeroPersonas($numeroPersonas){
        $this->numeroPersonas = $numeroPersonas;
    }
    function GetNumeroPersonas(){
        return $this->numeroPersonas;
    }


}