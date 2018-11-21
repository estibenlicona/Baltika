<div class="container">
  <div class="row justify-content-center align-items-center p-4">
    <div class="col-md-5">
      <form action="<?=base_url('users/add')?>" method="post" enctype="multipart/form-data">
        <div class="form-group text-center text-dark">
            <h1>Create Account</h1>
        </div>
        <div class="form-group">
          <label>Nacionalidad</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <label class="input-group-text">
                <i class="icono-btn material-icons md-24">flag</i>
              </label>
            </div>
            <select id="playerSelectSeacrh" showIcon="true" title="Nacionalidad" class="selectpicker show-tick form-control border" data-live-search="true" name="pais" data-width="auto" data-size="10" required></select>
          </div>
          <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
          <label>Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="icono-btn material-icons md-24">account_box</i>
              </span>
            </div>
            <input name="username" type="text" class="form-control rounded" placeholder="Username" required>
            <div class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="icono-btn material-icons md-24">account_box</i>
              </span>
            </div>
            <input name="password" type="password" class="form-control rounded" placeholder="Password" required>
            <div class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
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
              <input name="foto" type="file" class="custom-file-input" id="foto" required>
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
var base_url = "<?=base_url()?>";
var service = 'paises/get';
$.ajax({
   url: base_url+service,
   type:"POST",
   contentType:false,
   cache:false,
   processData:false
}).done(function(data) {
  $.each(data, function (i, item) {
    var opciones = "<option value='"+item.id+"' data-tokens='first'  data-content=\" <img src='"+((item.foto.search('fifa')>0) ? item.foto : base_url+"lib/logos/"+item.foto)+"' width='40px' height='25px'>&nbsp;&nbsp;"+item.nombre+"\"></option>";
    $('#playerSelectSeacrh').append(opciones);
  });
  $('#playerSelectSeacrh').selectpicker('refresh');
});
</script>
