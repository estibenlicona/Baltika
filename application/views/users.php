<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-1 p-2 list-head text-center">
        <a class="btn btn-outline-light btn-smelect nav-item btn btn-dark editar btn-sm" href="<?=base_url('users/create')?>" >Add</a>
      </div>
      <div class="col-2 p-2 list-head">User</div>
      <div class="col-2 p-2 list-head">Team</div>
      <div class="col-1 p-2 list-head">Pais</div>
      <div class="col-2 p-2 list-head">Created</div>
      <div class="col-1 p-2 list-head">Rol</div>
      <div class="col-1 p-2 list-head text-right">Edit</div>
      <div class="col-1 p-2 list-head text-center">Status</div>
      <div class="col-1 p-2 list-head text-left">Delete</div>
    </div>
    <?php foreach ($this->session->userdata('usuarios') as  $key => $u): ?>
    <div class="row">
    <div class="col-1 p-1 text-center"><?=$key+1?></div>
    <div class="col-2 p-1">
      <img id="fotoModal" src="<?=base_url('lib/logos/'.$u->foto) ?>" width="40px" height="40px" class="img-fluid" alt="Responsive image">  @<?=$u->username?>
    </div>
    <div class="col-2 p-1 ">
      <?php if ($u->id_team != 0): ?>
          <?=$u->nombre_team?>
      <?php else: ?>
          <kbd class="bg-danger">Not select</kbd>
      <?php endif; ?>
    </div>
    <div class="col-1 p-1 "><?=$u->pais?></div>
    <div class="col-2 p-1 "><?=$u->date_create?></div>
    <div class="col-1 p-1 ">
      <?php if ($u->rol==1): ?>
          <kbd class="bg-danger">Admin</kbd>
      <?php else: ?>
          <kbd class="bg-success">Player</kbd>
      <?php endif; ?>
    </div>
    <div class="col-1 p-1 text-right">
      <a class="state-select nav-item btn btn-dark editar btn-sm" href="<?=base_url('users/edit/'.$u->id)?>" ><i class="opciones-nav icono-btn material-icons md-18 light600">edit</i></a>
    </div>
    <div class="col-1 p-1 text-center">
      <?php  if ($u->rol==1): ?>
      <a href="#" class="btn btn-danger btn-sm">
        <i class="opciones-nav icono-btn material-icons md-18 light600">lock</i>
      </a>
      <?php endif; ?>
      <?php  if ($u->estado == 1 && $u->rol!=1): ?>
      <a href="<?=base_url('users/status/'.$u->id.'/0') ?>" class="btn btn-primary btn-sm">
        <i class="opciones-nav icono-btn material-icons md-18 light600">check</i>
      </a>
      <?php endif; ?>
      <?php if ($u->estado == 0 && $u->rol!=1): ?>
      <a href="<?=base_url('users/status/'.$u->id.'/1') ?>" class="btn btn-danger btn-sm">
        <i class="opciones-nav icono-btn material-icons md-18 light600">check_box_outline_blank</i>
      </a>
      <?php endif; ?>
    </div>
    <div class="col-1 p-1 text-left">
      <a class="state-select nav-item btn btn-dark editar btn-sm" href="<?=base_url('users/status/'.$u->id.'/2')?>" ><i class="opciones-nav icono-btn material-icons md-18 light600">delete</i></a>
    </div>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="modal fade" id="state-league" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Estas Seguro?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Estas a punto de selecionar esta liga como la liga actual en juego.
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-danger">No</button>
          <button id="estadoLeague" type="button" data-dismiss="modal" class="btn btn-primary dark">Si</button>
        </div>
      </div>
    </div>
  </div>
  <div id="editLeagueModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editLeagueTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editLeagueTitle">Edit League</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-sm">
              <form id="formEditLeague" enctype="multipart/form-data">
                <div class="form-group" id="editId">
                  <label for="editId">Id</label>
                  <input name="editId" class="form-control" readonly>
                  <div class="invalid-feedback"></div>
                </div>
                <div class="form-group" id="editNombre">
                  <label for="editNombre">Name</label>
                  <input name="editNombre" class="form-control" placeholder="Nombre">
                  <div class="invalid-feedback"></div>
                </div>
                <div class="form-group" id="editSocial">
                  <label for="editSocial">Social Networks</label>
                  <input name="editSocial" class="form-control" placeholder="www.facebook.com/group">
                  <div class="invalid-feedback">sdsdsd</div>
                </div>
                <div class="form-group" id="editLogo">
                  <label for="editLogo">Logo</label>
                  <div class="custom-file">
                    <input name="editLogo" type="file" class="custom-file-input form-control-file" id="logoInputFile" lang="es" data-show-preview="false">
                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                    <div id="logo-invalid-feedback"></div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button id="btn-edit-league" class="nav-item btn btn-dark"><i class="material-icons md-24 light600">edit</i></button>
          </div>
        </div>
      </div>
    </div>
  <div class="modal fade" id="modal-add-tournament" tabindex="-1" role="dialog" aria-labelledby="addLeagueTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">New Tournament</h5>
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
