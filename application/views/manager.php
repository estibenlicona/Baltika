<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <nav class="navbar navbar-light bg-light">
        <div class="col-sm">
            <button type="button" data-toggle="modal" data-target="#modal-add-manager" class="nav-item btn btn-dark"><i class="opciones-nav icono-btn material-icons md-18 light600">add_box</i></button>
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
            <td class="manager-column">Manager</td>
            <td class="created-column">Nacionalidad</td>
            <td class="teams-column">Created</td>
            <td class="teams-column">Editar</td>
            <td class="teams-column">Eliminar</td>
            <td class="space-column"></td>
          </tr>
        <?php foreach ($managers as $m): ?>
          <tr class="table-body-list">
            <td class="space-column"></td>
            <td class="id-column"><span><?=$m->id_manager?></span></td>
            <td class="manager-column"><span><?=$m->manager?></span></td>
            <td class="manager-column"><span id="<?=$m->id_pais?>"><?=$m->nacionalidad?></span></td>
            <td class="date-column"><?=$m->created?></td>
            <td class="state-column">
              <a class="state-select nav-item btn btn-dark editar" data-toggle="modal" data-target="#modal-edit-manager">
                <i class="opciones-nav icono-btn material-icons md-18 light600">edit</i></a>
            </td>
            <td class="state-column">
              <a class="state-select nav-item btn btn-dark" href="<?=base_url('manager/delete/').$m->id_manager?>">
                <i class="opciones-nav icono-btn material-icons md-18 light600">delete_outline</i></a>
            </td>
            <td class="space-column"></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
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
    $("#editId input").val($(this).parents("tr").find("td > span").eq(0).html());
    $("#editNombre input").val($(this).parents("tr").find("td > span").eq(1).html());
    $("#editNacionalidad select").val($(this).parents("tr").find("td > span").eq(2).attr('id'));
  });
</script>
