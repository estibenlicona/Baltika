<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-1 p-2 list-head text-center">
        <button type="button" data-toggle="modal" data-target="#modal-add-manager" class="btn btn-outline-light btn-sm">Add</button>
      </div>
      <div class="col-5 p-2 list-head">Manager</div>
      <div class="col-2 p-2 list-head">Nationality</div>
      <div class="col-2 p-2 list-head">Created</div>
      <div class="col-1 p-2 list-head text-center">Edit</div>
      <div class="col-1 p-2 list-head text-center">Delete</div>
    </div><br>
    <?php foreach ($managers as $key => $m): ?>
    <div class="row">
      <div class="col-1 p-1 text-center"><?=$key+1?></div>
      <div class="col-5 p-1" id="<?=$m->id_manager?>"><?=$m->manager?></div>
      <div class="col-2 p-1" id="<?=$m->id_pais?>"><?=$m->nacionalidad?></div>
      <div class="col-2 p-1"><?=$m->created?></div>
      <div class="col-1 p-1 text-center">
        <a class="state-select nav-item btn btn-dark editar" data-toggle="modal" data-target="#modal-edit-manager">
          <i class="opciones-nav icono-btn material-icons md-18 light600">edit</i>
        </a></div>
      <div class="col-1 p-1 text-center">
        <a class="state-select nav-item btn btn-dark" href="<?=base_url('manager/delete/').$m->id_manager?>">
          <i class="opciones-nav icono-btn material-icons md-18 light600">delete_outline</i>
        </a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
    <div class="modal fade" id="modal-add-manager" tabindex="-1" role="dialog" aria-labelledby="addLeagueTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Manager</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-sm">
                <form action="<?=base_url('manager/add')?>" method="post">
                  <div class="form-group" id="nombre">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group" id="nacionalidad">
                    <label for="nombre">Nacionalidad</label>
                    <select class="form-control" name="nacionalidad">
                      <?php foreach ($paises as $p): ?>
                        <option value="<?=$p->id?>"><?=$p->nombre?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="nav-item btn btn-dark float-right"><i class="material-icons md-24 light600">save</i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="modal fade" id="modal-edit-manager" tabindex="-1" role="dialog" aria-labelledby="addLeagueTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Edit Manager</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-sm">
                <form action="<?=base_url('manager/edit')?>" method="post">
                  <div class="form-group" id="editId">
                    <label for="nombre">Id</label>
                    <input type="text" class="form-control" name="id" placeholder="Nombre" readonly>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group" id="editNombre">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group" id="editNacionalidad">
                    <label for="nombre">Nacionalidad</label>
                    <select class="form-control" name="nacionalidad">
                      <?php foreach ($paises as $p): ?>
                        <option value="<?=$p->id?>"><?=$p->nombre?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="nav-item btn btn-dark float-right"><i class="material-icons md-24 light600">edit</i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
<script type="text/javascript">
  $(".editar").click(function(){
    $("#editId input").val($(this).parent().siblings().eq(1).attr('id'));
    $("#editNombre input").val($(this).parent().siblings().eq(1).html());
    $("#editNacionalidad select").val($(this).parent().siblings().eq(2).attr('id'));
  });
</script>
