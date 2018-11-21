<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-1 p-2 list-head text-center">
        <button type="button" data-toggle="modal" data-target="#modal-add-league" class="btn btn-outline-light btn-sm">Add</button>
      </div>
      <div class="col-4 p-2 list-head">League</div>
      <div class="col-2 p-2 list-head">Created</div>
      <div class="col-1 p-2 list-head text-center">Teams</div>
      <div class="col-1 p-2 list-head text-center">Played</div>
      <div class="col-1 p-2 list-head text-center">Games</div>
      <div class="col-1 p-2 list-head text-center">Ranking</div>
      <div class="col-1 p-2 list-head text-center">Delete</div>
    </div><br>
    <?php foreach ($leagues as $key => $l): ?>
    <div class="row">
      <div class="col-1 p-1 text-center"><?= $key+1;?></div>
      <div class="col-4 p-1"><?= $l->league;?></div>
      <div class="col-2 p-1"><?= $l->created;?></div>
      <div class="col-1 p-1 text-center"><?= $l->teams;?></div>
      <div class="col-1 p-1 text-center"><?= $l->games_p.' / '.($l->games+$l->games_p)?></div>
      <div class="col-1 p-1 text-center">
        <a class="state-select nav-item btn btn-success" href="<?=base_url('games/get/'.$l->l_id)?>">
          <i class="opciones-nav icono-btn material-icons md-18 light600">visibility</i>
        </a>
      </div>
      <div class="col-1 p-1 text-center">
        <a class="state-select nav-item btn btn-warning" href="<?=base_url('ranking/get/'.$l->l_id) ?>">
          <i class="opciones-nav icono-btn material-icons md-18 light600">equalizer</i>
        </a>
      </div>
      <div class="col-1 p-1 text-center">
        <a class="state-select nav-item btn btn-dark" href="<?=base_url('league/delete/'.$l->l_id)?>">
          <i class="opciones-nav icono-btn material-icons md-18 light600">delete</i>
        </a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
    <div class="modal fade" id="modal-add-league" tabindex="-1" role="dialog" aria-labelledby="addLeagueTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add League</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-sm">
                <form id="formAddLeague" action="<?=base_url('league/add')?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" onkeyup="mayus(this);" class="form-control" name="nombre" placeholder="Nombre" required>
                  </div>
                  <div class="form-group" id="tournament">
                    <label for="nombre">Tournament</label>
                    <select class="form-control" name="tournament" required>
                      <?php foreach ($tournaments as $t): ?>
                        <option value="<?=$t->id?>"><?=$t->nombre?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group" id="seanson">
                    <label for="nombre">Seanson</label>
                    <select class="form-control" name="seanson" required>
                      <?php foreach ($seansons as $s): ?>
                        <option value="<?=$s->id?>"><?=$s->nombre?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group">
                    <label>Teams</label>
                    <select id="tokens" class="selectpicker show-tick form-control" title="Choose Teams" data-actions-box="true" data-live-search="true" name="teams[]" multiple required multiple data-selected-text-format="count > 3">
                      <?php foreach ($teams as $t): ?>
                        <?php if (!is_null($t->manager)): ?>
                          <option data-tokens="first" value="<?=$t->id?>" data-subtext="<?=$t->manager?>"><span><?=$t->nombre?></span></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button id="btn-add-league" type="submit" class="nav-item btn btn-dark"><i class="material-icons md-24 light600">save</i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
<script type="text/javascript">
  function mayus(e) {e.value = e.value.toUpperCase()}
</script>
