// mostrar precio
// show price

    $(document).ready(function(){
        $("#producto").change(function(){
            var precio = $("#producto option:selected").data("precio");
            $("#precio").val(precio);
        });
    });


    // captamos el id del producto
    //get the id product
    $(document).ready(function(){
        $("#producto").change(function(){
            var id = $("#producto option:selected").data("id");
            $("#id_producto").val(id);
        });
    });

    // update the price when choosing several units
    // actualizar precio al escojer varias unidades
    function actualizarPrecio() {
        var cantidad = document.getElementById("cantidad").value;
        var precioUnitario = document.getElementById("producto").options[document.getElementById("producto").selectedIndex].getAttribute("data-precio");
        var nuevoPrecio = cantidad * precioUnitario;
        document.getElementById("precio").value = nuevoPrecio;
    }
