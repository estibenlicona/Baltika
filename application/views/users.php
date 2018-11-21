<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1 p-2 list-head text-center">
        <a class="btn btn-outline-light btn-smelect nav-item btn btn-dark editar btn-sm" href="<?=base_url('users/create')?>" >Add</a>
      </div>
      <div class="col-md-2 p-2 list-head">User</div>
      <div class="col-md-2 p-2 list-head">Team</div>
      <div class="col-md-1 p-2 list-head">Pais</div>
      <div class="col-md-2 p-2 list-head d-none d-md-block">Created</div>
      <div class="col-md-1 p-2 list-head">Rol</div>
      <div class="col-md-1 p-2 list-head text-right">Edit</div>
      <div class="col-md-1 p-2 list-head text-center">Status</div>
      <div class="col-md-1 p-2 list-head text-left">Delete</div>
    </div>
    <?php foreach ($this->session->userdata('usuarios') as  $key => $u): ?>
    <div class="row">
    <div class="col-md-1 p-1 text-center"><?=$key+1?></div>
    <div class="col-md-2 p-1">
      <img id="fotoModal" src="<?=base_url('lib/logos/'.$u->foto) ?>" width="40px" height="40px" class="img-fluid" alt="Responsive image">  @<?=$u->username?>
    </div>
    <div class="col-md-2 p-1 ">
      <?php if ($u->id_team != 0): ?>
          <?=$u->nombre_team?>
      <?php else: ?>
          <kbd class="bg-danger">Not select</kbd>
      <?php endif; ?>
    </div>
    <div class="col-md-1 p-1 "><?=$u->pais?></div>
    <div class="col-md-2 p-1  d-none d-md-block"><?=$u->date_create?></div>
    <div class="col-md-1 p-1 ">
      <?php if ($u->rol==1): ?>
          <kbd class="bg-danger">Admin</kbd>
      <?php else: ?>
          <kbd class="bg-success">Player</kbd>
      <?php endif; ?>
    </div>
    <div class="col-md-1 p-1 text-right">
      <a class="state-select nav-item btn btn-dark editar btn-sm" href="<?=base_url('users/edit/'.$u->id)?>" ><i class="opciones-nav icono-btn material-icons md-18 light600">edit</i></a>
    </div>
    <div class="col-md-1 p-1 text-center">
      <?php  if ($u->rol==1): ?>
      <a href="#" class="btn btn-danger btn-sm">
        <i class="opciones-nav icono-btn material-icons md-18 light600">lock</i>
      </a>
      <?php endif; ?>
      <?php  if ($u->estado == 1 && $u->rol!=1): ?>
      <a href="<?=base_url('users/status/'.$u->id.'/0') ?>" class="btn btn-primary btn-sm">
        <i class="opciones-nav icono-btn material-icons md-18 light600">check</i>
      </a>
      <?php endif; ?>
      <?php if ($u->estado == 0 && $u->rol!=1): ?>
      <a href="<?=base_url('users/status/'.$u->id.'/1') ?>" class="btn btn-danger btn-sm">
        <i class="opciones-nav icono-btn material-icons md-18 light600">check_box_outline_blank</i>
      </a>
      <?php endif; ?>
    </div>
    <div class="col-md-1 p-1 text-left">
      <a class="state-select nav-item btn btn-dark editar btn-sm" href="<?=base_url('users/status/'.$u->id.'/2')?>" ><i class="opciones-nav icono-btn material-icons md-18 light600">delete</i></a>
    </div>
    </div>
    <?php endforeach; ?>
  </div>
  </body>
</html>
