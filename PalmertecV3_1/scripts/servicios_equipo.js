var subserviciosInfo = [];
var subserviciosInfoCount = 1;
var total = 0;
var itemEtapaCicloSeleccionada = [];
var etapaCicloSeleccionadaSuma = 0;

$(document).ready(function () {

  $("#Servicio").change(function () { //Evento onchange

    $.get("../Controlador/subservicio.php", "Servicio=" + $("#Servicio").val(), //Peticion
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
 //       $("#agregarEtapa").prop("disabled", true);
  
        var contenidoDinamico = '<div class="col-lg-12" id="subservicio-' + subserviciosInfoCount + '">';
        contenidoDinamico += '<div  class="form-group" id="parent_div">';
        contenidoDinamico += '<div  class="row form-group child_div">';
        contenidoDinamico += '<label for="day" class="col-xs-2 control-label"></label>';
        contenidoDinamico += '<div   class="col-xs-12 col-lg-4">';
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
        contenidoDinamico += '<input type="text" class="form-control"  name="Item_Precio_subservicio[]" readonly=""  id="precio-subservicio-' + subserviciosInfoCount + '" />';
        contenidoDinamico += '<button class="btn btn-primary" id="btnRemovePriceSubSer-' + subserviciosInfoCount +'" onclick="eliminarPaso(' + subserviciosInfoCount + ')">-</button>';
        contenidoDinamico += '</div>';
        contenidoDinamico += '</div>';
  
        contenidoDinamico += '<div class="col-xs-12 col-lg-3" id="cicloContenedor-' + subserviciosInfoCount +'" style="display:none;">';
        contenidoDinamico += '<label for="form-input-col-xs-3" class="wb-inv">Precio de ciclo</label>';
        contenidoDinamico += '<div class="input-group">';
        contenidoDinamico += '<input type="text" class="form-control" name="Item_ciclo_subservicio[]" readonly=""  id="ciclo-subservicio-' + subserviciosInfoCount + '" />';      
        contenidoDinamico += '</div>';
        contenidoDinamico += '</div>';

        contenidoDinamico += '<div class="col-xs-12 col-lg-2" id="repetirContenedor-' + subserviciosInfoCount +'" style="display:none;">';
        contenidoDinamico += '<label for="form-input-col-xs-3" class="wb-inv">Cantidad</label>';
        contenidoDinamico += '<div class="input-group">';
        var evento = "onchange='calcularSumaEtapaCiclo(\"combo-Subservicio-" + subserviciosInfoCount + "\")'";
        contenidoDinamico += '<input type="text" class="form-control" name="Item_ciclo_repetir[]" placeholder="1,2,3.." ' + evento + ' id="ciclo-repetir-' + subserviciosInfoCount + '" />';
        contenidoDinamico += '<button class="btn btn-primary" onclick="eliminarPaso(' + subserviciosInfoCount + ')">-</button>';
        contenidoDinamico += '</div>';
        contenidoDinamico += '</div>';
        contenidoDinamico += '</div>';
        $("#ContenidoDinamicoParaEtapas").append(contenidoDinamico);
        for (var i = 0; i < subserviciosInfo.length; i++) {
          $('#combo-Subservicio-' + subserviciosInfoCount).append('<option value="' + subserviciosInfo[i].id + '">' + subserviciosInfo[i].nombre + '</option>');
        }
      }
      subserviciosInfoCount++;
    });
  
  });
  
  function eliminarPaso(id) {
    var etapaEliminadaValue = $('#combo-Subservicio-'+ id + ' option:selected').val();
    $('#subservicio-' + id).remove();
    itemEtapaCicloSeleccionada = itemEtapaCicloSeleccionada.filter(function(item){
      return item != etapaEliminadaValue;
    });
    calcularSumaEtapaCiclo('combo-Subservicio-'+ id);
    subserviciosInfoCount--;
  }
  
   function calculaPrecio() {
    var sum = 0;
    $('input[id^="precio-subservicio"]').each(function (index, element) {
      console.log($('#' + element.id).val());
      sum += parseFloat($(element).val());
    });
    $('#precio').val(sum.toFixed(2));
  
  }

  //CICLO
  function validarCiclo(idSel, contadorCiclo){
    var finalEtapa = $("#" + idSel+" option:selected").text();
    var finalEtapaValue = $("#" + idSel+" option:selected").val();
    if (finalEtapaValue == "") {
      $("#agregarEtapa").prop("disabled", true);
      return; //Termina la función si no selecciono una opción
    }
    $('#ciclo-repetir-' + contadorCiclo).attr('data-etapa',finalEtapaValue);
    itemEtapaCicloSeleccionada.push(finalEtapaValue);
  
    if (finalEtapa.endsWith("(CO)") ||finalEtapa.endsWith("(CF)")) {
      $("#cicloContenedor-" + contadorCiclo).css('display', 'block');
      $("#repetirContenedor-" + contadorCiclo).css('display', 'block');
      $("#btnRemovePriceSubSer-" + contadorCiclo).css('display', 'none');
      $("#agregarEtapa").prop("disabled", ($("#ciclo-repetir-" + contadorCiclo).val() == ""));
    }
    else {
      $("#cicloContenedor-" + contadorCiclo).css('display', 'none');
      $("#repetirContenedor-" + contadorCiclo).css('display', 'none');
      $("#btnRemovePriceSubSer-" + contadorCiclo).css('display', 'block');
      $("#agregarEtapa").prop("disabled", false);
    }
    var data = subserviciosInfo.filter(function(item){
      return item.id == finalEtapaValue;
    });
    var tiposS=  $("#tipos").val();
    if(tiposS == "urgente"){
      $("#precio-subservicio-" + contadorCiclo).val(data[0].total_pagar_palmertec);

    }
    else{
      
      $("#precio-subservicio-" + contadorCiclo).val(data[0].total_palmertec);
    }

    $("#ciclo-subservicio-" + contadorCiclo).val(data[0].precio_ciclo);
    calcularSumaEtapaCiclo(idSel);
  }
  
  function calcularSumaEtapaCiclo(idEtapaSeleccionada) {
    var etapaValue = $("#" + idEtapaSeleccionada).val();
    var countItem = idEtapaSeleccionada.split('combo-Subservicio-');
    var etapasSeleccionadas = subserviciosInfo.filter(function(item){
      return itemEtapaCicloSeleccionada.includes(item.id);
    });
    console.log("etapasSeleccionadas", etapasSeleccionadas);

    var totalSumaEtapas = 0;
    var tiposS=  $("#tipos").val();
    etapasSeleccionadas.forEach(function(item, index){
      if(tiposS =="urgente"){
        var precios = parseFloat(item.total_pagar_palmertec);
      } 
      else{
      var precios = parseFloat(item.total_palmertec);
      }
      totalSumaEtapas += precios; 

      // var cicloValue = $("#ciclo-repetir-" + (index + 1) + "[data-etapa=" + etapaValue + "]").val();
      var cicloValue = $("#ciclo-repetir-" + (index + 1)).val();
      if (cicloValue != null && cicloValue != "") {
        var cicloP = parseInt(cicloValue);
        var cicloR = (item.precio_ciclo == "" || item.precio_ciclo == null) ? 0 : parseFloat(item.precio_ciclo);
        totalSumaEtapas += cicloP * cicloR;
        
      }
    });

    console.log(totalSumaEtapas);
    $('#precioTotalCiclos').val(totalSumaEtapas);


  }
  
  //NOMBRE DEL EQUIPO EN FORMULARIO
  function nombreEquipo(id){
    var nombreEquipoSeleccionado = $("#" + id + " option:selected").text();
    document.getElementById('equipoCGnombre').value = nombreEquipoSeleccionado;
  }

//NOMBRES DE SUBSERVICIO  
function etapasCliente(nombreProducto) {
  $.get("../Controlador/subservicios_cotizaciones.php", "nombreProducto=" + nombreProducto , //Peticion
  function (equis) { //onSuccess
    var json = JSON.parse(equis);
    subserviciosInfo = json;
    // for (var i = 0; i < json.length; i++) {
    //   $('.select-Subservicio').append('<option value="' + json[i].id + '">' + json[i].nombre + '</option>');
    // }
    //console.log(dataJson);
    
  });

}

function calculaPrecioCiclos() {
  var sumCiclo = 0;
  $('input[id^="precio-subservicio-"]').each(function (index, element) {
    console.log($('#' + element.id).val());
    sumCiclo += parseFloat($(element).val());
  });
  $('#precioTotalCiclos').val(sumCiclo.toFixed(2));

  console.log(precioTotalCiclos);
}

