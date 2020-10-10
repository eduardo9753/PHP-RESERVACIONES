<?php

include_once('./model/habitacionM.php');
include_once('./datos/Habitacion.php');
include_once('./datos/Cliente.php');
include_once('./datos/Reserva.php');


class HabitacionControl
{

    private $Modelo;

    public function __construct()
    {
        $this->Modelo = new HabitacionModel();
    }

    //view Personal
    public function GetPersonal()
    {
        try {
            $request = $this->Modelo->getPersonal();
            return $request;
        } catch (Exception $e) {
            echo "Error Controller habitacion" . $e->getMessage();
        }
    }


    //view Matrimonial
    public function GetMatrimonial()
    {
        try {
            $request = $this->Modelo->getMatrimonial();
            return $request;
        } catch (Exception $e) {
            echo "Error Controller habitacion" . $e->getMessage();
        }
    }


    //view Familiar
    public function GetFamiliar()
    {
        try {
            $request = $this->Modelo->getFamiliar();
            return $request;
        } catch (Exception $e) {
            echo "Error Controller habitacion" . $e->getMessage();
        }
    }


    //view habitacion por ID
    public function GetHabitacioId()
    {
        try {
            if (isset($_REQUEST['id'])) {
                $habi = new Habitacion();
                $habi->SetIdhabitacion($_REQUEST['id']);

                $request = $this->Modelo->getHabitacionID($habi);
                return $request;
            }
        } catch (Exception $e) {
            echo "Error Controller habitacion" . $e->getMessage();
        }
    }



    //view info habitacion
    public function ViewHabitacionInfo()
    {
        try {
            if (isset($_REQUEST['idhabi'])) {
                $habi = new Habitacion();
                $habi->SetIdhabitacion($_REQUEST['idhabi']);
                $request = $this->Modelo->getHabitacionID($habi);
                return $request;
            }
        } catch (Exception $e) {
            echo "Error Controller habitacion" . $e->getMessage();
        }
    }


    //registro de Reservacion y cliete
    public function RegisterReservacion()
    {
        try {
            if (isset($_REQUEST['btnReseraInfoHabi'])) {
                $cliente = new Cliente();
                $cliente->Setdni($_REQUEST['txtdni']);
                $cliente->Setnombre($_REQUEST['txtnombre']);
                $cliente->Setapellido($_REQUEST['txtapellido']);
                $cliente->Setcelular($_REQUEST['txtcelular']);
                $cliente->Setemail($_REQUEST['txtemail']);
                $cliente->Setdireccion($_REQUEST['txtdireccion']);
                $cliente->Setrecado($_REQUEST['txtrecado']);

                $request = $this->Modelo->registrarCliente($cliente);
                //    var_dump( $cliente->Getdni());
                if ($request) {
                    $reserva = new Reserva();
                    $reserva->setfechaEntrada($_REQUEST['txtfechaInicio']);
                    $reserva->setfechaSalida($_REQUEST['txtfechaFin']);
                    $reserva->setnumeroHabitacion($_REQUEST['txtidhabitacionforanea']);
                    $reserva->setidcliente($cliente->Getdni());
                    // var_dump( $reserva->getfechaEntrada());
                    $request = $this->Modelo->registrarReserva($reserva);
                    if ($request) {
                        header('location: index.php?ruta=habitacionHuesped');
                    }
                } else {
                    echo "Error de insercionde datos";
                }
            }
        } catch (Exception $e) {
            echo "Error Controller habitacion" . $e->getMessage();
        }
    }



    //view info habitacion
    public function DetalleReserva()
    {
        try {
            if (isset($_REQUEST['btnReseraInfoHabi'])) {
                $cliente = new Cliente();
                $cliente->Setdni($_REQUEST['']);

                $request = $this->Modelo->detalleReserva($cliente);
                return $request;
            }
        } catch (Exception $e) {
            echo "Error Controller habitacion" . $e->getMessage();
        }
    }
}
