<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <nav class="navbar navbar-light bg-light">
        <div class="col-sm">
          <button type="button" data-toggle="modal" data-target="#addLeague" class="nav-item btn btn-dark"><i class="opciones-nav icono-btn material-icons md-24 light600">add_box</i></button>
          <button id="show-edit-League" type="button" data-toggle="modal" data-target="#editLeagueModal" class="nav-item btn btn-dark"><i class="opciones-nav icono-btn material-icons md-24 light600">edit</i></button>
          <button data-toggle="modal" data-target="#state-league" type="button" class="nav-item btn btn-dark">
            <i class="opciones-nav icono-btn material-icons md-24 light600">radio_button_checked</i>
          </button>
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
                    <input name="logo" type="file" class="custom-file-input form-control-file" id="logoInputFile" lang="es" data-show-preview="false">
                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                    <div id="logo-invalid-feedback"></div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button id="btn-edit-league" class="nav-item btn btn-dark"><i class="material-icons md-24 light600">save</i></button>
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
            <td class="state-column">State</td>
            <td class="space-column"></td>
          </tr>
        <?php foreach ($leagues as $key => $d): ?>
          <tr class="table-body-list">
            <td class="space-column"></td>
            <td class="id-column"><?=$d->id?></td>
            <td class="league-column"><img src="<?=base_url('lib/logos/').$d->logo?>" width="40" height="50" alt="">  <span><?= $d->nombre;?></span></td>
            <td class="socail-column">
              <a class="nav-item btn btn-dark" href="<?= $d->social_network; ?>"><img src="<?=base_url('lib\logos\facebook.png')?>" width="30" height="30"></a>
            </td>
            <td class="state-column">
            <?php if ($d->estado == 1): ?>
              <button class="state-select nav-item btn btn-dark" type="button">
                <i id="on" class="opciones-nav icono-btn material-icons md-24 light600">radio_button_checked</i>
              </button>
            <?php endif; ?>
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
    $("#show-edit-League").click(function () {
      $("#editId > input").val($(".table-body-list-select > .id-column").html());
      $("#editNombre > input").val($(".table-body-list-select > .league-column > span").html());
      $("#editSocial > input").val($(".table-body-list-select > .socail-column > a").attr('href'));

   });

   $("#estadoLeague").click(function () {
      $.ajax({
        url:"<?= base_url('Admin/state_league') ?>",
        type:'POST',
        data:{id:$(".table-body-list-select > .input-id-column").html()},
        success: function (resp) {
          var json = JSON.parse(resp);
          window.location.replace(json.url);
        }
      })
    });

    //Se validan los cambios en el input-file
    $('#logoInputFile').on('change',function(){
        var fileName = $(this).val().split('\\').pop();;
        $(this).next('.custom-file-label').html(fileName);
    })
    //Acciona el submit del formulario de registro de league al hacer click en el boton #btn-add-league, qu se encuentra por fuera del formulario
    $("#btn-add-league").click(function () {$("#formAddLeague").submit();});
    $("#btn-edit-league").click(function () {$("#formEditLeague").submit();});

    //Editar de Liga
    $("#formEditLeague").submit(function(ev) {
      $('#editNombre > input').removeClass('is-invalid');
      $('#editSocial > input').removeClass('is-invalid');
      ev.preventDefault();
      var datos = new FormData(this);
      //datos.id = $("#editId > input").val();
      $.ajax({
        url:"<?= base_url('Admin/edit_league') ?>",
        type:'POST',
        data:datos,
        contentType:false,
        cache:false,
        processData:false,
        success: function (resp) {
          //var json = JSON.parse(resp);
          //window.location.replace(json.url);
          console.log(resp);
        },
        statusCode:{
          400: function(xhr) {
            var json = JSON.parse(xhr.responseText);
            if (json.nombre.length != 0) {
              $('#editNombre > div').html(json.nombre);
              $('#editNombre > input').addClass('is-invalid');
            }
            if (json.social.length != 0) {
              $('#editSocial > div').html(json.social);
              $('#editSocial > input').addClass('is-invalid');
            }
            if (json.typeImagen != 0) {
              $('#editLogo > .custom-file > #logo-invalid-feedback').html('Solo se permiten imagenes en PNG');
              //$('#editSocial > input').addClass('is-invalid');

            }
          }
        }
      })
    });

    //Registro de Liga
    $("#formAddLeague").submit(function(ev) {
      $('#nombre > input').removeClass('is-invalid');
      $('#social > input').removeClass('is-invalid');
      ev.preventDefault();
      $.ajax({
        url:"<?= base_url('Admin/save_league') ?>",
        type:'POST',
        data:new FormData(this),
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
              $('#nombre > div').html(json.nombre);
              $('#nombre > input').addClass('is-invalid');
            }
            if (json.social.length != 0) {
              $('#social > div').html(json.social);
              $('#social > input').addClass('is-invalid');
            }
          }
        }
      })
    });
    $(".table-body-list").click(function () {
      $(".table-body-list").removeClass("table-body-list-select");
      $(this).addClass("table-body-list-select");
    })
    setInterval(function(){
       $('#on').addClass("on600");
     }, 200);
    setInterval(function(){
       $('#on').removeClass("on600");
     }, 400);

  })(jQuery)
</script>
