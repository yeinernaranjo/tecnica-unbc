<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - INBC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    <div class="h-screen w-full bg-[#141D29]">
        @if (Auth::check())
        <div class="absolute text-white right-1 font-bold">
            <div class="bg-[#1F2937] p-3 text-center mb-3">
                <span>{{ Auth::user()->name }}</span>
            </div>
            <a class="bg-blue-600 p-3 rounded-bl-lg hover:bg-blue-700 cursor-pointer" href="{{ route('logout') }}">Cerrar Sesión</a>
        </div>
        @endif
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
