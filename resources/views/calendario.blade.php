<!DOCTYPE html>
<html lang='es'>
<head>
    @include('template_base')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/locales/es.js'></script>
    <style>
        .calendar-container {
            width: 98%;
            margin: 0 auto;background: rgb(255,255,255);
            background: linear-gradient(90deg, rgba(255,255,255,0.9528186274509804) 0%, rgba(255,255,255,0.9556197478991597) 29%);
            padding: 8px;
        }

        .fc-view-container {
            background-color: #f0f0f0; /* Cambia el color de fondo a gris claro */
        }

    </style>
</head>
<body>

<div class="container-fluid">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Cerrar sesión</button>
                </form>
            @endauth
        </div>
    </nav>
    <div class="row" style="padding-top:10px;">
        <div class="col-md-12">
            <div id='calendar' class='calendar-container'></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class='modal fade' id='eventoModal' tabindex='-1' role='dialog' aria-labelledby='eventoModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header bg-info text-white'>
                <h5 class='modal-title' id='eventoModalLabel'><p id='eventoTitulo'></p></h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img id="imagen_modal" class="img-fluid" src="" style="max-width: 100%; max-height: 300px;" alt="Imagen del evento">
                    </div>
                    <div class="col-md-12">
                        <p id="eventodescripcion" name="eventodescripcion"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class='modal fade' id='dayModal' tabindex='-1' role='dialog' aria-labelledby='dayModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header bg-info text-white'>
                <h5 class='modal-title' id='dayModalLabel'>Detalles del Día</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class="row">
                    <div class="col-md-12">Fecha: <p id='fecha_guardar'></p></div>
                    <div class="col-md-12">
                        Título: <input id="titulo_guardar" type="text" class="form-control"></input>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <textarea id="descripcion_guardar" name="descripcion_guardar" rows="5" class="form-control" placeholder="Escribe lo que te pasó en el día"></textarea>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="formFile" class="form-label">Agregar imagen</label>
                        <input class="form-control" type="file" accept="image/*" id="imagen_guardar" name="imagen_guardar">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_guardar_recuerdo" class="btn btn-default btn-success" data-dismiss="modal"><?php echo __('Guardar'); ?></button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        ajax_obtener_eventos()
    });

    $("#btn_guardar_recuerdo").click(function(){
        guardar_nuevo_evento();
        ajax_obtener_eventos();
    })

    function ajax_obtener_eventos(){
        var calendarEl = document.getElementById('calendar');
        var locale_es = {
            today: 'Hoy', // Cambia 'Today' a 'Hoy'
        };

        // Calcular la altura disponible de la ventana del navegador
        var windowHeight = window.innerHeight;

        // Establecer la altura del calendario como un porcentaje del alto de la ventana del navegador
        var calendarHeight = windowHeight * 0.9; // Por ejemplo, puedes ajustar el valor 0.8 según tus necesidades
        $.ajax({
            url: '/obtener-eventos',
            type: 'GET',
            success: function(response) {
                var eventos = response.eventos;

                // Configuración del calendario
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'es',
                    initialView: 'dayGridMonth',
                    buttonText: locale_es,
                    events: eventos,
                    height: calendarHeight,
                    dayHeaderFormat: {
                        weekday: 'short',
                    },
                    titleFormat: { year: 'numeric', month: 'long' },
                    eventClick: function(info) {
                        // Abrir el modal y mostrar la información del evento
                        var url_imagen = info.event.extendedProps.url_imagen;
                        $('#eventoTitulo').text(info.event.title);
                        $('#eventodescripcion').text(info.event.extendedProps.descripcion);
                        var rutaImagen = "{{ asset('storage/img/') }}" + '/' + url_imagen;
                        // Mostrar la imagen en el modal
                        $('#imagen_modal').attr('src', rutaImagen);
                        $('#eventoModal').modal('show');
                    },
                    dateClick: function(info) {
                        // Mostrar el modal con los detalles del día
                        $('#fecha_guardar').text(info.dateStr);
                        $('#dayModal').modal('show');
                    }
                });
                calendar.render();
                 // Convertir el título a mayúsculas utilizando CSS
                var titleElement = calendarEl.querySelector('.fc-toolbar-title');
                if (titleElement) {
                    titleElement.style.textTransform = 'uppercase';
                }

                // Después de renderizar el calendario, cambia el color de fondo del área exterior
                var viewContainer = calendarEl.querySelector('.fc-view-harness');
                if (viewContainer) {
                    console.log("entra si")
                    viewContainer.style.backgroundColor = '#ffffff'; // Cambia el color de fondo a gris claro
                    viewContainer.style.color = '#ffffff'; // Cambia el color de fondo a gris claro
                }
            }
        });
    }

    function guardar_nuevo_evento() {
        var descripcion = $("#descripcion_guardar").val();
        var titulo = $("#titulo_guardar").val();
        var fecha = $("#fecha_guardar").text();
        var token = document.head.querySelector('meta[name="csrf-token"]').content;
        var imagen = $('#imagen_guardar').prop('files')[0];

        var formData = new FormData();
        formData.append('descripcion', descripcion);
        formData.append('titulo', titulo);
        formData.append('fecha', fecha);
        formData.append('imagen', imagen);

        $.ajax({
            url: '/guardar-evento',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: formData,
            processData: false,  // Indica a jQuery que no procese los datos
            contentType: false,  // Indica a jQuery que no establezca el tipo de contenido
            success: function(response) {
                console.log('Nombre de la imagen:', response.nombre_imagen);
            },
            error: function(xhr, status, error) {
                // Manejar errores si es necesario
                console.error(xhr.responseText);
            }
        });
    }
</script>
</body>
</html>
