<div class="container-fluid">
  <form action="<?=base_url('player/getPlayer')?>" method="post">
    <div class="row p-2">
      <div class="col-md-3">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">
              <i class="icono-btn material-icons md-24">search</i>
            </span>
          </div>
          <input type="text" onkeyup="mayus(this);" class="form-control rounded" id="searchPlayer" placeholder="Buscar jugador ..." aria-describedby="inputGroupPrepend" required>
        </div>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-1 p-2 list-head text-center">
      <a class="btn btn-outline-light btn-smelect nav-item btn btn-dark editar btn-sm" href="<?=base_url('player/create_view')?>" >Add</a>
    </div>
    <div class="col-5 p-2 list-head text-left">Nombre</div>
    <div class="col-1 p-2 list-head text-center">Edad</div>
    <div class="col-1 p-2 list-head text-center">Nacionalidad</div>
    <div class="col-1 p-2 list-head text-center">Posición</div>
    <div class="col-1 p-2 list-head text-center">Edit</div>
    <div class="col-1 p-2 list-head text-center">Estado</div>
    <div class="col-1 p-2 list-head text-center">Eliminar</div>
  </div>
  <div id="listado"></div>
</div>
<script type="text/javascript">
var base_url = "<?=base_url()?>";
listar();
$("#searchPlayer").keyup(function () {
  var nombre = $("#searchPlayer").val();
  listar(nombre);
})

function listar(nombre='') {
  var service = "<?=base_url('player/searchKey/')?>";
  $.ajax({
     url: service+nombre,
     type:"POST",
     contentType:false,
     cache:false,
     processData:false
  }).done(function(data) {
    $("#listado").html("");
    $.each(data, function (i, item) {
      var pos = i+1;
      $("#listado").append("<div class='row'>"+"\n"+
      "<div class='col-1 p-2 text-center'>"+pos+"</div>"+"\n"+
      "<div class='col-5 p-2 text-left'><img src='"+((item.foto.search('fifa')>0) ? item.foto : base_url+"lib/logos/"+item.foto)+"' height='45px;' width='45px;'>&nbsp;&nbsp;"+item.nombre+"</div>"+"\n"+
      "<div class='col-1 p-2 text-center'>"+item.edad+"</div>"+"\n"+
      "<div class='col-1 p-2 text-center'><img src='"+item.p_foto+"' height='30px;' width='45px;'></div>"+"\n"+
      "<div class='col-1 p-2 text-center'>"+item.pos_clave+"</div>"+"\n"+
      "<div class='col-1 p-2 text-center'><a class='state-select nav-item btn btn-dark editar btn-sm' href='"+base_url+"player/edit_view/"+item.id+"'><i class='opciones-nav icono-btn material-icons md-18 light600'>edit</i></a></div>"+"\n"+
      "<div class='col-1 p-2 text-center'><a id='cambiarEstado' class='state-select nav-item btn "+((item.estado == 1) ? "btn-info" : (item.estado == 0) ? "btn-danger" : '')+" btn-sm'  href='"+base_url+"player/status/"+item.id+"/"+((item.estado == 1) ? "0" :(item.estado == 0)? "1" : '')+"'><i class='opciones-nav icono-btn material-icons md-18 light600'>"+((item.estado == 1) ? "check" : (item.estado == 0) ? "check_box_outline_blank" : '')+"</i></a></div>"+"\n"+
      "<div class='col-1 p-2 text-center'><a class='state-select nav-item btn btn-danger btn-sm'  href='"+base_url+"player/status/"+item.id+"/2'><i class='opciones-nav icono-btn material-icons md-18 light600'>clear</i></a></div>"+"\n"+
      "</div>");
    });
  });
}
function mayus(e) {e.value = e.value.toUpperCase()}
</script>
