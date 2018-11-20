<nav class="navbar  navbar-light bg-dark text-light border-bottom border-secondary">
  <div class="navbar-brand">
  </div>
  <div>
    <span> <?=$this->session->userdata('usuario')->username?> </span>
    <img src="<?=base_url('lib/logos/'.$this->session->userdata('usuario')->foto)?>" width="30" height="30">
  </div>
</nav>
