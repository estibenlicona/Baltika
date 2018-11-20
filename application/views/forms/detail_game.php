<div class="container-fluid">
  <div class="row p-2">
    <div class="col-md-5 text-center">
      <h1><img class="rounded" src="<?=base_url('lib/logos/'.$game->th_escudo)?>" width="100px" height="100px"><?=$game->th_nombre?></h1>
    </div>
    <div class="col-md-2 text-center p-4">
      <h1><?=$game->g_home.' - '.$game->g_away?></h1>
    </div>
    <div class="col-md-5 text-center">
      <h1><?=$game->tv_nombre?><img class="rounded" src="<?=base_url('lib/logos/'.$game->tv_escudo)?>" width="100px" height="100px"></h1>
    </div>
  </div>
</div>
<div class="container-fluid">
  <form class="form-inline p-2" action="<?=base_url('games/add_detail/'.$game->id)?>" method="post">
    <div class="input-group mb-2 mr-sm-2 col-md-3">
        <select data-style="btn-dark" showIcon="true" title="Jugador" class="selectpicker show-tick form-control" data-live-search="true" name="player" required  data-width="auto">
          <?php foreach ($players as $p): ?>
            <option data-tokens="first" data-content="<img src='<?=(0 == strpos($p->foto, "fifa")) ?  base_url('lib/logos/'.$p->foto) : $p->foto ?>' width='30px' height='30px'>&nbsp;&nbsp;<?=$p->nombre?>" value="<?=$p->id?>"></option>
          <?php endforeach; ?>
        </select>
    </div>
    <div class="input-group mb-2 mr-sm-2 col-md-2">
        <select id="evento" data-style="btn-dark" showIcon="true" title="Evento" class="selectpicker show-tick form-control" data-live-search="true" name="evento" required data-width="auto">
          <?php foreach ($eventos as $e): ?>
            <option data-tokens="first" data-content="<img src='<?=base_url('lib/logos/'.$e->foto) ?>' width='30px' height='30px'>&nbsp;&nbsp;<?=$e->nombre?>" <?= ($e->id==3) ? 'selected' : '' ;?> value="<?=$e->id?>"></option>
          <?php endforeach; ?>
        </select>
    </div>
    <input id="cantidad" type="number" name="cant_event"  min="1" max="<?=$this->session->userdata('max_event')?>" class="form-control mb-2 mr-sm-2 p-2 col-md-1" placeholder="Cantidad">
    <div class="mb-2 mr-sm-2 col-md-1">
      <button type="submit" class="btn btn-dark form-control">
        <i class="opciones-nav icono-btn material-icons md-18 light600">add</i>
      </button>
    </div>
  </form>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-1 p-2 list-head text-center">#</div>
    <div class="col-4 p-2 list-head text-left">Equipo</div>
    <div class="col-4 p-2 list-head text-left">Jugador</div>
    <div class="col-1 p-2 list-head text-center">Evento</div>
    <div class="col-1 p-2 list-head text-center">Cantidad</div>
    <div class="col-1 p-2 list-head text-center">Away Team</div>
  </div>
  <?php foreach ($details as $key => $d): ?>
    <div class="row">
      <div class="col-1 p-2 text-center"><?=$key+1?></div>
      <div class="col-4 p-2 text-left"><img class="rounded" src="<?=base_url('lib/logos/'.$d->f_equipo)?>" width="40px" height="40px"><?=$d->n_equipo?></div>
      <div class="col-4 p-2 text-left"><img class="rounded" src="<?=(0 == strpos($d->f_jugador, "fifa")) ?  base_url('lib/logos/'.$d->f_jugador) : $d->f_jugador ?>" width="40px" height="40px"><?=$d->n_jugador?></div>
      <div class="col-1 p-2 text-center"><img class="rounded" src="<?=base_url('lib/logos/'.$d->f_evento)?>" width="35px" height="35px"></div>
      <div class="col-1 p-2 text-center"><?=$d->e_cantidad?></div>
      <div class="col-1 p-2 text-center">
          <a class="state-select nav-item btn btn-danger btn-sm"  href="<?=base_url('games/delete_detail/'.$d->partido.'/'.$d->id_jugador.'/'.$d->id_evento)?>"><i class="opciones-nav icono-btn material-icons md-18 light600">clear</i></a>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<script type="text/javascript">
$('#evento').on('change',function(e){
  var val = $(this).val();
  if (val==3 || val == 4) {
    $('#cantidad').val(1);
    $('#cantidad').attr('min',1);
    $('#cantidad').attr('max',<?=$this->session->userdata('max_event')?>);
  }
  if(val==2){
    $('#cantidad').val(1);
    $('#cantidad').attr('max',2);
    $('#cantidad').attr('min',1);
  }
  if (val==1) {
    $('#cantidad').val(1);
    $('#cantidad').attr('min',1);
    $('#cantidad').attr('max',1);
  }
});
</script>
