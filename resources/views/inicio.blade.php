<!DOCTYPE html>
<html lang='es'>
<head>
    @include('template_base')

    <style>

        .titulo-bienvenida{
            color:#ffffff;
            font-family: 'Lato', sans-serif;

        }

        .circular-image-icono {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid white;
            overflow: hidden;
        }

        .circular-image-icono img {
            margin-top: -25px;
        }

        .circular-image {
            width: 250px;
            height: 300px;
            border: 1px solid white;
            overflow: hidden;
            padding-left:0px;
            border-radius: 25%;
        }
        
        .circular-image img {
            width: 250px; 
            height: 300px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-dark bg-dark" >
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <div class="d-flex" style="padding:2px;">
                    <div style="padding:3px;">
                        <a href="/register" class="btn btn-outline-light">Registrarse</a>
                    </div>
                    <div style="padding:3px;">
                        <a href="/login" class="btn btn-outline-light">Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row vertical-center">
            <div class="col-md-8 "> <!-- Añadido clase vertical-center -->
                <div style="padding:20%;" class="text-center"> <!-- Contenedor adicional -->
                    <div class="circular-image-icono mx-auto">
                        <img src="{{ asset('storage/img/') }}/iconos/icono_principal.ico" class="img-fluid" alt="Icono">
                    </div>
                    <h1 class="titulo-bienvenida">Bienvenidos a Nuestro Rincón de Recuerdos Preciados</h1>
                    <br><br>
                    <h3 class="titulo-bienvenida">¡Celebremos Juntos los Momentos Especiales en Nuestra Página Familiar!</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12 circular-image mb-3">
                    <img src="{{ asset('storage/img/') }}/familiar_1.jpg" alt="primera imagen familiar">
                </div>
                <div class="col-md-12 circular-image float-right">
                    <img src="{{ asset('storage/img/') }}/familiar_2.jpg" alt="Segunda imagen familiar">
                </div>
            </div>
        </div>    
    </div>

</body>
</html>
