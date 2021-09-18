var ceros=["01","02","03","04","05","06","07","08","09"];
var valueIn = 0;
function AgregarCero(num){
    
    if(num<10){
        return ceros[num-1];
    }
    return num;
}
$(document).ready(function(){
        $( ".TextoPrecio" ).focus(function() {
                valueIn=$(this).val();
        })
        .focusout(function() {
                console.log((($(this).parent()).parent()).attr('id'));
                var valueOut=$( this ).val();
                if(valueOut!=""){
                        if(valueOut!=valueIn){
                                var parametros = {
                                        "controller": "Unidades",
                                        "action":"GuardarPrecio",
                                        "idUnidad" : (($(this).parent()).parent()).attr('id'),
                                        "importeViejo":valueIn,
                                        "importeNuevo":valueOut,
                                        "fecha":$(this).attr('id'),
                                };
                                $.ajax({
                                        data:  parametros,
                                        url:   'index.php',
                                        type:  'get',
                                        beforeSend: function () {
                                                $("h3").text("Procesando, espere por favor...");
                                        },
                                        success:  function (response) {
                                                $("h3").html(response);
                                        }
                                });
                                $(this).css("background-color", "#FFFFCC");
                        }
                }
        });
       

        
        
});
function LocalidadesDe()
{
        var parametros = {
                "controller": "Localidades",
                "action":"TraerParaComboBox",
                "idProvincia" : $("#listadoProvincias").val(),
        };
        $.ajax({
                data:  parametros,
                url:   'index.php',
                type:  'get',
                beforeSend: function () {
                        $("#listadoLocalidades").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#listadoLocalidades").html(response);
                }
        });
}

function LimitarHasta(iddesde,idhasta){
    
    var f = new Date($(iddesde).val());
    f.setHours(48);
    var controlHasta=$(idhasta); 
    var fecha=f.getFullYear()+"-"+AgregarCero(f.getUTCMonth()+1)+"-"+AgregarCero(f.getDate());
    controlHasta.attr("min",fecha);   
    controlHasta.attr("value",fecha);
}

