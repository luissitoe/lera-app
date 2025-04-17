<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lera</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">
    <header class="header">
        <nav class="nav container">
            <a href="">Lera</a>
            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="sidebar__item">
                        <a class="sidebar__link" href="{{ route('home') }}">Início</a>
                    </li>
                    <li class="sidebar__item">
                        <a href="{{ route('books.create') }}" class="sidebar__link">Adicionar Livro</a>
                    </li>
                    <li class="sidebar__item">
                        <a href="{{ route('books.index') }}" class="sidebar__link">Lista de Livros</a>
                    </li>
                    <li>
                        <a class="sidebar__link" href="{{ route('books.index') }}">Livros</a>
                    </li>
                </ul>
            </div>
            <button>Sair</button>
        </nav>
    </header>
    <main class="container pb-10">
        {{ $slot }}
    </main>
</body>

</html>
