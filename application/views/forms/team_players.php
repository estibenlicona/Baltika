<body>
<div class="container-fluid">
  <form class="form-inline p-2" action="<?=base_url('player/add_player_team/'.$team->id)?>" method="post">
    <div class="input-group mb-2 col-md-3">
        <h3 class="text-dark"><img src="<?=base_url('lib/logos/'.$team->foto)?>" width="50px;" height="50px;"><?=$team->nombre?></h3>
    </div>
    <div class="input-group mb-2 mr-sm-2 col-md-3">
        <select data-style="btn-dark" showIcon="true" title="Agregar Jugadores" class="selectpicker show-tick form-control" data-live-search="true" name="players[]" multiple required data-selected-text-format="count > 1" data-width="auto" data-actions-box="true">
          <?php foreach ($playersLibres as $p): ?>
            <option data-tokens="first" data-content="<img src='<?=(0 == strpos($p->foto, "fifa")) ?  base_url('lib/logos/'.$p->foto) : $p->foto ?>' width='30px' height='30px'>&nbsp;&nbsp;<?=$p->nombre?>" value="<?=$p->id?>"></option>
          <?php endforeach; ?>
        </select>
    </div>
    <div class="input-group mb-2 col-md-1">
      <button type="submit" class="btn btn-dark form-control">
        <i class="opciones-nav icono-btn material-icons md-18 light600">add</i>
      </button>
    </div>
  </form>
</div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-1 p-2 list-head text-center">#</div>
      <div class="col-7 p-2 list-head text-left">Nombre</div>
      <div class="col-1 p-2 list-head text-center">Edad</div>
      <div class="col-1 p-2 list-head text-center">Nacionalidad</div>
      <div class="col-1 p-2 list-head text-center">Posición</div>
      <div class="col-1 p-2 list-head text-center">Liberar</div>
    </div>
    <?php if (isset($players)): ?>
      <?php foreach ($players as $key => $p): ?>
        <div class="row">
          <div class="col-1 p-2 text-center"><?=$key+1?></div>
          <div class="col-7 p-2 text-left">
            <img src="<?=(0 == strpos($p->foto, "fifa")) ?  base_url('lib/logos/'.$p->foto) : $p->foto ?>" height="30px;" width="30px;"> <?=$p->nombre?>
          </div>
          <div class="col-1 p-2 text-center"><?=$p->edad?></div>
          <div class="col-1 p-2 text-center"><?=$p->pais?></div>
          <div class="col-1 p-2 text-center"><?=$p->pos_clave?></div>
          <div class="col-1 p-2 text-center">
            <a class="state-select nav-item btn btn-danger btn-sm"  href="<?=base_url('player/delete_player_team/'.$team->id.'/'.$p->id)?>"><i class="opciones-nav icono-btn material-icons md-18 light600">clear</i></a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</body>
