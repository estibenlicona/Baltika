<nav class="nav-side-menu hideMenu">
  <div class="brand text-left p-1">
    <span class="nav-usuario"><img class="user" src="<?=base_url('lib/logos/'.$this->session->userdata('usuario')->foto)?>" width="50" height="50">&nbsp;&nbsp;@<?=$this->session->userdata('usuario')->username?></span>
  </div>
  <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
      <ul  id="menu-content" class="menu-content collapse out">
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
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'player' ? 'active' : '';  ?>">
          <a href="<?=base_url('player')?>">
            <i></i> Players
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'team' ? 'active' : '';  ?>">
          <a href="<?=base_url('team')?>">
            <i></i> Teams
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'users' ? 'active' : '';  ?>">
          <a href="<?=base_url('users')?>">
            <i></i> Users
          </a>
        </li>
        <li data-toggle="collapse" class="<?= $this->uri->segment(1) == 'alloffame' ? 'active' : '';  ?>">
          <a href="<?=base_url('login/session_destroy')?>">
            <i></i> Exit</a>
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
