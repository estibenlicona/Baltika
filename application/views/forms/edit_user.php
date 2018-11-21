<div class="container">
  <div class="row justify-content-center align-items-center p-4">
    <div class="col-md-5">
      <form action="<?=base_url('users/update/'.$usuario[0]->id)?>" method="post" enctype="multipart/form-data">
        <div class="form-group text-center text-dark">
            <h1>Edit User</h1>
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
          <label>Team</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <label class="input-group-text">
                <i class="icono-btn material-icons md-24">verified_user</i>
              </label>
            </div>
            <select id="teamSelectSeacrh" showIcon="true" title="Nacionalidad" class="selectpicker show-tick form-control border" data-live-search="true" name="team" data-width="auto" data-size="10" required></select>
          </div>
          <div class="invalid-feedback"></div>
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
var base_url = "<?=base_url()?>";
//cargar combo paises
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
  $('#playerSelectSeacrh').val(<?=$usuario[0]->id_pais?>);
  $('#playerSelectSeacrh').selectpicker('refresh');
});
//Cargar combo equipos
var service = 'team/getTeamLibres/<?=$usuario[0]->id?>';
$.ajax({
   url: base_url+service,
   type:"POST",
   contentType:false,
   cache:false,
   processData:false
}).done(function(data) {
  $.each(data, function (i, item) {
    var opciones = "<option value='"+item.id+"' data-tokens='first'  data-content=\" <img src='"+((item.foto.search('fifa')>0) ? item.foto : base_url+"lib/logos/"+item.foto)+"' width='30px' height='30px'>&nbsp;&nbsp;"+item.nombre+"\"></option>";
    $('#teamSelectSeacrh').append(opciones);
  });
  $('#teamSelectSeacrh').val(<?=$usuario[0]->id_team?>);
  $('#teamSelectSeacrh').selectpicker('refresh');
});
</script>
