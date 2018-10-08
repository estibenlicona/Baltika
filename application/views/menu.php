<nav class="nav-side-menu hideMenu">
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
        <li id="liga"><a><i class="icon-league"></i> Liga </a></li>
        <li><a href="#">
          <i class="icon-cup"></i> Copa </a>
        </li>
        <li><a href="#">
          <i class="icon-team"></i> Equipos </a>
        </li>
        <li><a href="#">
          <i class="icon-team"></i> Eventos </a>
        </li>
        <li><a href="#">
          <i class="icon-administrador"></i> Usuarios </a>
        </li>
        <li><a href="#">
          <i class="icon-config" ></i> Cuenta </a>
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
$("#liga").click(function () {
  $(location).attr('href', '<?=$url_base?>liga');
})

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
