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

                    @if($livro->formato === 'audiobook')
                        <h4>Player de Áudio:</h4>
                        <audio controls>
                            <source src="{{ asset('storage/' . $livro->arquivo) }}" type="audio/mpeg">
                            Seu navegador não suporta o player de áudio.
                        </audio>
                    @elseif($livro->formato === 'digital')
                        <h4>Download do Livro Digital:</h4>
                        <a href="{{ asset('storage/' . $livro->arquivo) }}"
                            class="bg-green-500 text-white text-xl mt-3 font-bold p-3 py-1 rounded hover:bg-green-600" download>Baixar</a>

                    @elseif($livro->formato === 'fisico')
                        <h4>Informações de Entrega Física:</h4>
                        <p>📦 O livro será enviado para sua morada em breve. <a href="https://www.google.pl/maps/place/Universidade+S%C3%A3o+Tom%C3%A1s/@-25.9720048,32.5855555,17z/data=!4m14!1m7!3m6!1s0x1ee69ba678aceb39:0xc8478885687421ed!2sUniversidade+S%C3%A3o+Tom%C3%A1s!8m2!3d-25.9720096!4d32.5881304!16s%2Fm%2F0cp48cz!3m5!1s0x1ee69ba678aceb39:0xc8478885687421ed!8m2!3d-25.9720096!4d32.5881304!16s%2Fm%2F0cp48cz?entry=ttu&g_ep=EgoyMDI1MDQxNi4xIKXMDSoASAFQAw%3D%3D" class="font-bold text-blue-400">Endereço!</a></p>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-layout>
