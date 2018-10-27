<nav class="nav-side-menu hideMenu">
  <div class="brand"> Usuario </div>
  <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
      <ul  id="menu-content" class="menu-content collapse out">
        <li data-toggle="collapse" data-target="#service" class="active class="collapsed"">
          <a href="#">
          <i class="finca"></i> Admin <span class="arrow"></span>
          </a>
        </li>
        <ul class="sub-menu collapse" id="service">
          <li><a href="<?=$url_base?>admin/league"> Torneos </a></li>
          <li><a href="#"> Temporadas </a></li>
          <li><a href="#"> Ligas </a></li>
          <li><a href="#"> Equipos </a></li>
          <li><a href="#"> Jugadores </a></li>
          <li><a href="#"> Eventos </a></li>
          <li><a href="#"> Premios </a></li>
        </ul>
        <li data-toggle="collapse" data-target="#liga" class="class="collapsed"">
          <a href="#">
          <i class="lote"></i> Liga <span class="arrow"></span>
          </a>
        </li>
        <ul class="sub-menu collapse" id="liga">
          <li><a href="#"> Fixture </a></li>
          <li><a href="#"> Goleadores </a></li>
          <li><a href="#"> Juegos </a></li>
        </ul>
        <li data-toggle="collapse" data-target="#copa" class="class="collapsed"">
          <a href="#">
          <i class="lote"></i> Copa <span class="arrow"></span>
          </a>
        </li>
        <ul class="sub-menu collapse" id="copa">
          <li><a href="#"> Fixture </a></li>
          <li><a href="#"> Goleadores </a></li>
          <li><a href="#"> Juegos </a></li>
        </ul>
        <li data-toggle="collapse" data-target="#alloffame" class="class="collapsed"">
          <a href="#">
          <i class="trabajadores"></i> All of Fame
          </a>
        </li>
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
     if (x <= 5) {
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
      $('#title').hide();
    }
 });
 if ($(window).width() <= 800 ){
   $('.nav-side-menu').removeClass('hideMenu');
   $('.nav-side-menu').addClass('showMenu');
   $('#title').hide();
 }
 </script>
