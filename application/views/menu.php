<nav class="nav-side-menu hideMenu">
  <div class="brand"> Dasboard</div>
  <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
      <ul  id="menu-content" class="menu-content collapse out">
        <li data-toggle="collapse" data-target="#service" class="<?= $this->uri->segment(1) == 'Admin' ? 'active' : '';  ?>" collapsed>
          <a href="#">
          <i class="finca"></i> Admin <span class="arrow"></span>
          </a>
        </li>
        <ul class="sub-menu collapse" id="service">
          <li><a href="#"> Matches </a></li>
          <li class="<?= $this->uri->segment(2) == 'list_league' ? 'active' : '';  ?>"><a href="<?=base_url('admin/list_league')?>"> Leagues </a></li>
          <li><a href="<?=base_url('admin/list_seanson')?>"> Seansons </a></li>
          <li><a href="<?=base_url('admin/list_tourney')?>"> Tourney </a></li>
          <li><a href="<?=base_url('admin/list_teams')?>"> Teams </a></li>
          <li><a href="<?=base_url('admin/list_players')?>"> Players </a></li>
          <li><a href="<?=base_url('admin/list_events')?>"> Events </a></li>
          <li><a href="<?=base_url('admin/list_adwars')?>"> Adwars </a></li>
        </ul>
        <li data-toggle="collapse" data-target="#liga" class="class="collapsed"">
          <a href="#">
          <i class="lote"></i> Leagues <span class="arrow"></span>
          </a>
        </li>
        <ul class="sub-menu collapse" id="liga">
          <li><a href="#"> Fixture </a></li>
          <li><a href="#"> Killers </a></li>
          <li><a href="#"> Matchday </a></li>
        </ul>
        <li data-toggle="collapse" data-target="#copa" class="class="collapsed"">
          <a href="#">
          <i class="lote"></i> Seansons <span class="arrow"></span>
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
 $(window).mousemove(function(event){
   if ($(window).width() >= 800) {
     var x = event.pageX;
     var y = event.pageY;
     if (x <= 0) {
       $('.nav-side-menu').removeClass('hideMenu');
       $('.nav-side-menu').addClass('showMenu');
     }
     if (x >= 230) {
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
