<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>FORMULARIO DE CONTACTO</title>
    
        <!-- Bootstrap -->
    <link rel="stylesheet" href="https://bootswatch.com/5/brite/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        

    </head>

    <body class="bg-ligth">

    <div class="container mt-5">
    <h2 class="text-center mb-4">Formulario de Contacto</h2>

    <div id="alerta" class="alert d-none"></div>

    <form id="formContacto" class="bg-white p-4 rounded shadow-sm">
        <div class="form-group">
            <label>Nombre: </label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Tu nombre">
        </div>

        <div class="form-group">
            <label>Email: </label>
            <input type="email" id="email" name="email" class="form-control" placeholder="correo@ejemplo.com">
        </div>

        <div class="form-group">
            <label>Mensaje: </label>
            <textarea id="mensaje" name="mensaje" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        <a href="{{ route('registros') }}" class="btn btn-secondary btn-block mt-2"> Ver Registros </a>
    </form>
</div>

<script>
$(document).ready(function(){

    $("#formContacto").submit(function(e){
        e.preventDefault(); //esta lineaa es para que la pagina no haga refresh

        //capturar los valores
        let nombre = $("#nombre").val().trim();
        let email = $("#email").val().trim();
        let mensaje = $("#mensaje").val().trim();

        //valida que los campos no esten vacios
        if(!nombre || !email || !mensaje){
            mostrarAlerta("No puede haber campos vacios", "Advertencia");
            return;
        }

        //valida el email con expresiones comunes
        let regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!regexEmail.test(email)){
            mostrarAlerta("El email no tiene un formato válido.", "Advertencia");
            return;
        }

        //Hace el envio de los datos con AJAX
        $.ajax({
            url: "{{ route('guardar') }}",
            type: "POST",
            data: {
                nombre: nombre,
                email: email,
                mensaje: mensaje,
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(res){
                if(res.success){
                    mostrarAlerta("Mensaje guardado correctamente ✅", "Hecho");
                    $("#formContacto")[0].reset();
                }
            },
            error: function(){
                mostrarAlerta("Ocurrió un error al guardar.", "Error");
            }
        });
    });

    function mostrarAlerta(msg, tipo){
        let alerta = $("#alerta");
        alerta.removeClass("d-none alert-success alert-danger alert-warning");
        alerta.addClass("alert-" + tipo).text(msg);
    }

});
</script>
</body>
</html>
