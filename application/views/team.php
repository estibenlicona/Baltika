<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <nav class="navbar navbar-light bg-light">
        <div class="col-sm">
            <button type="button" data-toggle="modal" data-target="#modal-add-team" class="nav-item btn btn-dark"><i class="opciones-nav icono-btn material-icons md-18 light600">add_box</i></button>
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
            <td class="league-column">Team</td>
            <td class="created-column">Manager</td>
            <td class="teams-column">created</td>
            <td class="playedgames-column">Edit</td>
            <td class="game-column">Delete</td>
            <td class="space-column"></td>
          </tr>
        <?php foreach ($teams as $t): ?>
          <tr class="table-body-list">
            <td class="space-column"></td>
            <td class="id-column"><span><?=$t->t_id?></span></td>
            <td class="seanson-column"><span><?=$t->team;?></span></td>
            <td class="date-column"><span id="<?=$t->m_id?>"><?=$t->manager;?></span></td>
            <td class="date-column"><?=$t->created;?></td>
            <td class="state-column">
              <a class="state-select nav-item btn btn-dark editar" href="#" data-toggle="modal" data-target="#modal-edit-team">
                <i class="opciones-nav icono-btn material-icons md-18 light600">edit</i></a>
            </td>
            <td class="state-column">
              <a class="state-select nav-item btn btn-dark"  href="<?=base_url('team/delete/').$t->t_id?>">
                <i class="opciones-nav icono-btn material-icons md-18 light600">delete_outline</i></a>
            </td>
            <td class="space-column"></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="modal fade" id="modal-add-team" tabindex="-1" role="dialog" aria-labelledby="addLeagueTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Create Team</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-sm">
                <form action="<?=base_url('team/add')?>" method="post">
                  <div class="form-group" id="nombre">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="" placeholder="Nombre">
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group" id="nombre">
                    <label for="nombre">Manager</label>
                    <select class="form-control" name="manager">
                      <?php foreach ($managers as $m): ?>
                        <option value="<?=$m->id_manager?>"><?=$m->manager?></option>
                      <?php endforeach; ?>
                    </select>
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
    <div class="modal fade" id="modal-edit-team" tabindex="-1" role="dialog" aria-labelledby="addLeagueTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Edit Team</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-sm">
                <form action="<?=base_url('team/edit')?>" method="post">
                  <div class="form-group" id="editId">
                    <label for="nombre">Id</label>
                    <input type="text" class="form-control" name="id" readonly>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group" id="editNombre">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group" id="editManager">
                    <label for="nombre">Manager</label>
                    <select class="form-control" name="manager">
                      <?php foreach ($managers as $m): ?>
                        <option value="<?=$m->id_manager?>"><?=$m->manager?></option>
                      <?php endforeach; ?>
                    </select>
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
</body>
<script type="text/javascript">
$(".editar").click(function(){
  $("#editId input").val($(this).parents("tr").find("td > span").eq(0).html());
  $("#editNombre input").val($(this).parents("tr").find("td > span").eq(1).html());
  $("#editManager select").val($(this).parents("tr").find("td > span").eq(2).attr('id'));
});
</script>
