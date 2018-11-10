<nav class="nav-side-menu hideMenu">
  <div class="brand"> Dasboard</div>
  <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
      <ul  id="menu-content" class="menu-content collapse out">
        <li data-toggle="collapse" data-target="#service" class="" collapsed>
          <a href=""<?=base_url('admin')?>"">
            <i></i> Control Panel
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'tournament' ? 'active' : '';  ?>">
          <a href="<?=base_url('tournament')?>">
          <i></i> Tournament
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'seanson' ? 'active' : '';  ?>">
          <a href="<?=base_url('seanson')?>">
          <i></i> Seansons
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'league' ? 'active' : '';  ?>">
          <a href="<?=base_url('league')?>">
            <i></i> Leagues
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'manager' ? 'active' : '';  ?>">
          <a href="<?=base_url('manager')?>">
            <i></i> Managers
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'team' ? 'active' : '';  ?>">
          <a href="<?=base_url('team')?>">
            <i></i> Teams
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'games' ? 'active' : '';  ?>">
          <a href="<?=base_url('games')?>">
            <i></i> Games
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'scoretables' ? 'active' : '';  ?>">
          <a href="<?=base_url('alloffame')?>">
            <i></i> Score Tables
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'alloffame' ? 'active' : '';  ?>">
          <a href="<?=base_url('alloffame')?>">
            <i></i> All of Fame
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
