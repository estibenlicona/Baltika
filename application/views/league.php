<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <nav class="navbar navbar-light bg-light">
        <div class="col-sm">
          <form action="<?=base_url('Seanson/add')?>">
            <button type="submit" data-toggle="modal" class="nav-item btn btn-dark"><i class="opciones-nav icono-btn material-icons md-18 light600">add_box</i></button>
          </form>
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
            <td class="seanson-column">Seanson</td>
            <td class="game-column">Game</td>
            <td class="scoretables-column">Score Tables</td>
            <td class="teams-column">Teams</td>
            <td class="playedgames-column">Played/Games</td>
            <td class="space-column"></td>
          </tr>
          <!--
        <?php foreach ($seansons as $s): ?>
          <tr class="table-body-list">
            <td class="space-column"></td>
            <td class="id-column"><?=$s->id?></td>
            <td class="seanson-column">Seanson #<span><?= $s->pos;?></span></td>
            <td class="date-column"><?= $s->date;?></td>
            <td class="state-column">
              <a class="state-select nav-item btn btn-dark" href="<?=base_url('seanson/delete/').$s->id?>">
                <i class="opciones-nav icono-btn material-icons md-18 light600">delete_outline</i></a>
            </td>
            <td class="space-column"></td>
          </tr>
        <?php endforeach; ?>
        -->
        </tbody>
      </table>
    </div>
    <div class="modal fade" id="modal-add-league" tabindex="-1" role="dialog" aria-labelledby="addLeagueTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">New League</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-sm">
                <form id="formAddLeague" enctype="multipart/form-data">
                  <div class="form-group" id="nombre">
                    <label for="nombre">Name</label>
                    <input name="nombre" class="form-control" placeholder="Nombre">
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group" id="social">
                    <label for="social">Social Networks</label>
                    <input name="social" class="form-control" placeholder="www.facebook.com/group">
                    <div class="invalid-feedback">sdsdsd</div>
                  </div>
                  <div class="form-group" id="logo">
                    <label for="logo">Logo</label>
                    <div class="custom-file">
                      <input name="logo" type="file" class="custom-file-input form-control-file" id="addlogoInputFile" lang="es" data-show-preview="false">
                      <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                      <div id="logo-invalid-feedback"></div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button id="btn-add-league" class="nav-item btn btn-dark"><i class="material-icons md-24 light600">save</i></button>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
