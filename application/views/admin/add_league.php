<?= $header?>
<?= $menu ?>
<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container">
      <div class="col-sm opciones-nav">
        <button type="button" class="nav-item btn btn-success"><i class="material-icons md-24 light600">save</i></button>
        <button type="button" class="nav-item btn btn-info"><i class="material-icons md-24 light600">add_box</i></button>
        <button type="button" class="nav-item btn btn-danger"><i class="material-icons md-24 light600">delete_forever</i></button>
      </div>
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="<?=$url_base?>lib\logos\torneo.png" width="50" height="50" class="d-inline-block align-top" alt="">
          <span id="title">Torneo</span>
        </a>
      </nav>
    </div>
  </nav>
  <br>
  <div class="container">
    <br>
    <div class="row">
      <div class="col-sm">
        <form id="formTorneo" action="<?=$url_base?>admin/torneo" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input name="nombre" class="form-control" id="nombre" placeholder="Nombre...">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="logo">Logo</label>
            <input id="logo" name="logo" type="file" class="file light600" data-show-preview="false">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<?=$footer?>
</html>
<script type="text/javascript">
$('#logo').fileinput({
    showUpload:false,
    showRemove:false
});
$("#guardar").click(function () {
  $("#formTorneo").submit();
})
</script>
