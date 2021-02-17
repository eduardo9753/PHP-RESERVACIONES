<?php

include_once('./config/Conexion.php');

include_once('./datos/Habitacion.php');
include_once('./datos/Cliente.php');
include_once('./datos/Reserva.php');


class HabitacionModel
{

    private $pdo;

    public function __construct()
    {
        try { //inializamos la clase conexion
            $this->pdo = new ClassConexion();
        } catch (Exception $e) {
            echo "Error constructor model" . $e->getMessage();
        }
    }

    //traemos habitacion personal
    public function allHabitaciones()
    {
        try {
            $sql = "SELECT hb.numeroHabitacion , th.imagenPrincipal , th.categoria , th.tipocama ,
                           th.idtipohabitacion , hb.numPersonas,hb.area
                               FROM Habitacion hb
                               INNER JOIN Tipohabitacion th
                               on hb.Tipohabitacion_idtipohabitacion = th.idtipohabitacion
                               WHERE th.idtipohabitacion";
            $stm = $this->pdo->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "Error tpersonal" . $e->getMessage();
        }
    }


    //traemos haitacion por id
    public function getHabitacionID(Habitacion $habitacion)
    {
        try {
            $sql = "SELECT th.imagenPrincipal,th.imagen1,th.imagen2,th.imagen3,th.categoria,
            hb.numPersonas,hb.area,hb.costodia,hb.Tipohabitacion_idtipohabitacion
                         FROM Habitacion hb
                         INNER JOIN Tipohabitacion th
                         on hb.Tipohabitacion_idtipohabitacion = th.idtipohabitacion
                         WHERE th.idtipohabitacion = ?";
            $stm = $this->pdo->ConectarBD()->prepare($sql);
            $stm->execute(array($habitacion->GetIdhabitacion()));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "Error habitacion" . $e->getMessage();
        }
    }



    //Registro de clientes
    public function registrarCliente(Cliente $cliente)
    {
        try {
            $sql = "INSERT INTO cliente(idclienteDNI,nombre,apellido,celular,email,direccion,recado) 
            VALUES(?,?,?,?,?,?,?)";
            $stm = $this->pdo->ConectarBD()->prepare($sql)->execute(
                array(
                    $cliente->Getdni(),
                    $cliente->Getnombre(),
                    $cliente->Getapellido(),
                    $cliente->Getcelular(),
                    $cliente->Getemail(),
                    $cliente->Getdireccion(),
                    $cliente->Getrecado()
                )
            );
            return $stm;
        } catch (Exception $e) {
            echo "Error de cliente" . $e->getMessage();
        }
    }


    //Registro de Reservacion
    public function registrarReserva(Reserva $reserva)
    {
        try {
            $sql = "INSERT INTO reservacion(FechaEntrada,FechaSalida,Habitacion_numeroHabitacion,cliente_idclienteDNI) 
            VALUES(?,?,?,?)";
            $stm = $this->pdo->ConectarBD()->prepare($sql)->execute(
                array(
                    $reserva->getfechaEntrada(),
                    $reserva->getfechaSalida(),
                    $reserva->getnumeroHabitacion(),
                    $reserva->getidcliente()
                )
            );
            return $stm;
        } catch (Exception $e) {
            echo "Error de cliente" . $e->getMessage();
        }
    }



    //Detalle Reserva 
    public function detalleReserva(Cliente $dni)
    {
        try {
            $sql = "SELECT c.idclienteDNI,c.nombre,c.email,
                           r.FechaEntrada,r.FechaSalida
                           FROM cliente c
                           INNER JOIN reservacion r
                           on c.idclienteDNI = r.cliente_idclienteDNI
                           WHERE c.idclienteDNI = ?";
            $stm = $this->pdo->ConectarBD()->prepare($sql);
            $stm->execute(array($dni->Getdni()));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "Error habitacion" . $e->getMessage();
        }
    }
}
