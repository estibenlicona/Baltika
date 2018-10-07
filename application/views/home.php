<?=$header?>
<body>
  <div class="welcome">
    <br><h1 class="display-4 text-center align-middle">¡Welcome To Master League!</h1>
  </div>
  <div class="nav-side-menu">
      <div class="brand"> Administrador</div>
      <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
          <div class="menu-list">
              <ul id="menu-content" class="menu-content collapse out">
                  <li class="active">
                    <a href="<?=$url_base?>">
                    <i class="icon-home"></i> Home
                    </a>
                  </li>
                  <!-- Item -->
                  <li data-toggle="collapse" data-target="#products" class="collapsed">
                    <a id="prueba" href="#"><i class="icon-league"></i> Ligas<span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="products">
                      <li><a href="ranking_liga.php">Ranking</a></li>
                      <li><a href="play_of_liga.php">Play oF</a></li>
                      <li><a href="#">Calendario</a></li>
                      <li><a href="goleadores_liga.php">Goleadores</a></li>
                      <li><a href="#">Hall of Fame</a></li>
                  </ul>
                  <!-- Item -->
                  <li data-toggle="collapse" data-target="#service" class="collapsed">
                    <a href="#"><i class="icon-cup"></i> Torneos <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="service">
                    <li><a href="#">Ranking</a></li>
                    <li><a href="#">Play oF</a></li>
                    <li><a href="#">Calendario</a></li>
                    <li><a href="#">Goleadores</a></li>
                    <li><a href="#">Hall of Fame</a></li>
                  </ul>
                  <!-- Item -->
                  <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="#"><i class="icon-negocios"></i> Negociaciones <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="new">
                    <li>Libres</li>
                    <li>Subastas</li>
                    <li>Transferencias</li>
                    <li>Jugadores</li>
                    <li><a href="Presupuesto.php">Presupuesto</a></li>
                  </ul>
                  <!-- Item -->
                  <li>
                    <a href="#"><i class="icon-team"></i> Equipos </a>
                  </li>
                  <li data-toggle="collapse" data-target="#admin" class="collapsed">
                    <a><i class="icon-administrador"></i> Usuarios <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="admin">
                    <li><a href="premios.php">Ver</a></li>
                    <li><a href="premios.php">Crear</a></li>
                    <li><a href="premios.php">Editar</a></li>
                  </ul>
                  <li>
                    <a href="#"><i class="icon-config" ></i> Configuración </a>
                  </li>
                  <!-- End Items -->
              </ul>
       </div>
     </div>
</body>
</html>
<script type="text/javascript">
//Ocultar items del menu al selecionar una de las opciones, solo para pantalla de pc
  $(".collapsed").click(function(){
    if ($(window).width() >= 800) {
        $(".collapse").collapse('hide');
    }
  });
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
