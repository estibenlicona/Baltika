<?= $header?>
<?= $menu ?>
<body>
  <nav class="navbar navbar-light bg-light">
   <div class="col-sm">
     <button type="button" class="nav-item btn btn-success"><i class="material-icons md-24 light600">save</i></button>
     <button type="button" class="nav-item btn btn-info"><i class="material-icons md-24 light600">add_box</i></button>
     <button type="button" class="nav-item btn btn-danger"><i class="material-icons md-24 light600">delete_forever</i></button>
   </div>
  </nav>
  <br>
  <div class="container">
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
            <input id="file-input" name="file-input" type="file" class="file light600" data-show-preview="false">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<?=$footer?>
</html>
<script type="text/javascript">
$('#file-input').fileinput({
    showUpload:false,
    showRemove:false
});
</script>
