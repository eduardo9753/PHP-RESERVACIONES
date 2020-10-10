<?php

class Reserva
{
    private $idreservacion;
    private $fechaEntrada;
    private $fechaSalida;

    private $numeroHabitacion;
    private $idcliente;

    public function __construct()
    {
        $this->idreservacion = 0;
        $this->fechaEntrada = "";
        $this->fechaSalida  = "";
        $this->numeroHabitacion = 0;
        $this->idcliente = 0;
    }

    function setIdreservacion($idreservacion)
    {
        $this->idreservacion = $idreservacion;
    }
    function getIdreservacion()
    {
        return $this->idreservacion;
    }

    function setfechaEntrada($fechaEntrada)
    {
        $this->fechaEntrada = $fechaEntrada;
    }
    function getfechaEntrada()
    {
        return $this->fechaEntrada;
    }

    function setfechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;
    }
    function getfechaSalida()
    {
        return $this->fechaSalida;
    }

    function setnumeroHabitacion($numeroHabitacion)
    {
        $this->numeroHabitacion = $numeroHabitacion;
    }
    function getnumeroHabitacion()
    {
        return $this->numeroHabitacion;
    }

    function setidcliente($idcliente)
    {
        $this->idcliente = $idcliente;
    }
    function getidcliente()
    {
        return $this->idcliente;
    }
}
