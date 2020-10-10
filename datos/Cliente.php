<?php

class Cliente{

    private $dni;
    private $nombre;
    private $apellido;
    private $celular;
    private $email;
    private $direccion;
    private $recado;


    public function __construct()
    {
        $this->dni=0;
        $this->nombre="";
        $this->apellido="";
        $this->celular=0;
        $this->email="";
        $this->direccion="";
        $this->recado="";
    }

    function Setdni($dni){
        $this->dni = $dni;
    }
    function Getdni(){
        return $this->dni;
    }


    function Setnombre($nombre){
        $this->nombre = $nombre;
    }
    function Getnombre(){
        return $this->nombre;
    }


    function Setapellido($apellido){
        $this->apellido = $apellido;
    }
    function Getapellido(){
        return $this->apellido;
    }


    function Setcelular($celular){
        $this->celular = $celular;
    }
    function Getcelular(){
        return $this->celular;
    }

    function Setemail($email){
        $this->email = $email;
    }
    function Getemail(){
        return $this->email;
    }

    function Setdireccion($direccion){
        $this->direccion = $direccion;
    }
    function Getdireccion(){
        return $this->direccion;
    }


    function Setrecado($recado){
        $this->recado = $recado;
    }
    function Getrecado(){
        return $this->recado;
    }

}