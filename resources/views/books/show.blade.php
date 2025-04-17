<x-layout>
    <section class="section container">
        <h1 class="text-xl font-bold text-black-200 mb-10"></h1>
        <div class="books__container">
            <div class="flex  justify-center gap-20 book__details w-full bg-white p-10 rounded-[30px]">
                <img class="w-full max-w-[300px] max-h-[400px] rounded-[20px] mb-3"
                    src="{{ asset('storage/' . $livro->imagem) }}" alt="{{ $livro->titulo }}">
                <div class="book__content">

                    <h2 class="text-4xl mb-1 font-bold flex items-center gap-5">{{ $livro->titulo }}</h2>

                    <p class="mb-10 text-gray-600">{{ $livro->autores->pluck('nome')->join(',') }} (Autor)</p>
                    <p class="text-2xl font-bold my-5">Descrição</p>
                    <p class="mt-2 text-gray-800">{{ $livro->descricao }}</p>
                    <p class="text-2xl font-bold my-5">Sobre o Autor</p>
                    @foreach ($livro->autores as $autor)
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $autor->nome }}</h3>
                            <p class="text-sm text-gray-600"><strong>Nacionalidade:</strong> {{ $autor->nacionalidade }}
                            </p>
                            <p class="text-sm text-gray-600"><strong>Data de Nascimento:</strong>
                                {{ \Carbon\Carbon::parse($autor->data_nascimento)->format('d/m/Y') }}</p>
                            <p class="mt-2 text-gray-800">{{ $autor->biografia }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>
