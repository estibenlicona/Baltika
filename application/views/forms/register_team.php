<div class="container">
  <div class="row justify-content-center align-items-center p-4">
    <div class="col-md-5">
      <form action="<?=base_url('team/create')?>" method="post" enctype="multipart/form-data">
        <div class="form-group text-center text-dark">
            <h1>Create Team</h1>
        </div>
        <div class="form-group">
          <label>Nombre</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">
                <i class="icono-btn material-icons md-24">account_box</i>
              </span>
            </div>
            <input name="nombre" type="text" class="form-control rounded"  value="" placeholder="Username" aria-describedby="inputGroupPrepend" required>
          </div>
        </div>
        <div class="form-group">
          <div class="alert-error"><?=$this->session->flashdata('mensaje1')?></div>
        </div>
        <div class="form-group">
          <label for="">Foto</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <a class="input-group-text text-dark" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="icono-btn material-icons md-24">visibility</i>
              </a>
            </div>
            <div class="custom-file">
              <input name="foto" type="file" class="custom-file-input" id="foto" aria-describedby="inputGroupFileAddon01" required>
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="alert-error"><?=$this->session->flashdata('mensaje2')?></div>
        </div>
        <div class="form-group">
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn bg-dark rounded">
              Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#foto').on('change',function(e){
  var fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').html(fileName);
})

</script>
