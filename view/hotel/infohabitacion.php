<?php
include_once('./view/templates/menu.php');

$habitacionC = new HabitacionControl();
$data = $habitacionC->ViewHabitacionInfo();
$a = $habitacionC->RegisterReservacion();
//var_dump($a);
//var_dump($data);
?>

<section class="Correo py-4 text-center parrallax">
    <div class="container">
        <div class="text-center mt-3">
            <h2><?php echo $data->categoria; ?></h2>
        </div>
    </div>
</section>


<main class="my-5">
    <div class="container">

        <div class="Reservacion mb-4">
            <form action="" method="POST">
                <div class="row">
                    <div class="Formulario col-md-6 pb-4">
                        <div>
                            <label for="" class="my-3">DNI</label>
                            <input type="text" value="" class="form-control" name="txtdni">
                        </div>
                        <div>
                            <label for="" class="my-3">Nombre</label>
                            <input type="text" value="" class="form-control" name="txtnombre">
                        </div>

                        <div>
                            <label for="" class="my-3">Apellido</label>
                            <input type="text" value="" class="form-control" name="txtapellido">
                        </div>

                        <div>
                            <label for="" class="my-3">Celular</label>
                            <input type="text" value="" class="form-control" name="txtcelular">
                        </div>

                        <div>
                            <label for="" class="my-3">Email</label>
                            <input type="email" value="" class="form-control" name="txtemail">
                        </div>

                        <div>
                            <label for="" class="my-3">Direccion</label>
                            <input type="text" value="" class="form-control" name="txtdireccion">
                        </div>

                        <div>
                            <label for="" class="my-3">Recado(opcional)</label>
                            <textarea name="txtrecado" id="" class="form-control" cols="30" rows="5"></textarea>
                        </div>

                    </div>


                    <div class="Formulario col-md-6 pb-4">
                        <div>
                            <label for="" class="my-3">Fecha Inicio</label>
                            <input type="date" value="" class="form-control" name="txtfechaInicio">
                        </div>
                        <div>
                            <label for="" class="my-3">Fecha Fin</label>
                            <input type="date" value="" class="form-control" name="txtfechaFin">
                        </div>

                        <div>
                            <input type="submit" class="btn btn-danger my-4 btn-block" value="Reservar Habitacion" name="btnReseraInfoHabi">
                        </div>

                        <div>
                            <label for="" class="my-3"></label>
                            <input type="text" value="<?php echo $data->Tipohabitacion_idtipohabitacion; ?>" class="form-control" name="txtidhabitacionforanea" hidden>
                        </div>

                        <div>
                            <label for="" class="my-3"></label>
                            <input type="text" value="<?php; ?>" class="form-control" name="txtidclienteforanea" hidden>
                        </div>
                    </div>
                </div>

            </form>
        </div>



        <div class="row">
            <div class="col-md-8">
                <div class="box-img">
                    <img src="recursos/img/matrimonial.jpg" alt="" class="img-fluid">
                </div>
            </div>

            <div class="Formulario col-md-4">
                <div class="box-img">
                    <div>
                        <p class="text-center lead pt-5">Precio por Noche</p>
                        <p class="precio text-center p-3"><?php echo $data->costodia; ?></p>
                    </div>

                    <div>
                        <div>
                            <h3 class="text-center lead">Descripcion</h3>
                        </div>
                        <p class="lead">Maximo de Personas: <?php echo $data->numPersonas; ?></p>
                        <p class="lead">Area de la habitacion: <?php echo $data->area; ?></p>
                        <p class="lead">Categoria de la habitacion: <?php echo $data->categoria; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>