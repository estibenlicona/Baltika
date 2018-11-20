<div class="container">
  <div class="row justify-content-center align-items-center p-4">
    <div class="col-md-5">
      <form action="<?=base_url('users/add')?>" method="post" enctype="multipart/form-data">
        <div class="form-group text-center text-dark">
            <h1>Create Account</h1>
        </div>
        <div class="form-group">
          <label>Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">
                <i class="icono-btn material-icons md-24">account_box</i>
              </span>
            </div>
            <input name="username" type="text" class="form-control rounded" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
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
                <i class="icono-btn material-icons md-24">account_box</i>
              </span>
            </div>
            <input name="password" type="password" class="form-control rounded" id="validationCustomUsername" placeholder="Password" aria-describedby="inputGroupPrepend" required>
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
              <?php foreach ($paises as $p): ?>
                <option value="<?=$p->id?>"><?=$p->nombre?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
          <label for="">Foto</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">
                <i class="icono-btn material-icons md-24">backup</i>
              </span>
            </div>
            <div class="custom-file">
              <input name="foto" type="file" class="custom-file-input" id="foto" aria-describedby="inputGroupFileAddon01" required>
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn bg-dark rounded">
              Create
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#foto').on('change',function(){
  var fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').html(fileName);
})
</script>
