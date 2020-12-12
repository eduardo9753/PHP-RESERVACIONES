window.addEventListener('DOMContentLoaded',() =>{
  //variables
  const mostra_habitacion_img = document.querySelector('#mostra-habitacion-img');
  const precio_habitacion = document.querySelector('#precio-habitacion');
  const mover_servicios = document.querySelector('.ver-img-services');

  //FUNCION PARA VER SCROLL
  const obtenerScrollInicio = () => document.documentElement.scrollTop || document.body.scrollTop;

  //FUNCION PARA MOSTRAR MI IMAGEN
  const viewImgHabitacion = () =>{
      if(obtenerScrollInicio() > 80){
        mostra_habitacion_img.className = "mostrar";
      }else{
        mostra_habitacion_img.className = "ocultar";  
      }
  }

  //FUNCION MOVER TITULO HABITACION
  const viewTitleHabitacion = () =>{
      if(obtenerScrollInicio() > 10){
          precio_habitacion.className = "mostrar-title-habitacion";
      }else{
          precio_habitacion.className = "ocultar";
      }
  }


  const viewServicios = () =>{
      if(obtenerScrollInicio() > 500){
          mover_servicios.className = "mostrar-servicios";
      }else{
          mover_servicios.className = "ocultar";
      }
  }

  //EJECUTAMOS LAS FUNCIONES CON LOS EVENTOS
  window.addEventListener('scroll',viewImgHabitacion);
  window.addEventListener('scroll',viewTitleHabitacion);
  window.addEventListener('scroll',viewServicios);


})