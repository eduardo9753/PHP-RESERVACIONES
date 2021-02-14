<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/menu.php'); ?>

<section class="galeryhabitacion">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="recursos/img/hotel1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p class="h1">calidad</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="recursos/img/hotel2.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="recursos/img/hotel3.jpg" class="d-block w-100" alt="...">
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


<main>
    <section class="Empresa my-5" id="empresa">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pf-empresa">
                    <div class="descript-empresa text-center">
                        <h1 class="lead">El Hotel de 3 Estrellas</h1>
                        <p class="py-5 lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. In corporis
                            ipsam totam ea accusamus mollitia ducimus culpa, recusandae laudantium. Saepe animi in
                            eveniet non dolorem doloremque laudantium porro alias hic!</p>

                        <a href="" class="My-btn">Saber Mas...</a>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="My-Video">
                        <video autoplay loop muted>
                            <source src="recursos/video/video.mp4">
                        </video>

                        <div class="descript-Video">
                            <p class="lead">el mejor lugar para relejarse y disfrutar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Servicios" id="servicios">
        <div class="container">
            <div class="py-5">
                <h2 class="title-servi">Nuestro Servicios Internos</h2>
            </div>

            <div class="ocultar ver-img-services">
                <div class="row">
                    <div class="col-md-3 servicio">
                        <div class="img-servi">
                            <img src="recursos/img/serviCafeteria.jpg" alt="">
                        </div>

                        <div class="img-descript">
                            <p class="lead">Cafeteri</p>
                        </div>
                    </div>

                    <div class="col-md-3 servicio">
                        <div class="img-servi">
                            <img src="recursos/img/serviTelefono.jpg" alt="">
                        </div>

                        <div class="img-descript">
                            <p class="lead">Telefono de habitacion</p>
                        </div>
                    </div>

                    <div class="col-md-3 servicio">
                        <div class="img-servi">
                            <img src="recursos/img/seviLavanderia.jpg" alt="">
                        </div>

                        <div class="img-descript">
                            <p class="lead">Lavanderia</p>
                        </div>
                    </div>

                    <div class="col-md-3 servicio">
                        <div class="img-servi">
                            <img src="recursos/img/seviWifi.jpg" alt="">
                        </div>

                        <div class="img-descript">
                            <p class="lead">Internet Gratis</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <section class="Habiaciones py-5" id="habitaciones">
        <div class="container">
            <div class="my-5">
                <h2 class="title-habitacion title-white">Nuestras Habitaciones</h2>
            </div>

            <div class="row">
                <?php foreach ($this->MODEL->allHabitaciones() as $new) :  ?>
                    <div class="col-md-4 habitacion mb-4">
                        <div>
                            <div>
                                <a href="?ruta=habitacionById&id=<?php echo $new->idtipohabitacion; ?>" class="">
                                    <img src="recursos/img/<?php echo $new->imagenPrincipal; ?>" alt="">
                                </a>
                            </div>

                            <div class="descript-habitacion p-3">
                                <h3 class="py-2 text-center"><?php echo $new->categoria; ?></h3>
                                <ul class="lead">
                                    <li><span>></span>Cama: <?php echo $new->tipocama; ?> </li>
                                    <li><span>></span>Personas: <?php echo $new->numPersonas; ?> </li>
                                    <li><span>></span>Area: <?php echo $new->area; ?></li>
                                </ul>

                                <a href="?ruta=habitacionById&id=<?php echo $new->idtipohabitacion; ?>" class="My-btn">Saber Mas ...</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="Testimoniales">
        <div class="container">
            <div class="py-5">
                <h2 class="title-testimonio">Nuestros Testimoniales</h2>
            </div>

            <div class="row">
                <div class="col-md-4 testimonial">
                    <img src="recursos/img/frankTesti.jpg" alt="">
                    <h3 class="py-2">Frank Nuñe</h3>
                    <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea beatae fuga cumque nulla maiores
                        molestias! "</p>
                </div>

                <div class="col-md-4 testimonial">
                    <img src="recursos/img/katterinTest.jpg" alt="">
                    <h3 class="py-2">Kattherin Kattherin</h3>
                    <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea beatae fuga cumque nulla maiores
                        molestias! "</p>
                </div>

                <div class="col-md-4 testimonial">
                    <img src="recursos/img/shaninTest.jpg" alt="">
                    <h3 class="py-2">Shanin Villanueva</h3>
                    <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea beatae fuga cumque nulla maiores
                        molestias! Expedita "</p>
                </div>
            </div>
        </div>
    </section>

    <section class="Correo py-4 text-center">
        <div class="container">
            <div class="text-center my-4">
                <h2>Suscribete para recibir ofertas</h2>
            </div>

            <div class="row">
                <div class="col-md-6 m-auto">
                    <form action="">
                        <div class="form-group">
                            <label for="" class="my-3">Tu correo Electronico</label>
                            <input type="text" name="" id="" class="form-control" placeholder="@example.com" required>
                        </div>

                        <div class="">
                            <input type="text" name="" id="" class="btn btn-danger" value="ENVIAR">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="Mapa">
        <div class="container">
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.757173937312!2d-77.02607018578968!3d-11.921980042836257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105d15889b76e93%3A0xa8021ebde06f9592!2sColegio%20Cristo%20Hijo%20de%20Dios%202075!5e0!3m2!1ses-419!2spe!4v1600844295231!5m2!1ses-419!2spe" width="" height="" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="myMapa"></iframe>
            </div>
        </div>
    </section>
</main>

<?php include_once('view/templates/footer.php'); ?>