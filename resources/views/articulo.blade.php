<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Paletas - {{ $articulo->nombre }}</title>
    <!-- Aquí puedes incluir tus estilos CSS -->
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
</head>
<body>
    <header>
        <!-- Aquí puedes incluir tu encabezado -->
        <h1>Tienda de Paletas</h1>
    </header>

    <main>
        <section class="productos">
            <h2>{{ $articulo->nombre }}</h2>
            <div class="grid">
                <div class="producto">
                    <img src="{{ $articulo->imagen_url }}" alt="{{ $articulo->nombre }}">
                    <h3>{{ $articulo->nombre }}</h3>
                    <p>{{ $articulo->descripcion }}</p>
                    <p>Precio: {{ $articulo->precio }}</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <!-- Aquí puedes incluir tu pie de página -->
        <p>&copy; {{ date('Y') }} Tienda de Paletas</p>
    </footer>

    <!-- Aquí puedes incluir tus scripts JavaScript -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
