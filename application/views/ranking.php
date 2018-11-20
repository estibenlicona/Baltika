<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-1 p-2 list-head text-center">#</div>
      <div class="col-3 p-2 list-head text-left">Team</div>
      <div class="col-1 p-2 list-head text-center">PTs</div>
      <div class="col-1 p-2 list-head text-center">PJ</div>
      <div class="col-1 p-2 list-head text-center">PG</div>
      <div class="col-1 p-2 list-head text-center">PP</div>
      <div class="col-1 p-2 list-head text-center">PE</div>
      <div class="col-1 p-2 list-head text-center">GF</div>
      <div class="col-1 p-2 list-head text-center">GC</div>
      <div class="col-1 p-2 list-head text-center">GD</div>
    </div>
    <?php foreach ($ranking as $key => $r): ?>
      <div class="row <?= $key==0?'primeros':'';?>">
        <div class="col-1 p-2 text-center "><?=$key+1?></div>
        <div class="col-3 p-2 text-left"><img height="30px;" width="30px;" src="<?=base_url('lib/logos/'.$r->escudo)?>"> <?=$r->team?>
          <?php if ($key==0): ?>
            <img class="rounded float-right" height="30px;" width="30px;" src="<?=base_url('lib/logos/torneo.png')?>">
          <?php endif; ?>
        </div>
        <div class="col-1 p-2 text-center"><?=$r->puntos?></div>
        <div class="col-1 p-2 text-center"><?=$r->p_jugados?></div>
        <div class="col-1 p-2 text-center"><?=$r->p_ganados?></div>
        <div class="col-1 p-2 text-center"><?=$r->p_perdidos?></div>
        <div class="col-1 p-2 text-center"><?=$r->p_empatados?></div>
        <div class="col-1 p-2 text-center"><?=$r->g_favor?></div>
        <div class="col-1 p-2 text-center"><?=$r->g_contra?></div>
        <div class="col-1 p-2 text-center"><?=$r->g_diferencia?></div>
      </div>
    <?php endforeach; ?>
  </div>
</body>
