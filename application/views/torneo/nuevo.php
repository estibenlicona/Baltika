<?= $header?>
<?= $menu ?>
<body>
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="<?=$url_base?>lib\logos\torneo.png" width="50" height="50" class="d-inline-block align-top" alt="">
      <span>Registrar Torneo</span>
   </a>
  </nav>
  <br>
  <div class="container">
    <nav class="row">
      <div class="col-sm">
        <button type="button" class="nav-item btn btn-success"><i class="material-icons md-36 light600">save</i></button>
        <button type="button" class="nav-item btn btn-info"><i class="material-icons md-36 light600">add_box</i></button>
        <button type="button" class="nav-item btn btn-danger"><i class="material-icons md-36 light600">delete_forever</i></button>
      </div>
    </nav>
    <br>
    <div class="row">
      <div class="col-sm">
        <form>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nombre del torneo</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nombre...">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripcion</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Logo</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFileLang" lang="es">
              <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Usuario</label>
            <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Fecha</label>
            <input class="form-control" id="disabledInput" type="text" value="<?= date("d") . " del " . date("m") . " de " . date("Y"); ?>" disabled>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
  $custom-file-text: (
  en: "Browse",
  es: "Elegir"
  );
</script>
