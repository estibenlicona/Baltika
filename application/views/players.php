<div class="container-fluid">
  <form action="<?=base_url('player/getPlayer')?>" method="post">
    <div class="row p-2">
      <div class="input-group mb-2 mr-sm-2 col-md-3">
          <select data-style="btn-dark" showIcon="true" title="Agregar Jugadores" class="selectpicker show-tick form-control" data-live-search="true" name="id" data-width="auto">
            <?php foreach ($players as $p): ?>
              <option data-tokens="first" data-content="<img src='<?=(0 == strpos($p->foto, "fifa")) ?  base_url('lib/logos/'.$p->foto) : $p->foto ?>' width='30px' height='30px'>&nbsp;&nbsp;<?=$p->nombre?>" value="<?=$p->id?>"></option>
            <?php endforeach; ?>
          </select>
      </div>
      <div class="input-group mb-2 col-md-1">
        <button type="submit" class="btn btn-dark form-control">
          <i class="opciones-nav icono-btn material-icons md-18 light600">search</i>
        </button>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-1 p-2 list-head text-center">
      <a class="btn btn-outline-light btn-smelect nav-item btn btn-dark editar btn-sm" href="<?=base_url('player/create_view')?>" >Add</a>
    </div>
    <div class="col-5 p-2 list-head text-left">Nombre</div>
    <div class="col-1 p-2 list-head text-center">Edad</div>
    <div class="col-1 p-2 list-head text-center">Nacionalidad</div>
    <div class="col-1 p-2 list-head text-center">Posición</div>
    <div class="col-1 p-2 list-head text-center">Edit</div>
    <div class="col-1 p-2 list-head text-center">Estado</div>
    <div class="col-1 p-2 list-head text-center">Eliminar</div>
  </div>
  <?php if (isset($players)): ?>
    <?php foreach ($players as $key => $p): ?>
      <div class="row">
        <div class="col-1 p-2 text-center"><?=$key+1?></div>
        <div class="col-5 p-2 text-left">
          <img src="<?=(0 == strpos($p->foto, "fifa")) ?  base_url('lib/logos/'.$p->foto) : $p->foto ?>" height="30px;" width="30px;"> <?=$p->nombre?>
        </div>
        <div class="col-1 p-2 text-center"><?=$p->edad?></div>
        <div class="col-1 p-2 text-center"><?=$p->pais?></div>
        <div class="col-1 p-2 text-center"><?=$p->pos_clave?></div>
        <div class="col-1 p-1 text-center">
          <a class="state-select nav-item btn btn-dark editar btn-sm" href="<?=base_url('player/edit_view/'.$p->id)?>" ><i class="opciones-nav icono-btn material-icons md-18 light600">edit</i></a>
        </div>
        <div class="col-1 p-1 text-center">
          <?php  if ($p->estado == 1): ?>
          <a href="<?=base_url('player/status/'.$p->id.'/0') ?>" class="btn btn-primary btn-sm">
            <i class="opciones-nav icono-btn material-icons md-18 light600">check</i>
          </a>
          <?php endif; ?>
          <?php if ($p->estado == 0): ?>
          <a href="<?=base_url('player/status/'.$p->id.'/1') ?>" class="btn btn-danger btn-sm">
            <i class="opciones-nav icono-btn material-icons md-18 light600">check_box_outline_blank</i>
          </a>
          <?php endif; ?>
        </div>
        <div class="col-1 p-2 text-center">
          <a class="state-select nav-item btn btn-danger btn-sm"  href="<?=base_url('player/status/'.$p->id.'/2')?>"><i class="opciones-nav icono-btn material-icons md-18 light600">clear</i></a>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
<script type="text/javascript">
  var service = "<?=base_url('player/ajaxGetPlayers')?>";
  $.ajax({
     url: service,
     type:"POST",
     contentType:false,
     cache:false,
     processData:false
  }).done(function(data) {
    console.log(data);
    console.log(data[0]['id']);
  });

</script>
