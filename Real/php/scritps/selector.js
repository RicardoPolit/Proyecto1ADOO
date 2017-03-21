/**
 * Created by franciscomera on 16/03/17.
 */

    /*Funcion para mostrar un formulario diferente si es persona fisica o moral*/
    function mostrar(id) {
        if(id == "personaFisica"){
            $("#personaFisica").show();
            $("#personaMoral").hide();
        }
        if(id == "personaMoral"){
            $("#personaFisica").hide();
            $("#personaMoral").show();
        }
    }

    /*Funciones respectivas para ocultar o aparecer el domicilio fiscal*/
    function showContent() {
        $(document).ready(function () {
            var toogCheck = jQuery('#check');
            var toogleL = jQuery('#alert');
            var boton = jQuery('#domFiscalPF');
            if (!toogCheck.is(':checked')) {
                boton.show();
                toogleL.hide();
            } else {
                boton.hide();
                toogleL.show();
            }
        });
    }

        function showContentM() {
            $(document).ready(function() {
                var toogCheck = jQuery('#checkM');
                var toogL = jQuery('#alertM');
                var boton = jQuery('#domFiscalPM');
                if (!toogCheck.is(':checked')) {
                    boton.show();
                    toogL.hide();
                } else {
                    boton.hide();
                    toogL.show();
                }
            });
        }