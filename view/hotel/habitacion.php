<?php
include_once('./view/templates/menu.php');

$habitacionC = new HabitacionControl();
$data = $habitacionC->GetHabitacioId();
//var_dump($data);
?>

<section class="Correo py-4 text-center parrallax">
    <div class="container">
        <div class="text-center my-3">
            <h2><?php echo $data->categoria; ?></h2>
        </div>
    </div>
</section>


<main class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="box-img">
                    <img src="recursos/img/<?php echo $data->imagenPrincipal; ?>" alt="" class="img-fluid">
                </div>
            </div>


            <div class="Formulario col-md-4 pb-3">
                <div>
                    <div>
                        <p class="text-center lead pt-5 precio-noche">Precio por Noche</p>
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

                    <div class="text-center">
                        <a href="index.php?ruta=infohabitacion&idhabi=<?php echo $data->Tipohabitacion_idtipohabitacion; ?>" class="My-btn">Reservar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="container">

        <div>
            <h4 class="text-center text-uppercase my-5">interiores de la habitacion</h4>
        </div>
        <section class="galeryhabitacion">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="archivos/<?php echo $data->imagen1; ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="archivos/<?php echo $data->imagen2; ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="archivos/<?php echo $data->imagen3; ?>" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>

        <div class="m-auto">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-hover table-responsive mt-4">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Vista</th>
                                <th>Diseño</th>
                                <th>Comodidad</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Area Mediana</td>
                                <td>Huesped</td>
                                <td>Cama Duplex</td>
                                <td>Max 4 personas</td>
                            </tr>

                            <tr>
                                <td>Area Natural</td>
                                <td>Calidad</td>
                                <td>Cama Duplex o Queen</td>
                                <td>Max 4 personas Min 1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-hover table-responsive mt-4">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Tecnologia</th>
                                <th>Comunicacion</th>
                                <th>Servicios</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Telfono</td>
                                <td>TV 40''</td>
                                <td>Baño</td>
                                <td>Porcelanato</td>
                            </tr>

                            <tr>
                                <td>Wifi Gratis</td>
                                <td>DvD-CD</td>
                                <td>Toallas De algodon</td>
                                <td>fibra de Aluminio</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</main>