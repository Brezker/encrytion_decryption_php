$(document).ready(function () {

  var subserviciosInfo = [];
  var subserviciosInfoTemp = [];
  var subserviciosInfoCount = 1;
  var total = 0;
  $("#Servicio").change(function () { //Evento onchange

    $.get("../Controlador/subservicio2.php", "Servicio=" + $("#Servicio").val(), //Peticion
      function (equis) { //onSuccess
        var json = JSON.parse(equis);
        subserviciosInfo = json;
        // for (var i = 0; i < json.length; i++) {
        //   $('.select-Subservicio').append('<option value="' + json[i].id + '">' + json[i].nombre + '</option>');
        // }
        //console.log(dataJson);
      });
      

  });
  $("#agregarEtapa").click(function () {    
    if (subserviciosInfoCount <= subserviciosInfo.length) {
 //     $("#agregarEtapa").prop("disabled", true);

      var contenidoDinamico = '<div class="col-lg-12" id="subservicio-' + subserviciosInfoCount + '">';
      contenidoDinamico += '<div  class="form-group" id="parent_div">';
      contenidoDinamico += '<div  class="row form-group child_div">';
      contenidoDinamico += '<label for="day" class="col-xs-2 control-label"></label>';
      contenidoDinamico += '<div   class="col-xs-12 col-lg-6">';
      contenidoDinamico += '<label for="form-input-col-xs-2" class="wb-inv">Elige las etapas necesarias:</label>';
      contenidoDinamico += '<div class="input-group" style="">';
      contenidoDinamico += '<?php foreach ($Subservicio as $Subservicio) { ?>' ;
      contenidoDinamico += '<select class="form-control select-Subservicio" onchange="validarCiclo(this.id, ' + subserviciosInfoCount + ')" id="combo-Subservicio-' + subserviciosInfoCount + '" name="Subservicio[]">';
      contenidoDinamico += '<option value="" >-- SELECCIONE --</option>';
      contenidoDinamico += '</select>';
      contenidoDinamico += '<?php } ?>'; 
      contenidoDinamico += '</div>';
      contenidoDinamico += '</div>';

      contenidoDinamico += '<div class="col-xs-12 col-lg-3">';
      contenidoDinamico += '<label for="form-input-col-xs-3" class="wb-inv">Precio</label>';
      contenidoDinamico += '<div class="input-group">';
      contenidoDinamico += '<input type="text" class="form-control" name="Item_Precio_subservicio[]" placeholder="Precio" onchange="calculaPrecio()" id="precio-subservicio-' + subserviciosInfoCount + '" />';
      contenidoDinamico += '<button class="btn btn-primary" id="btnRemovePriceSubSer-' + subserviciosInfoCount +'" onclick="eliminarPaso(' + subserviciosInfoCount + ')">-</button>';
      contenidoDinamico += '</div>';
      contenidoDinamico += '</div>';

      contenidoDinamico += '<div class="col-xs-12 col-lg-3" id="cicloContenedor-' + subserviciosInfoCount +'" style="display:none;">';
      contenidoDinamico += '<label for="form-input-col-xs-3" class="wb-inv">Ciclo</label>';
      contenidoDinamico += '<div class="input-group">';
      contenidoDinamico += '<input type="text" class="form-control" name="Item_ciclo_subservicio[]" placeholder="Ciclo" onchange="calculaPrecio()" id="ciclo-subservicio-' + subserviciosInfoCount + '" />';
      contenidoDinamico += '<button class="btn btn-primary" onclick="eliminarPaso(' + subserviciosInfoCount + ')">-</button>';
      contenidoDinamico += '</div>';
      contenidoDinamico += '</div>';

      contenidoDinamico += '</div>';
      contenidoDinamico += '</div>';
      contenidoDinamico += '</div>';
      $("#aquiSeInsertaElContenidoDinamico").append(contenidoDinamico);
      for (var i = 0; i < subserviciosInfo.length; i++) {
        $('#combo-Subservicio-' + subserviciosInfoCount).append('<option value="' + subserviciosInfo[i].id + '">' + subserviciosInfo[i].nombre + '</option>');
      }
    }
    subserviciosInfoCount++;
  });

});

function eliminarPaso(id) {
  $('#subservicio-' + id).remove();
  subserviciosInfoCount--;
}


//CALCULA PRECIO TOTAL DE LAS ETAPAS
 function calculaPrecio() {
  var sum = 0;
  $('input[id^="precio-subservicio"]').each(function (index, element) {
    console.log($('#' + element.id).val());
    sum += parseFloat($(element).val());
  });
  $('#precio').val(sum.toFixed(2));

  console.log(precio);
}


function validarCiclo(idSel, contadorCiclo){
  var etapaValue = $("#" + idSel+" option:selected").val();
  if (etapaValue === "") {
    $("#agregarEtapa").prop("disabled", true);
    return;
  }

  var finalEtapa = $("#" + idSel+" option:selected").text();
  if (finalEtapa.endsWith("(CO)") ||finalEtapa.endsWith("(CF)")) {
    $("#cicloContenedor-" + contadorCiclo).css('display', 'block');
    $("#btnRemovePriceSubSer-" + contadorCiclo).css('display', 'none');

    if ($("#ciclo-repetir-" + contadorCiclo).val() !== "") {
      $("#agregarEtapa").prop("disabled", false);
    }
  }
  else {
    $("#cicloContenedor-" + contadorCiclo).css('display', 'none');
    $("#btnRemovePriceSubSer-" + contadorCiclo).css('display', 'block');
  }
}