<?php

//IMPORTANDO MODELO HABITACION
include_once('./model/habitacionM.php');

//IMPORTANDO LOS DATOS                                          
include_once('./datos/Habitacion.php');
include_once('./datos/Cliente.php');
include_once('./datos/Reserva.php');


class HabitacionControl
{

    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new HabitacionModel();
    }

    public function home() {
        include_once('view/hotel/home.php');
    }


    //view habitacion por ID
    public function habitacionById()
    {
        try {
            if (isset($_REQUEST['id'])) {
                $habitacion = new Habitacion();
                $habitacion->SetIdhabitacion($_REQUEST['id']);

                $data = $this->MODEL->getHabitacionID($habitacion);
                include_once('view/hotel/habitacion.php');
            }
        } catch (Exception $e) {
            echo "Error Controller habitacion" . $e->getMessage();
        }
    }



    //view info habitacion
    public function infohabitacion()
    {
        try {
            if (isset($_REQUEST['id'])) {
                $habitacion = new Habitacion();
                $habitacion->SetIdhabitacion($_REQUEST['id']);

                $data = $this->MODEL->getHabitacionID($habitacion);
                include_once('view/hotel/infohabitacion.php');
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

                $request = $this->MODEL->registrarCliente($cliente);
                if ($request) {
                    $reserva = new Reserva();
                    $reserva->setfechaEntrada($_REQUEST['txtfechaInicio']);
                    $reserva->setfechaSalida($_REQUEST['txtfechaFin']);
                    $reserva->setnumeroHabitacion($_REQUEST['txtidhabitacionforanea']);
                    $reserva->setidcliente($cliente->Getdni());
                    $request = $this->MODEL->registrarReserva($reserva);
                    if ($request) {
                        header('Location: ?ruta=DetalleReserva');
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
        include_once('view/hotel/habitacionHuesped.php');
    }
}
