<body>
  <div class="container-fluid">
    <form action="<?=base_url('games/getSeach/'.$id) ?>" method="post">
    <div class="row">
        <div class="col-4 p-2">
            <div class="form-group">
              <select id="tokens" title="Choose one team or two teams" class="selectpicker show-tick form-control" data-live-search="true" name="teams[]" multiple required data-max-options-text='Maximo dos equipos'>
                <optgroup data-max-options="2">
                  <?php foreach ($teams as $t): ?>
                  <option data-tokens="first" value="<?=$t->id?>"><span><?=$t->nombre?></span></option>
                  <?php endforeach; ?>
                </optgroup>
              </select>
            </div>
        </div>
        <div class="col-7 p-2 text-left">
          <button type="submit" class="btn btn-dark">
            <i class="opciones-nav icono-btn material-icons md-18 light600">search</i>
          </button>
        </div>
    </div>
    </form>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-3 p-2 list-head text-center">
        Date Game
      </div>
      <div class="col-2 p-2 list-head text-left">Home Team</div>
      <div class="col-1 p-2 list-head text-center">Score Home</div>
      <div class="col-1 p-2 list-head text-center">Score Away</div>
      <div class="col-2 p-2 list-head text-right">Away Team</div>
      <div class="col-1 p-2 list-head text-right">Details</div>
      <div class="col-1 p-2 list-head text-center">Played</div>
      <div class="col-1 p-2 list-head text-left">Saved</div>
    </div>
    <?php foreach ($games as $key => $g): ?>
    <form action="<?=base_url('games/saved/'.$g->id_home.'/'.$g->id_away.'/'.$g->league)?>" method="post">
    <div class="row">
      <div class="col-3 p-2 text-center">
        <?php if ($g->date_game == ''): ?>
          <kbd class="bg-warning text-dark">Not Played</kbd>
        <?php else: ?>
          <kbd><?=$g->date_game?></kbd>
        <?php endif; ?>
      </div>
      <div class="col-2 p-2 text-left"><?=$g->th_nombre?></div>
      <div class="col-1 p-2 text-center">
        <input class="form-control btn-sm text-center" type="text" value="<?=$g->g_home?>" name="g_home">
      </div>
      <div class="col-1 p-2 text-center">
        <input class="form-control btn-sm text-center" type="text" value="<?=$g->g_away?>" name="g_away">
      </div>
      <div class="col-2 p-2 text-right"><?=$g->tv_nombre?></div>
      <div class="col-1 p-2 text-right">
        <a href="<?=base_url('games/details_view/'.$g->id) ?>" class="btn btn-dark btn-sm">
          <i class="opciones-nav icono-btn material-icons md-18 light600">assignment</i>
        </a>
      </div>
      <div class="col-1 p-2 text-center">
        <?php  if ($g->played == 1): ?>
        <a href="<?=base_url('games/played/'.$g->id_home.'/'.$g->id_away.'/'.$g->league.'/0') ?>" class="btn btn-primary btn-sm">
          <i class="opciones-nav icono-btn material-icons md-18 light600">check</i>
        </a>
        <?php endif; ?>
        <?php if ($g->played == 0): ?>
        <a href="<?=base_url('games/played/'.$g->id_home.'/'.$g->id_away.'/'.$g->league.'/1') ?>" class="btn btn-danger btn-sm">
          <i class="opciones-nav icono-btn material-icons md-18 light600">check_box_outline_blank</i>
        </a>
        <?php endif; ?>
      </div>
      <div class="col-1 p-2 text-left">
        <button type="submit" name="button" class="btn btn-success btn-sm">
          <i class="opciones-nav icono-btn material-icons md-18 light600">save</i>
        </button>
      </div>
    </div>
    </form>
    <?php endforeach; ?>
  </div>
  <div class="modal fade" id="modal-add-league" tabindex="-1" role="dialog" aria-labelledby="addLeagueTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Search Games</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-sm">
              <form id="formAddLeague" action="<?=base_url('games/update')?>" method="post" enctype="multipart/form-data">
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
                <div class="form-group" id="league">
                  <label for="nombre">League</label>
                  <select class="form-control" name="league" required>
                    <?php foreach ($leagues as $l): ?>
                      <option value="<?=$l->l_id?>"><?=$l->league?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                  <label>Teams</label>
                  <select id="tokens" title="Choose one team or two teams" class="selectpicker show-tick form-control" data-live-search="true" name="teams[]" multiple required data-max-options-text='Maximo dos equipos'>
                    <optgroup data-max-options="2">
                      <?php foreach ($teams as $t): ?>
                      <option data-tokens="first" value="<?=$t->t_id?>" data-subtext="<?=$t->manager?>"><span><?=$t->team?></span></option>
                      <?php endforeach; ?>
                    </optgroup>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="nav-item btn btn-dark"><i class="material-icons md-24 light600">save</i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
