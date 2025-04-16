<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lera</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">
    <header class="header z-[100]">
        <nav class="nav container">
            <a href="{{ route('home') }}" class="nav__brand">Lera</a>
            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ route('home') }}">Início</a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('authors.create') }}" class="nav__link">Autores</a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('genres.create') }}" class="nav__link">Géneros</a>
                    </li>
                    <li>
                        <a class="nav__link" href="{{ route('books.create') }}">Livros</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            <button class="nav__link bg-black py-3 rounded-[10px] px-3 text-white"
                                href="{{ route('logout') }}">Terminar
                                Sessão</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container">
        {{ $slot }}
    </main>
</body>

</html>
