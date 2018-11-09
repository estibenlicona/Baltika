<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <nav class="navbar navbar-light bg-light">
        <div class="col-sm">
            <a href="#" data-toggle="modal" data-target="#modal-add-seanson" class="nav-item btn btn-dark"><i class="opciones-nav icono-btn material-icons md-18 light600">add_box</i></a>
        </div>
      </nav>
    </div>
  </nav>
  <div class="modal fade" id="modal-add-seanson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Seanson</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?=base_url('seanson/add');?>" method="post">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text"class="form-control" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
              <button id="estadoLeague" type="submit" class="btn btn-primary dark float-right"><i class="opciones-nav icono-btn material-icons md-24 light600">save</i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-edit-seanson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Seanson</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?=base_url('seanson/edit');?>" method="post">
            <div class="form-group">
              <label>Id</label>
              <input id="id" type="text"class="form-control" name="id" readonly>
            </div>
            <div class="form-group">
              <label>Nombre</label>
              <input id="nombre" type="text"class="form-control" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
              <button id="estadoLeague" type="submit" class="btn btn-primary dark float-right"><i class="opciones-nav icono-btn material-icons md-24 light600">edit</i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
      <table class="table list-torneos">
        <tbody>
          <tr class="list-head">
            <td class="space-column"></td>
            <td class="id-column">Id</td>
            <td class="seanson-column">Seanson</td>
            <td class="date-column">Created</td>
            <td class="date-column">Edit</td>
            <td class="date-column">Delete</td>
            <td class="space-column"></td>
          </tr>
        <?php foreach ($seansons as $s): ?>
          <tr class="table-body-list">
            <td class="space-column"></td>
            <td class="id-column"><span><?=$s->id?></span></td>
            <td class="seanson-column"><span><?= $s->nombre;?></span></td>
            <td class="date-column"><?= $s->date;?></td>
            <td class="state-column">
              <a href="#" class="state-select nav-item btn btn-dark editar" data-toggle="modal" data-target="#modal-edit-seanson" href="#">
                <i class="opciones-nav icono-btn material-icons md-18 light600">edit</i>
              </a>
            </td>
            <td class="state-column">
              <a class="state-select nav-item btn btn-dark" href="<?=base_url('seanson/delete/').$s->id?>">
                <i class="opciones-nav icono-btn material-icons md-18 light600">delete_outline</i>
              </a>
            </td>
            <td class="space-column"></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</body>
</html>
<script type="text/javascript">

  $(".editar").click(function(){
    $("#id").val($(this).parents("tr").find("td > span").eq(0).html());
    $("#nombre").val($(this).parents("tr").find("td > span").eq(1).html());
  });

</script>
