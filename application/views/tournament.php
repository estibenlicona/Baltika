<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-1 p-2 list-head text-center">
        <button type="button" data-toggle="modal" data-target="#modal-add-tournament" class="btn btn-outline-light btn-sm">Add</button>
      </div>
      <div class="col-8 p-2 list-head">League</div>
      <div class="col-1 p-2 list-head">Social</div>
      <div class="col-1 p-2 list-head">Edit</div>
      <div class="col-1 p-2 list-head">Delete</div>
    </div>
    <br>
    <?php foreach ($leagues as  $key => $d): ?>
    <div class="row">
      <div class="col-1 p-1 text-center"><?=$key+1?></div>
      <div class="col-8 p-1" id="<?=$d->id?>"><img src="<?=base_url('lib/logos/').$d->logo?>" width="50" height="50"><span><?= $d->nombre;?></span></div>
      <div class="col-1 p-1 text-left">
        <a class="nav-item btn btn-dark" href="<?=$d->social_network;?>">
          <i class="opciones-nav icono-btn material-icons md-18 light600 editar">public</i>
        </a>
      </div>
      <div class="col-1 p-1 text-left">
        <a href="#" class="state-select nav-item btn btn-dark editar" data-toggle="modal" data-target="#editLeagueModal" href="#">
          <i class="opciones-nav icono-btn material-icons md-18 light600">edit</i>
        </a>
      </div>
      <div class="col-1 p-1 text-left">
        <a class="state-select nav-item btn btn-dark" href="<?=base_url('tournament/delete/').$d->id?>">
          <i class="opciones-nav icono-btn material-icons md-18 light600">delete_outline</i>
        </a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="modal fade" id="state-league" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Estas Seguro?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Estas a punto de selecionar esta liga como la liga actual en juego.
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-danger">No</button>
          <button id="estadoLeague" type="button" data-dismiss="modal" class="btn btn-primary dark">Si</button>
        </div>
      </div>
    </div>
  </div>
  <div id="editLeagueModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editLeagueTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editLeagueTitle">Edit League</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-sm">
              <form id="formEditLeague" enctype="multipart/form-data">
                <div class="form-group" id="editId">
                  <label for="editId">Id</label>
                  <input name="editId" class="form-control" readonly>
                  <div class="invalid-feedback"></div>
                </div>
                <div class="form-group" id="editNombre">
                  <label for="editNombre">Name</label>
                  <input name="editNombre" class="form-control" placeholder="Nombre">
                  <div class="invalid-feedback"></div>
                </div>
                <div class="form-group" id="editSocial">
                  <label for="editSocial">Social Networks</label>
                  <input name="editSocial" class="form-control" placeholder="www.facebook.com/group">
                  <div class="invalid-feedback">sdsdsd</div>
                </div>
                <div class="form-group" id="editLogo">
                  <label for="editLogo">Logo</label>
                  <div class="custom-file">
                    <input name="editLogo" type="file" class="custom-file-input form-control-file" id="logoInputFile" lang="es" data-show-preview="false">
                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                    <div id="logo-invalid-feedback"></div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button id="btn-edit-league" class="nav-item btn btn-dark"><i class="material-icons md-24 light600">edit</i></button>
          </div>
        </div>
      </div>
    </div>
  <div class="modal fade" id="modal-add-tournament" tabindex="-1" role="dialog" aria-labelledby="addLeagueTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">New Tournament</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-sm">
              <form id="formAddLeague" enctype="multipart/form-data">
                <div class="form-group" id="nombre">
                  <label for="nombre">Name</label>
                  <input name="nombre" class="form-control" placeholder="Nombre">
                  <div class="invalid-feedback"></div>
                </div>
                <div class="form-group" id="social">
                  <label for="social">Social Networks</label>
                  <input name="social" class="form-control" placeholder="www.facebook.com/group">
                  <div class="invalid-feedback">sdsdsd</div>
                </div>
                <div class="form-group" id="logo">
                  <label for="logo">Logo</label>
                  <div class="custom-file">
                    <input name="logo" type="file" class="custom-file-input form-control-file" id="addlogoInputFile" lang="es" data-show-preview="false">
                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                    <div id="logo-invalid-feedback"></div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button id="btn-add-league" class="nav-item btn btn-dark"><i class="material-icons md-24 light600">save</i></button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
  (function ($) {
    $(".editar").click(function(){
      $("#editId input").val($(this).parent().siblings().eq(1).attr('id'));
      $("#editNombre input").val($(this).parent().siblings().eq(1).find("span").html());
      $("#editSocial input").val($(this).parent().siblings().eq(2).find("a").attr("href"));
    });

    //Editar de Liga
    $("#formEditLeague").submit(function(ev) {
      envioDatosAjax(this,ev,'<?= base_url("Tournament/edit")?>','#editNombre','#editSocial','#editLogo');
    });

    //Registro de Liga
    $("#formAddLeague").submit(function(ev) {
      envioDatosAjax(this,ev,'<?= base_url("Tournament/add")?>','#nombre','#social','#logo');
    });
    //Se validan los cambios en el input-file
    $('#logoInputFile').on('change',function(){
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').html(fileName);
    })
    //Se validan los cambios en el input-file
    $('#addlogoInputFile').on('change',function(){
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').html(fileName);
    })

    function envioDatosAjax(form,ev,destino,nombre,social,logo) {
      $(nombre+' > input').removeClass('is-invalid');
      $(social+' > input').removeClass('is-invalid');
      $(logo+' > .custom-file > #logo-invalid-feedback').html('');
      $(logo+' > .custom-file > .custom-file-label').css('border-color', '#DCDCDC');
      ev.preventDefault();
      var datos = new FormData(form);
      $.ajax({
        url:destino,
        type:'POST',
        data:datos,
        contentType:false,
        cache:false,
        processData:false,
        success: function (resp) {
          var json = JSON.parse(resp);
          window.location.replace(json.url);
        },
        statusCode:{
          400: function(xhr) {
            console.log(xhr);
            var json = JSON.parse(xhr.responseText);
            if (json.nombre.length != 0) {
              $(nombre+' > div').html(json.nombre);
              $(nombre+' > input').addClass('is-invalid');
            }
            if (json.social.length != 0) {
              $(social+' > div').html(json.social);
              $(social+' > input').addClass('is-invalid');
            }
            if (json.typeImagen == 'ext_invalid') {
              $(logo+' > .custom-file > #logo-invalid-feedback').html('Solo se permiten imagenes en PNG');
              $(logo+' > .custom-file > .custom-file-label').css('border-color', '#dc3545');
            }
          }
        }
      })
    }
   $("#estadoLeague").click(function () {
      $.ajax({
        url:"<?= base_url('Tournament/state_league') ?>",
        type:'POST',
        data:{id:$(".table-body-list-select > .id-column").html()},
        success: function (resp) {
          var json = JSON.parse(resp);
          window.location.replace(json.url);
        }
      })
    });
    //Acciona el submit del formulario de registro de league al hacer click en el boton #btn-add-league, qu se encuentra por fuera del formulario
    $("#btn-add-league").click(function () {$("#formAddLeague").submit();});
    $("#btn-edit-league").click(function () {$("#formEditLeague").submit();});
    $(".table-body-list").click(function () {
      $(".table-body-list").removeClass("table-body-list-select");
      $(this).addClass("table-body-list-select");
    })
  })(jQuery)
</script>
