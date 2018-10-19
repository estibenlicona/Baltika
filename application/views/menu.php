<nav class="nav-side-menu hideMenu">
  <div class="brand"> Administrador</div>
  <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
      <ul  id="menu-content" class="menu-content collapse out">
        <li data-toggle="collapse" data-target="#service" class="active class="collapsed"">
          <a href="#">
          <i class="finca"></i> Fincas <span class="arrow"></span>
          </a>
        </li>
        <ul class="sub-menu collapse" id="service">
          <li><a href="#"> Crear Finca</a></li>
          <li><a href="#"> Consultar </a></li>
        </ul>
        <li data-toggle="collapse" data-target="#programacion" class="active class="collapsed"">
          <a href="#">
          <i class="lote"></i> Programación <span class="arrow"></span>
          </a>
        </li>
        <ul class="sub-menu collapse" id="programacion">
          <li><a href="#"> Programar Entrega</a></li>
          <li><a href="#"> Consultar </a></li>
        </ul>
        <li data-toggle="collapse" data-target="#estimativo" class="active class="collapsed"">
          <a href="#">
          <i class="trabajadores"></i> Trabajadores <span class="arrow"></span>
          </a>
        </li>
        <ul class="sub-menu collapse" id="estimativo">
          <li><a href="#"> Registrar </a></li>
          <li><a href="#"> Consultar </a></li>
        </ul>
        <li data-toggle="collapse" data-target="#estimativo" class="active class="collapsed"">
          <a href="#">
          <i class="icon-home"></i> Estimativos <span class="arrow"></span>
          </a>
        </li>
        <ul class="sub-menu collapse" id="estimativo">
          <li><a href="#"> Registrar </a></li>
          <li><a href="#"> Consultar </a></li>
        </ul>
      <ul>
   </div>
</nav>
<script type="text/javascript">
 //Ocultar items del menu al selecionar una de las opciones, solo para pantalla de pc
  /*
  $(".collapsed").click(function(){
     if ($(window).width() >= 800) {
         $(".collapse").collapse('hide');
     }
   });
   */
/*$("#liga").click(function () {
  $(location).attr('href', '<?=$url_base?>liga');
})
*/
 $(window).mousemove(function(event){
   if ($(window).width() >= 800) {
     var x = event.pageX;
     var y = event.pageY;
     if (x <= 0) {
       $('.nav-side-menu').removeClass('hideMenu');
       $('.nav-side-menu').addClass('showMenu');
     }
     if (x >= 250) {
       $('.nav-side-menu').removeClass('showMenu');
       $('.nav-side-menu').addClass('hideMenu');
     }
   }
 });
 $(window).resize(function(){
    if ($(window).width() <= 800 ){
      $('.nav-side-menu').removeClass('hideMenu');
      $('.nav-side-menu').addClass('showMenu');
    }
 });
 </script>
