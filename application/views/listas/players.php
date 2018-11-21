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
