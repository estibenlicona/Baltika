<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <nav class="navbar navbar-light bg-light">
        <div class="col-sm">
          <button type="button" data-toggle="modal" data-target="#addLeague" class="nav-item btn btn-dark"><i class="opciones-nav icono-btn material-icons md-18 light600">add_box</i></button>
        </div>
      </nav>
    </div>
  </nav>
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
  <div class="modal fade" id="addLeague" tabindex="-1" role="dialog" aria-labelledby="addLeagueTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">New League</h5>
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
    <div class="row">
      <table class="table list-torneos">
        <tbody>
          <tr class="list-head">
            <td class="space-column"></td>
            <td class="id-column">Id</td>
            <td class="league-column">League</td>
            <td class="social-column">Social</td>
            <td class="state-column">Edit</td>
            <td class="state-column">Delete</td>
            <td class="space-column"></td>
          </tr>
        <?php foreach ($leagues as $key => $d): ?>
          <tr class="table-body-list">
            <td class="space-column"></td>
            <td class="id-column"><span><?=$d->id?></span></td>
            <td class="league-column"><img src="<?=base_url('lib/logos/').$d->logo?>" width="50" height="50" alt="">  <span><?= $d->nombre;?></span></td>
            <td class="socail-column">
              <a class="nav-item btn btn-dark" href="<?=$d->social_network;?>">
                <i class="opciones-nav icono-btn material-icons md-18 light600 editar">public</i>
              </a>
            </td>
            <td class="state-column">
              <a href="#" class="state-select nav-item btn btn-dark editar" data-toggle="modal" data-target="#editLeagueModal" href="#">
                <i class="opciones-nav icono-btn material-icons md-18 light600">edit</i>
              </a>
            </td>
            <td class="state-column">
              <a class="state-select nav-item btn btn-dark" href="<?=base_url('tournament/delete/').$d->id?>">
                <i class="opciones-nav icono-btn material-icons md-18 light600">delete_outline</i></a>
            </td>
            <td class="space-column"></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
<script type="text/javascript">
  (function ($) {
    $(".editar").click(function(){
      $("#editId > input").val($(this).parents("tr").find("td > span").eq(0).html());
      $("#editNombre > input").val($(this).parents("tr").find("td > span").eq(1).html());
      $("#editSocial > input").val($(this).parents("tr").find("td > a").eq(0).attr('href'));
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
