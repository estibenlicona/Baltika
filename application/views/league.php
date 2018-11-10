<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <nav class="navbar navbar-light bg-light">
        <div class="col-sm">
            <button type="button" data-toggle="modal" data-target="#modal-add-league" class="nav-item btn btn-dark"><i class="opciones-nav icono-btn material-icons md-18 light600">add_box</i></button>
        </div>
      </nav>
    </div>
  </nav>
  <div class="row">
      <table class="table list-torneos">
        <tbody>
          <tr class="list-head">
            <td class="space-column"></td>
            <td class="id-column">Id</td>
            <td class="league-column">League</td>
            <td class="created-column">Created</td>
            <td class="teams-column">Teams</td>
            <td class="playedgames-column">Played</td>
            <td class="w-5 p-3">Games</td>
            <td class="w-5 p-3">Ranking</td>
            <td class="edit-column">Edit</td>
            <td class="delete-column">Delete</td>
            <td class="space-column"></td>
          </tr>
        <?php foreach ($leagues as $l): ?>
          <tr class="table-body-list">
            <td class="space-column"></td>
            <td class="id-column"><span><?=$l->l_id?></span></td>
            <td class="league-column"><span><?= $l->league;?></span></td>
            <td class="created-column"><span><?= $l->created;?></span></td>
            <td class="teams-column"><span><?= $l->teams;?></span></td>
            <td class="playedgames-column"><span><?= $l->games_p.' / '.$l->games?></span></td>
            <td class="w-5 p-3">
              <a href="#" class="state-select nav-item btn btn-success" href="#">
                <i class="opciones-nav icono-btn material-icons md-18 light600">remove_red_eye</i>
              </a>
            </td>
            <td class="w-5 p-3">
              <a href="#" class="state-select nav-item btn btn-warning" href="#">
                <i class="opciones-nav icono-btn material-icons md-18 light600">assessment</i>
              </a>
            </td>
            <td class="edit-column">
              <a href="#" class="state-select nav-item btn btn-dark" href="#">
                <i class="opciones-nav icono-btn material-icons md-18 light600">edit</i>
              </a>
            </td>
            <td class="delete-column">
              <a href="#" class="state-select nav-item btn btn-dark" href="#">
                <i class="opciones-nav icono-btn material-icons md-18 light600">delete</i>
              </a>
            </td>
            <td class="space-column"></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
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
                    <input type="text"class="form-control" name="nombre" placeholder="Nombre" required>
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
                    <select id="tokens" class="selectpicker form-control" data-live-search="true" name="teams[]" multiple required>
                      <?php foreach ($teams as $t): ?>
                        <option data-tokens="first" value="<?=$t->t_id?>"><span><?=$t->team.' - '.$t->manager?></span></option>
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
