<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-1 p-2 list-head text-center">
        <a class="btn btn-outline-light btn-smelect nav-item btn btn-dark editar btn-sm" href="<?=base_url('team/create_view')?>" >Add</a>
      </div>
      <div class="col-3 p-2 list-head">Team</div>
      <div class="col-2 p-2 list-head">Manager</div>
      <div class="col-2 p-2 list-head">Created</div>
      <div class="col-1 p-2 list-head text-right">Players</div>
      <div class="col-1 p-2 list-head text-right">Edit</div>
      <div class="col-1 p-2 list-head text-center">Status</div>
      <div class="col-1 p-2 list-head text-left">Delete</div>
    </div>
    <?php foreach ($this->session->userdata('teams') as $key => $t): ?>
      <?php if ($t->id!=0): ?>
        <div class="row">
          <div class="col-1 p-1 text-center"><?=$key+1?></div>
          <div class="col-3 p-1"><img src="<?=base_url('lib/logos/'.$t->foto) ?>" width="40px" height="40px" class="img-fluid" alt="Responsive image"> <?=$t->nombre;?></div>
          <div class="col-2 p-1 ">
            <?php if (is_null($t->manager)): ?>
                <kbd>Not select</kbd>
            <?php else: ?>
                @<?=$t->manager?>
            <?php endif; ?>
          </div>
          <div class="col-2 p-1"><?=$t->created;?></div>
          <div class="col-1 p-1 text-right">
            <a class="state-select nav-item btn btn-dark editar btn-sm" href="<?=base_url('player/team_players_view/'.$t->id)?>"><i class="opciones-nav icono-btn material-icons md-18 light600">accessibility</i></a>
          </div>
          <div class="col-1 p-1 text-right">
            <a class="state-select nav-item btn btn-dark editar btn-sm" href="<?=base_url('team/edit_view/'.$t->id)?>"><i class="opciones-nav icono-btn material-icons md-18 light600">edit</i></a>
          </div>
          <div class="col-1 p-1 text-center">
            <?php  if ($t->estado == 1): ?>
            <a href="<?=base_url('team/status/'.$t->id.'/0') ?>" class="btn btn-primary btn-sm">
              <i class="opciones-nav icono-btn material-icons md-18 light600">check</i>
            </a>
            <?php endif; ?>
            <?php if ($t->estado == 0): ?>
            <a href="<?=base_url('team/status/'.$t->id.'/1') ?>" class="btn btn-danger btn-sm">
              <i class="opciones-nav icono-btn material-icons md-18 light600">check_box_outline_blank</i>
            </a>
            <?php endif; ?>
          </div>
          <div class="col-1 p-1 text-left">
            <a class="state-select nav-item btn btn-dark btn-sm"  href="<?=base_url('team/status/').$t->id.'/2'?>"><i class="opciones-nav icono-btn material-icons md-18 light600">delete_outline</i></a>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</body>
