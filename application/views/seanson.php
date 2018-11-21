<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-1 p-2 list-head text-center">
        <button type="button" data-toggle="modal" data-target="#modal-add-seanson" class="btn btn-outline-light btn-sm">Add</button>
      </div>
      <div class="col-7 p-2 list-head">Seanson</div>
      <div class="col-2 p-2 list-head">Created</div>
      <div class="col-1 p-2 list-head">Edit</div>
      <div class="col-1 p-2 list-head">Delete</div>
    </div>
    <br>
    <?php foreach ($seansons as  $key => $s): ?>
    <div class="row">
      <div class="col-1 p-1 text-center"><?=$key+1?></div>
      <div class="col-7 p-1" id="<?=$s->id?>"><?= $s->nombre;?></div>
      <div class="col-2 p-1 text-left"><?= $s->date;?></div>
      <div class="col-1 p-1 text-left">
        <a href="#" class="state-select nav-item btn btn-dark editar" data-toggle="modal" data-target="#modal-edit-seanson" href="#">
          <i class="opciones-nav icono-btn material-icons md-18 light600">edit</i>
        </a>
      </div>
      <div class="col-1 p-1 text-left">
        <a class="state-select nav-item btn btn-dark" href="<?=base_url('seanson/delete/').$s->id?>">
          <i class="opciones-nav icono-btn material-icons md-18 light600">delete_outline</i>
        </a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
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
              <input type="text" onkeyup="mayus(this);" class="form-control" name="nombre" placeholder="Nombre" required>
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
              <input id="nombre" onkeyup="mayus(this);" type="text"class="form-control" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary dark float-right"><i class="opciones-nav icono-btn material-icons md-24 light600">edit</i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
  $(".editar").click(function(){
    $("#id").val($(this).parent().siblings().eq(1).attr('id'));
    $("#nombre").val($(this).parent().siblings().eq(1).html());
  });
  function mayus(e) {e.value = e.value.toUpperCase()}
</script>
