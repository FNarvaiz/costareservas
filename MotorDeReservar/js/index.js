var ceros=["01","02","03","04","05","06","07","08","09"];
var valueIn = 0;
var direccion="MotorDeReservar/";
function AgregarCero(num){
    
    if(num<10){
        return ceros[num-1];
    }
    return num;
}
 if($("#buscador")!=undefined)
        {
                if($("#buscador").html()==""){
                        $.ajax({
                                data:  '',
                                url:   direccion+'index.php',
                                type:  'get',
                                beforeSend: function () {
                                        $("#buscador").text("Cargando buscador");
                                },
                                success:  function (response) {
                                        $("#buscador").html(response);
                                }
                        });
                }
        }
$(document).ready(function(){
       
        
        
});
function Buscar(){
                $("#contenerdorPrincipal").html("");
                var parametros = {
                        "controller": "Reservas",
                        "action":"Buscar",
                        "Desde" : $("#fechaDesde").val(),
                        "Hasta":$("#fechaHasta").val(),
                        "categoria":$("#listaCategorias").val(),
                };
                $.ajax({
                        data:  parametros,
                        url:   direccion+'index.php',
                        type:  'get',
                        beforeSend: function () {
                                $("#contenerdorPrincipal").text("Procesando, espere por favor...");
                        },
                        success:  function (response) {
                                $("#contenerdorPrincipal").html(response);
                        }
                });

        }
function LocalidadesDe()
{
        var parametros = {
                "controller": "Localidades",
                "action":"TraerParaComboBox",
                "idProvincia" : $("#listadoProvincias").val(),
        };
        $.ajax({
                data:  parametros,
                url:   direccion+'index.php',
                type:  'get',
                beforeSend: function () {
                        $("#listadoLocalidades").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#listadoLocalidades").html(response);
                }
        });
}
function FechasDe(){
        var id =$("#listaFechas").val()
        var fechas = id.split(",");
        var desde= new Date(fechas[0]);
        var hoy= new Date();
        if(hoy>desde)
            $("#fechaDesde").attr("value",hoy.getFullYear()+"-"+AgregarCero(hoy.getUTCMonth())+"-"+AgregarCero(hoy.getDate()));
        else
             $("#fechaDesde").attr("value",fechas[0]);
        $("#fechaHasta").attr("value",fechas[1]);
}
function LimitarHasta(){
    
    var f = new Date($("#fechaDesde").val());
    f.setHours(48);
    var controlHasta=$("#fechaHasta"); 
    var fecha=f.getFullYear()+"-"+AgregarCero(f.getUTCMonth()+1)+"-"+AgregarCero(f.getDate());
    controlHasta.attr("min",fecha);   
    controlHasta.attr("value",fecha);
}
function SeguirReserva(desde,hasta,id){
                $("#contenerdorPrincipal").html("");
                var parametros = {
                        "controller": "Reservas",
                        "action":"PedirDatosCliente",
                        "id" : id,
                        "desde":desde,
                        "hasta":hasta,
                };
                $.ajax({
                        data:  parametros,
                        url:   direccion+'index.php',
                        type:  'get',
                        beforeSend: function () {
                                $("#contenerdorPrincipal").text("Procesando, espere por favor...");
                        },
                        success:  function (response) {
                                $("#contenerdorPrincipal").html(response);
                        }
                });
                
}
function TextoCompleto(control){
        if($(control).val()==""){
                $(control).css("background-color", "#f39fa8");
                console.log(control);
                return false;
        
        }
        return true;
}
function SeguirReserva2(desde,hasta,id){
        if(CorreoValido() && TextoCompleto('#datos #dni') && TextoCompleto('#nombre') && 
                TextoCompleto('#apellido') && TextoCompleto('#celular') && TextoCompleto('#domicilio')){
         
                var parametros = {
                        "controller": "Reservas",
                        "action":"ElegirFormaDePago",
                        "id" : id,
                        "desde":desde,
                        "hasta":hasta,
                        "dni" : $("#datos #dni").val(),
                        "nombre" : $("#nombre").val(),
                        "apellido" : $("#apellido").val(),
                        "celular" : $("#celular").val(),
                        "localidad" : $("#listadoLocalidades").val(),
                        "domicilio" : $("#domicilio").val(),
                        "mail" : $("#mail").val(),
                        "observacion" : $("#observacion").val(),
                        "personas" : $("#cantPersonas").val(),
                };
                $("#contenerdorPrincipal").html("");
                $.ajax({
                        data:  parametros,
                        url:   direccion+'index.php',
                        type:  'get',
                        beforeSend: function () {
                                $("#contenerdorPrincipal").text("Procesando, espere por favor...");
                        },
                        success:  function (response) {
                                $("#contenerdorPrincipal").html(response);
                        }
                });
        }
        else{
                $('#mensaje').text("Complete los datos que se marcan en rojo")
        }

}
function CorreoValido(){
    var email = $('#mail').val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if(caract.test(email))
        return true;
    else{
        $('#mail').css("background-color", "#f39fa8");
        return false;
    }
}
function FinalizarReservar(desde,hasta,unidad,forma,reserva){
                $("#contenerdorPrincipal").html("");
                var parametros = {
                        "controller": "Reservas",
                        "action":"Finalizar",
                        "unidad" : unidad,
                        "forma" : forma,
                        "reserva" : reserva,
                        "desde":desde,
                        "hasta":hasta,
                };
                $.ajax({
                        data:  parametros,
                        url:   direccion+'index.php',
                        type:  'get',
                        beforeSend: function () {
                                $("#contenerdorPrincipal").text("Procesando, espere por favor...");
                        },
                        success:  function (response) {
                                $("#contenerdorPrincipal").html(response);
                        }
                });
                
}