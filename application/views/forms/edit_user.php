<div class="container">
  <div class="row justify-content-center align-items-center p-4">
    <div class="col-md-5">
      <form action="<?=base_url('users/update/'.$usuario[0]->id)?>" method="post" enctype="multipart/form-data">
        <div class="form-group text-center text-dark">
            <h1>Edit User</h1>
        </div>
        <div class="form-group">
          <label>Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">
                <i class="icono-btn material-icons md-24">account_box</i>
              </span>
            </div>
            <input name="username" type="text" class="form-control rounded"  value="<?=$usuario[0]->username?>" placeholder="Username" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">
                <i class="icono-btn material-icons md-24">lock</i>
              </span>
            </div>
            <input name="password" type="password" class="form-control rounded"  value="<?=$usuario[0]->password?>"  placeholder="Password" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Nacionalidad</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">
                <i class="icono-btn material-icons md-24">flag</i>
              </label>
            </div>
            <select name="pais" class="custom-select md-24" id="inputGroupSelect01" required>
              <?php foreach ($paises as $key => $p): ?>
                <option <?= $p->id == $usuario[0]->id_pais ? 'selected':'';?> <?= $p->id == 0 ? 'value' : 'value="'.$p->id.'"';?>><?=$p->nombre?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
          <label>Team</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect02">
                <i class="icono-btn material-icons md-24">flag</i>
              </label>
            </div>
            <select name="team" class="custom-select md-24" id="inputGroupSelect02">
              <?php foreach ($teams as $t): ?>
                <option <?= $t->id == $usuario[0]->id_team ? 'selected':'';?> <?= $t->id == 0 ? 'value' : 'value="'.$t->id.'"';?> ><?=$t->nombre?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
          <label for="">Foto</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <a class="input-group-text btn btn-info text-dark" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="icono-btn material-icons md-24">visibility</i>
              </a>
            </div>
            <div class="custom-file">
              <input name="foto" type="file" class="custom-file-input" id="foto" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn bg-dark rounded">
              Edit
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img id="fotoModal" src="<?=base_url('lib/logos/'.$usuario[0]->foto) ?>" width="300px" height="300px" class="img-fluid" alt="Responsive image">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#foto').on('change',function(e){
  var fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').html(fileName);
})

</script>
